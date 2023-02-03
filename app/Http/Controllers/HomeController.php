<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showPhoto()
    {
        if(Auth::user()->user_role_id==1){
            return view('showuserimage');
        }
        elseif(Auth::user()->user_role_id==2){
            return view('candidate.showimage');
        }
        else{
            return view('showuserimage');
        }
    }

    public function updatePhoto(Request $request)
    {
        if($request->hasFile('profile')){
            $filename = $request->profile->getClientOriginalName();
            $request->profile->storeAs('images',$filename,'public');
            Auth()->user()->update(['image'=>$filename]);
        }
        if(Auth::user()->user_role_id==1){
            return view('test');
        }
        elseif(Auth::user()->user_role_id==2){
            return view('showuser');
        }
        else{
            return view('test');
        }
    }

    //Show candidate and interviewer detail to HR
    public function selectCategories()
    {
      $data['candidate'] = User::where('user_role_id', 2)->get();
      //dd($data['candidate']->email);
      $data['interviewer'] = User::where('user_role_id', 4);
      //dd($data);
      return view('scheduleInterview.selectcategories',compact('data'));
    }
    
}
