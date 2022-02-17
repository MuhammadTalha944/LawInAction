<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;

class permissionController extends Controller
{
    // function __construct()
    // {
    //      $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:role-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    // }

    function __construct()
    {
         $this->middleware('permission:permission-list', ['only' => 'index']);
    }

    public function index(Request $request)
    {
        $permission = Permission::orderBy('id','DESC')->get();
        return view('permission.index',compact('permission'));
    }

    public function create()
    {
        return view('permission.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);


        $role = Permission::create(
                                            [
                                                'name' => $request->input('name'),
                                                'guard_name' =>'web'
                                                    ]);


        return redirect()->route('permissions.index')
                        ->with('success','Permission created successfully');
    }



}
