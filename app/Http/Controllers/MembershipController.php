<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Membership;
use App\User;
use Illuminate\Support\Facades\Hash;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

        // dd($user->id);
        // $input = $request->all();
        // $input['user_id'] = $user->id;
        // $input['concent'] = NULL;

        // unset($input['_token']);
        // unset($input['name']);
        // unset($input['email']);
        // unset($input['password']);
        
        // dd($input);

        // $membership = Membership::create($input);
        $membership = new Membership();
        $membership->gender = $request->gender;
        $membership->dob = $request->dob;
        $membership->mobile = $request->mobile;
        $membership->country = $request->country;
        $membership->state = $request->state;
        $membership->district = $request->district;
        $membership->police_station = $request->police_station;
        $membership->pin_code = $request->pin_code;
        $membership->category = $request->category;
        $membership->Advocate_Lawyer_police_station = $request->Advocate_Lawyer_police_station;
        $membership->Advocate_Lawyer_pin_code = $request->Advocate_Lawyer_pin_code;
        $membership->Advocate_Lawyer_practice_in = $request->Advocate_Lawyer_practice_in;
        $membership->Advocate_Lawyer_practicing = $request->Advocate_Lawyer_practicing;
        $membership->Law_Student_Activist_work = $request->Law_Student_Activist_work;
        $membership->Journalist_work = $request->Journalist_work;
        $membership->Writer_work = $request->Writer_work;
        $membership->Retired_Judge_from = $request->Retired_Judge_from;
        $membership->Retired_Judge_as = $request->Retired_Judge_as;
        $membership->another_membership = $request->another_membership;
        $membership->correspondence_address = $request->correspondence_address;
        $membership->beneficial_for_our_cause = $request->beneficial_for_our_cause;
        $membership->proving_your_identity = $request->proving_your_identity;
        $membership->passport_photo = $request->passport_photo;
        $membership->concent = $request->concent;
        $membership->user_id = $user->id;
        $membership->save();

        if($membership){
            dd('Inserted', $membership);
        }else{
            User::find($user->id)->delete();
        }

        dd('Not inserted');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function get_districts(Request $request)
    {
            $districts = DB::table('districts')->where('state_id', $request->state_id)->get()->toArray();
            $result = [];
            if($districts){
                return $districts;
                // for($i = 0; $i<count($districts); $i++){
                    // return $districts[$i];

                    // $result[ $i ] = '<option id='.$districts[$i].'>'.$districts[$i].'</option>';
                // }
                // return $districts;
            }
    }
}
