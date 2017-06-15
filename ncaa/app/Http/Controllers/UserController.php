<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    /**
     * Display all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'username'   => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => 'required|string|min:6'
        ]);

        User::create(request([
            'first_name', 'last_name', 'username', 'email', 'password'
        ]));

        Session::flash('flash_message', 'User ' . $request->first_name . ' created successfully!');

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate(request(), [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'username'   => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users,email,'.$user->id
        ]);

        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->username   = $request->username;
        $user->email      = $request->email;

        $user->save();

        Session::flash('flash_message', 'User ' . $user->first_name . ' updated successfully!');

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // $this->authorize('destroy', $user);
        $user->delete();
        // Send the confirmation message to the redirect page, where it can be accessed
        Session::flash('flash_message', 'User ' . $user->first_name . ' deleted successfully!');

        return redirect('/users');
    }
}
