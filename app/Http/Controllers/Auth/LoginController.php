<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use \Crypt;
use Socialite;
use Exception;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    //protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   
    //Show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    //Authenticates the user with login credentials
    public function authenticate(Request $request)
    {
        $rules = [
			 'email' => 'email',
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
       else{
        $credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];
        if(Auth::attempt($credentials)){
            $userId = Auth::user()->id;
            $userRole = Auth::user()->user_role_id;
            $request->session()->put('userId', $userId );
            $request->session()->put('userRole', $userRole);
            if($userRole==1){
                return view('test');
            }
            elseif($userRole==2){
                return view('showuser');
            }
            else{
                return view('test');
            }
        }
        else {
            return redirect()->back();
        }
       }
    }

    //When user signup through gmail this will redirect user to gmail 
    public function redirectToGoogle()
   {
      return Socialite::driver('google')->redirect();
   }

   //Authenticates user gmail credentials and creates new user
    public function handleGoogleCallback()
   {
     try {
          $user = Socialite::driver('google')->stateless()->user();
          $finduser = User::where('social_login_id', $user->id)->first();
          if($finduser){
              Auth::login($finduser);
              return view('showuser');
           }
          else{
              $newUser = User::create([
                'f_name' => $user->name,
                 'l_name'=> " ",
                 'email' => $user->email,
                 'password'=>" ",
                 'phone' => " ",
                 'exp' => " ",
                 'gender' => null,
                 'country_id' => 1,
                 'job_title_id' => 44,
                 'user_status_id' => 2,
                 'user_role_id'=> 2,
                 'resume_id'=> null,
                 'social_login_id'=> $user->id
                ]);
              Auth::login($newUser);
              return view('showuser');
              }
         } catch (Exception $e) {
             return view('auth.login');
         }

    }

}
