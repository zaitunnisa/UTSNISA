<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $status = $request->get('status');

if($status){
    $users = \App\Models\User::where('status', $status)->paginate(10);
} else {
    $users = \App\Models\User::paginate(10);
}

    $users = \App\Models\User::paginate(10);

    $filterKeyword = $request->get('keyword');

    if($filterKeyword){
        if($status){
            $users = \App\Models\User::where('email', 'LIKE', "%$filterKeyword%")
                ->where('status', $status)
                ->paginate(10);
        } else {
            $users = \App\Models\User::where('email', 'LIKE', "%$filterKeyword%")
                    ->paginate(10);
        }
    }

    return view('users.index', ['users' => $users]);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $new_user = new \App\Models\User;
    $new_user->name = $request->get('name');
    $new_user->username = $request->get('username');
    $new_user->roles = json_encode($request->get('roles'));
    $new_user->address = $request->get('address');
    $new_user->phone = $request->get('phone');
    $new_user->email = $request->get('email');
    $new_user->password = \Hash::make($request->get('password'));

    if($request->file('avatar')){
        $file = $request->file('avatar')->store('avatars', 'public');
        $new_user->avatar = $file;
    } 

    $new_user->save();
    return redirect()->route('users.create')->with('status', 'User successfully created');
}   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \App\Models\User::findOrFail($id);

        return view('users.show', ['user' => $user]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
     {
        $user->name = $request->get('name');
        $user->roles = json_encode($request->get('roles'));
        $user->address = $request->get('address');
        $user->phone = $request->get('phone');
        $user->status = $request->get('status');
     
         return view('users.edit', ['user' => $user]);
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
        $user = \App\Models\User::findOrFail($id);
    
        $user->delete();
    
        return redirect()->route('users.index')->with('status', 'User successfully deleted');
    }
}
