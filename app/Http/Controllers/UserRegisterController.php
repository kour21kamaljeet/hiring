<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\Session;
use Illuminate\Database\migrations;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\CountryCode;
use App\Models\JobTitle;
use App\Models\UserStatus;
use App\Models\UserRole;
use App\Models\File;
use \Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    
     //validates and saves new user
    public function saveUser(Request $request)
    {  
      $rules = [
			'fname' => 'regex:/^[a-zA-Z]+$/u|min:3|max:255',
			'lname' => 'regex:/^[a-zA-Z]+$/u|min:3|max:255',
		  'mobile' => 'numeric|digits:10',
      'email' => 'email|unique:users,email',
      'password' => [
                'string',
                'min:8',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
                   ],
            
		          ];
      $validator = \Validator::make($request->all(),$rules);
		  if ($validator->fails())
       {
        return redirect()->back()->withErrors($validator)->withInput(); //redirects back to userregister blade
		   }
      else
      {
        $resumeid=$this->saveResume($request);  //call to saveResume function to get last inserted resumeid
        $data = $request->input();
        $user = new User;
                $user->f_name = $data['fname'];
                $user->l_name = $data['lname'];
                $user->gender = $data['gender'];
                $user->phone = $data['mobile'];
                $user->exp = $data['experience'];
                $user->email = $data['email'];
                $encrypted_password = bcrypt($data['password']);
                $user->password = $encrypted_password;
                $user->country_id = $data['country'];
                $user->job_title_id=$data['jobtitle'];
                $user->user_status_id=$data['userstatusid'];
                $user->user_role_id=$data['userroleid'];
                $user->resume_id=$resumeid;
			        	$user->save();
                Auth::login($user);
        $userid=$user->id;
        $username=$user->f_name. ' '. $user->l_name;

        if($user->user_role_id == 4 || $user->user_role_id == 3 ) {
          $request->session()->put('userId', $userid );
          $request->session()->put('userRole', $user->user_role_id);
          return view('test');
        }
        else if($user->user_role_id == 2) {
          $request->session()->put('userid', $userid);
          $request->session()->put('username', $username);
          return view('showuser');
        }
     }
   }

   //Saves resume in table and return it's id
   public function saveResume(Request $request)  
   {    
     $data=new File;  
     $files=$request->file('resume'); 
     $name=$files->getClientOriginalName();  
     $files->move('images',$name);  
     $data->name=$name; 
     $data->save(); 
     $resumeid=$data->id;
     return $resumeid; 
   }  
   

      //Fetches values from country and jobtitle table
    public function getValues(Request $request)
    {    
      $data['countries'] = CountryCode::All();
      $data['job_titles'] = JobTitle::get(["name","id"]);
      return view('userregister',compact('data'));
    }

    //Show users according to their role
    public function showCandidate($roleid)
    {
      return view('showcandidate',['users' => User::select("*")->where("user_role_id", $roleid)->paginate(5)]);
    }    
    
    //Deletes user
    public function deleteUser($id)
    {
      User::where('id', $id)->delete();
      return view('showcandidate',['users' => DB::table('users')->paginate(5)]);
    }

    //Show view to admin or HR to update user details
    public function editUser($id)
    {
      $data['job_titles'] = JobTitle::All();
      $users=User::where('id', $id)->first();
      $data['users']=$users;
      $userjobtitleid =$data['users']->job_title_id;
      $jobtitles=JobTitle::where('id',$userjobtitleid)->first();
      $data['titles']=$jobtitles;
      return view('edituser',compact('data'));
    }

    //Updates the user details
    public function updateUser(Request $request, $id)
    {
      $rules = [
        'fname' => 'regex:/^[a-zA-Z]+$/u|min:3|max:255',
        'lname' => 'regex:/^[a-zA-Z]+$/u|min:3|max:255',
        'mobile' => 'numeric|digits:10',
        'email' => 'email|email',
                ];
        $validator = \Validator::make($request->all(),$rules);
      if ($validator->fails())
         {
          return redirect()->back()->withErrors($validator)->withInput(); //redirects back to user update page
         }
      else {   
          $user=User::find($id);
          $data = $request->input();
          $user->f_name = $data['fname'];
          $user->l_name = $data['lname'];
          $user->phone = $data['mobile'];
          $user->email = $data['email'];
          $user->job_title_id=$data['jobtitle'];
          $user->save();
          return view('showcandidate',['users' => User::select("*")->where("user_role_id", $user->user_role_id)->paginate(5)]);
      }
    }
    
    //Show candidates based on qualified rounds
    public function showCandidateCategory($roleid, $status){
      $userstatus = UserStatus::where('name', $status)->first();
      return view('showcandidate',['users' => User::select("*")->where("user_role_id", $roleid)->where("user_status_id", $userstatus->id)->paginate(5)]);
    }

}
