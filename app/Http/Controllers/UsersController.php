<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Cities;
use App\Models\Countries;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Users::all();
        return view('users.users', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Countries::all();
        $cities = Cities::all();

        return view('users.add',  ['cities'=>$cities],[ 'countries'=>$countries ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        $name = request()->name;
        $username = request()->username;
        $password = Hash::make(request()->password);
        $email = request()->email;
        $active = request()->active;
        $usertype = request()->usertype;

        //dd($all);

        // 2. store the data in database
        
        // this is way to save data in database
        $user = new Users();

        $user->name = $name;
        $user->username = $username;
        $user->password = $password;
        $user->email_address = $email;
        $user->active = $active;
        $user->usertype = $usertype;

        $user->save();

        return to_route('users.index')->with('success', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $user)
    {
        $user = Users::find($user);
        return view('users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $user)
    {
        
        $name = request()->name;
        $username = request()->username;
        $password = Hash::make(request()->password);
        $email = request()->email;
        $active = request()->active;


        $user = Users::find($user);

        $user->name = $name;
        $user->username = $username;
        $user->password = $password;
        $user->email_address = $email;
        $user->active = $active;
        
        $user->save();

        return to_route('users.index')->with('success', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $deleteId = Users::find($request->user_delete_id);
        $deleteId->delete();

        return to_route('users.index')->with('success', 'User Deleted Successfully');
        
    }
}