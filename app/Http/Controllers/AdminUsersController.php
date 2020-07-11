<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class AdminUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin/users/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    // INSTEAD OF REQUEST, WE USE THE UsersRequest Class
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required','min: 3'],
            'password' => ['required', 'min: 8'],
            'email' => ['required', 'email']
        ]);
        $user_email_val = User::where('email', $request->email)->find(1);
        if ($validator->fails()) {
           return redirect(url()->previous())->withErrors($validator)->withInput();
       }elseif ($request->is_active == "Choose Status") {
           return redirect(url()->previous())->withErrors('Please select your status')->withInput();
       }elseif (isset($user_email_val->email) && $request->email == $user_email_val->email) {
           return redirect(url()->previous())->withErrors('Email has already been used')->withInput();
       }else{
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->password = Hash::make($request->password);
        $user->is_active = $request->is_active;
        if ($user->save()) {
            return redirect(url('admin/users'));
        }   
    }
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
}
