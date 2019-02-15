<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::get();
        return view('User.index')->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Role = Role::get();
        return view('User.create')->with('role', $Role);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role           = Role::where('id', $request->role_id)->first();
        $User           = new User;
        $User->name     = $request->name;
        $User->email    = $request->email;
        $User->password = $request->password;
        $User->save();
        $User->roles()->attach($role);

        return redirect('admin/user')->with('success', 'Data inserted Successfully');
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
        $role = Role::get();
        $user = User::Find($id);
        return view('User.update')->with(compact('role', 'user'));
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
        $role           = Role::where('id', $request->role_id)->first();
        $User           = User::find($id);
        $User->name     = $request->get('name');
        $User->email    = $request->get('email');
        $User->password = $request->get('password');
        $User->roles()->detach();
        $User->update();
        $User->roles()->attach($role);

        return redirect('/admin/user')->with('success', ' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::find($id);
        $User->roles()->detach();
        $User->delete();

        return redirect('/admin/user')->with('success', 'User has been deleted Successfully');
    }
}
