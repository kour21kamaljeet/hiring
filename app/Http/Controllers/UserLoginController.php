<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobTitle;
use App\Models\UserRole;
use App\Models\UserStatus;
use App\Models\NumberOfQuestion;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail; 
use App\Mail\SendMail;

class UserLoginController extends Controller
{
    //Show view to candidate to update their details
    public function editUser($id)
    {
      $data['job_titles'] = JobTitle::All();
      $users=User::where('id', $id)->first();
      $data['users']=$users;
      $userjobtitleid =$data['users']->job_title_id;
      $jobtitles=JobTitle::where('id',$userjobtitleid)->first();
      $data['titles']=$jobtitles;
      return view('candidate.editcandidate',compact('data'));
    }

    //Updates candidates details
    public function updateUser(Request $request, $id)
    {
      $user=User::find($id);
      $data = $request->input();
      $user->f_name = $data['fname'];
      $user->l_name = $data['lname'];
      $user->phone = $data['mobile'];
      $user->email = $data['email'];
      $user->job_title_id=$data['jobtitle'];
      $user->save();
      return view("showuser");
    }

    //Show random question paper to candidate
    public function showQuestion()
    { 
        $noofques = NumberOfQuestion::where('id', 1)->first();
        $data = DB::table('questions')->inRandomOrder()->limit($noofques->numofquest)->get();
        return view('candidate.questionpaper',compact('data'));
    }

    //Return the view to update question paper setting
    public function questionSetting()
    {
      return view("questions.setting");
    }

    //Updates the number of questions visible to user
    public function updateQuestionSetting(Request $request)
    {
        $noofques = NumberOfQuestion::where('id', 1)->first();
        $req = $request->input();
        $noofques->numofquest=$req['noofques'];
        $noofques->save();
        return view("test");
    }

    //Submit the questions and display the result
    public function submitQuestion(Request $request)
    {
        $data = NumberOfQuestion::where('id', 1)->first();
        $noofques=$data->numofquest;
        $arrayofquestion=$request->get('questions');
        $arrayofoption=$request->get('option');
        $arrayofcorrect=$request->get('correct');

        //Get rows from status table according to status
        $clearscreening = UserStatus::where('name', 'Screening')->first(); 
        $useronhold = UserStatus::where('name', 'On hold')->first();

        $result=0;
        foreach($arrayofquestion as $i=>$item)
            {
               if(isset($arrayofoption[$item]) != null &&  $arrayofoption[$item]==$arrayofcorrect[$item])
                {
                  $result++;
                }
               else{
                    continue;
                }
                
            }
            if((($result/$noofques)*100)>=70) //Email is sent to shortlisted candidate and HR
            {
              //Change the user status to screening clear
              Auth::user()->update(['user_status_id' => $clearscreening->id]);

              $email=Auth::user()->email;
              $name=Auth::user()->f_name;
              $user = User::where('user_role_id', 3)->first();
              $details=[[
                   'title' => 'Congratulations '.$name.  '! You Have Been Selected At Studio Graphene Private Limited',
                   'body' => 'Hi '.$name.', Congratulations! You have been selected at Studio Graphene Private Limited. You should hear from the employer shortly regarding your selection and next steps.'
                 ],
                 [
                 'title' => 'Regarding shortlisted candidate ',
                 'body' => 'Hi ' .$user->f_name. '! This is to inform you that a new candidate named '.$name. 
                 ' has cleared the screening round. Email address of the selected candidate is : ' .$email. '.'
              ]];
              $emails=[$email,$user->email];
              for($i=0;$i<2;$i++)
              {
                 Mail::to($emails[$i])->send(new SendMail($details[$i]));
              }        

                return view("candidate.result");
            }
            else {
              //Change user status to OnHold
              Auth::user()->update(['user_status_id' => $useronhold->id]);

              return view("candidate.fail");
            }
    }

    
}
