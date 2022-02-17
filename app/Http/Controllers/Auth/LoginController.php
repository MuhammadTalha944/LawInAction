<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     public function authenticated(Request $request, $user)
        {
            // if($user->verified==false) {
            if($user->email_verified_at == null) {
                Auth::logout();
                return redirect()->route('login')->with('error','Email not verified, please verify your email before login');
            }

            if($user->verified_by_admin == 0){
                Auth::logout();
                return redirect()->route('login')->with('error','Your account is under evaluation, please be patient');
            }
        }

        public function send_email_link(){
            return view('auth.verification_link');
        }

        public function link_email(Request $request)
        {

            $user = User::where('email', $request->email)->get();
            
            if(count($user) > 0){
                // $user->sendEmailVerificationNotification();
                
                \Mail::to( $request->email )->send(new verifyEmail($thisUser));
                
                return view('auth.verification_link')->with('messege','An active Link is send to your E-mail address');
            }else{
                return view('auth.verification_link')->with('error','Invalid Email Address');
            }

        }
}
