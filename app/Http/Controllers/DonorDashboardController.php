<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Donation;

class DonorDashboardController extends Controller
{
    // public function __construct()
    // {
        // if(Auth::user()->can('donor-dashboard')){
        //     abort(404);
        // }
    // }

    public function certificate_80g(){
        return view('campaign.donor_dashboard.certificate');
    }

    public function donor_donations(){
        $donations = Donation::with('Campaign')->where('user_id', Auth::user()->id)->get();
        return view('campaign.donor_dashboard.donations', compact('donations'));
    }

    public function donor_profile()
    {
        $user = Auth::user();
        return view('campaign.donor_dashboard.profile', compact('user'));
    }

    public function donor_profile_update(Request $request)
    {
                $this->validate($request, [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email,'.$id,
                    'password' => 'same:confirm-password',
                ]);

        $input = $request->all();

        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        
        return redirect()->route('profile')
                        ->with('success','Profile Updated Successfully');
    }

}
