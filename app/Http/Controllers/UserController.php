<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Auth;

class UserController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->hasRole('Super Admin')){
            $data = User::orderBy('id','DESC')->get();
        }else{
            $data = User::where('id','!=','1')->orderBy('id','DESC')->get();
        }

        if(Auth::user()->hasRole('Joining Form Incharge') || Auth::user()->hasRole('Joining Form Evaluator')){
            $data = User::where('id', '!=', Auth::user()->id)->orderBy('id','DESC')->get();
        }

        return view('users.index',compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            // 'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        if($request->input('roles')){
            $user->assignRole($request->input('roles'));
        }

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**

     * Show the form for editing the specified resource.
     *
     */

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.edit',compact('user','roles','userRole'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            // 'roles' => 'required'
        ]);

        $input = $request->all();

        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);

        if($request->input('roles')){
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $user->assignRole($request->input('roles'));
        }

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function evaluate_user(Request  $request, $id){

        if($request->done_by_evaluator){
                $user = User::find($id);
                    $user->done_by_evaluator = $request->done_by_evaluator;
                $user->update();
            return redirect()->route('users.index');
        }
        $user = User::with('membership')->find($id);
        return view('users.show',compact('user'));
    }

    public function  user_verify($id, Request $request)
    {
            $user = User::find($id);

            if($request->verified_by_admin == 0 ){
                $user->verified_by_admin = 1;
                        $details = [
                            'name' => $user->name,
                            'body' => 'Congratulations, Membership Incharge has activated your account for LiA.',
                            'link' => env('APP_URL')
                        ];
                        \Mail::to($user->email)->send(new \App\Mail\UserActivationMail($details));
            }
            if($request->verified_by_admin == 1 ){
                $user->verified_by_admin = 0;
                        $details = [
                            'name' => $user->name,
                            'body' => 'We are sorry, Membership Incharge has de-activated your account for LiA. We will inform you very soon',
                            'link' => env('APP_URL')
                        ];
                        \Mail::to($user->email)->send(new \App\Mail\UserActivationMail($details));
            }

            $user->update();


            return redirect()->route('users.index');
    }

}
