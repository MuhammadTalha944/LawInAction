<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\VerifyUser;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Membership;
use Illuminate\Support\Arr;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/email-verification';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        // $this->guard()->login($user);
        return $this->registered($request, $user)
                            ?: redirect($this->redirectPath());
     }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // return Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8'],
        //     'g-recaptcha-response' => 'required|captcha',
        //     'phone_number' => ['required', 'unique:users'],
        // ]);
        return Validator::make($data, [
            'name' => ['max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => 0000,
            'phone_number' => $data['phone_number'],
            'isVerified' => 1,
        ]);

        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time())
          ]);
        \Mail::to($user->email)->send(new \App\Mail\VerifyMail($user));

        $membership = new Membership();
        $membership->gender = $data['gender'];
        $membership->dob = $data['dob'];
        $membership->mobile = $data['phone_number'];
        $membership->country = $data['country'];

        if(Arr::exists($data, 'state')){
            $membership->state = $data['state'] ? $data['state'] : '';
        }

        if(Arr::exists($data, 'district')){
            $membership->district = $data['district'] ? $data['district'] : '';
        }

        if(Arr::exists($data, 'police_station')){
            $membership->police_station = $data['police_station'] ? $data['police_station'] : '';
        }

        if(Arr::exists($data, 'pin_code')){
            $membership->pin_code = $data['pin_code'] ? $data['pin_code'] : '';
        }
        if(Arr::exists($data, 'category')){
            $membership->category = $data['category'];
        }
                if(Arr::exists($data, 'Advocate_Lawyer_police_station')){
                    $membership->Advocate_Lawyer_police_station = $data['Advocate_Lawyer_police_station'];
                }
                if(Arr::exists($data, 'Advocate_Lawyer_pin_code')){
                        $membership->Advocate_Lawyer_pin_code = $data['Advocate_Lawyer_pin_code'];
                }
                if(Arr::exists($data, 'Advocate_Lawyer_practice_in')){
                        $membership->Advocate_Lawyer_practice_in = 
                                            json_encode($data['Advocate_Lawyer_practice_in']);
                }
                if(Arr::exists($data, 'Advocate_Lawyer_practicing')){
                        $membership->Advocate_Lawyer_practicing = 
                                            json_encode($data['Advocate_Lawyer_practicing']);
                }
                if(Arr::exists($data, 'Law_Student_Activist_work')){
                        $membership->Law_Student_Activist_work = $data['Law_Student_Activist_work'];
                }
                if(Arr::exists($data, 'Journalist_work')){
                    $membership->Journalist_work = $data['Journalist_work'];
                }
                if(Arr::exists($data, 'Writer_work')){
                    $membership->Writer_work = $data['Writer_work'];
                }
                if(Arr::exists($data, 'Retired_Judge_from')){
                    $membership->Retired_Judge_from = $data['Retired_Judge_from'];
                }
                if(Arr::exists($data, 'Retired_Judge_as')){
                    $membership->Retired_Judge_as = $data['Retired_Bureaucrat_as'];
                }
                if(Arr::exists($data, 'organization_name_n_role')){
                    $membership->organization_name_n_role = $data['organization_name_n_role'];
                }



        $membership->another_membership = $data['another_membership'];
        $membership->correspondence_address = $data['correspondence_address'];
        // $membership->beneficial_for_our_cause = $data['beneficial_for_our_cause'];
        // $membership->isVerified = 1;




        // $imageName = time().'.'.$request->image->extension();
        // $request->image->move(public_path('membership/identity'), $imageName);
        if(Arr::exists($data, 'proving_your_identity')){
            $fileName = time().'_'.$data['proving_your_identity']->getClientOriginalName();
            $filePath = $data['proving_your_identity']->storeAs('membership/identity/', $fileName, 'public');
            $membership->proving_your_identity = $fileName;            
        }



        if(Arr::exists($data, 'passport_photo')){
            $fileName = time().'_'.$data['passport_photo']->getClientOriginalName();
            $filePath = $data['passport_photo']->storeAs('membership/passport_photo/', $fileName, 'public');
            $membership->passport_photo = $fileName;            
        }



        $membership->user_id = $user->id;
        $membership->save();

        return $user;

    }

    public function email_verification(){
        return view('auth.verify_account');
    }

    public function verifyUser($token)
    {
      $verifyUser = VerifyUser::where('token', $token)->first();
      if(isset($verifyUser) ){
        $user = $verifyUser->user;
        if(!$user->email_verified_at) {
            return view('auth.passwords.set_new_pwd')
                        ->with('user', $user)->with('successMsg','Email verified! Please set your account password!');
          // $verifyUser->user->email_verified_at = now();
          // $verifyUser->user->save();
          $status = "Your E-mail is verified. You can now login.";
        } else {
          $status = "Your E-mail is already verified";
        }
      } else {
        return redirect('/login')->with('error', "Sorry your email cannot be identified.");
      }
      return redirect('/login')->with('success', $status);
    }

    public function add_new_pwd(Request $request)
    {
         
            $request->validate([
                'password' => 'required|confirmed|min:6'
            ]);

            $user = User::where('email', $request->email)->first();
            $user->email_verified_at = now();
            $user->password = Hash::make($request->password);
            $user->donor = 1;
            $user->update();
            return redirect('/login')->with('success', 'Your Password is set. Admin will approve your account shorlty.');

    }

}
