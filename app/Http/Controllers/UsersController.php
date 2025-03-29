<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules\Password;
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

        return view('users.add',  ['cities'=>$cities],[ 'countries'=>$countries]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => ['required', 'min:3'],
            'username' => ['required'],
            'password' => 'required|string|min:5|confirmed',
            'password_confirmation' => 'required|min:5',
            'email' => ['required', 'email:rfc'],
            'active' => ['required'],
        ]);

        
        $name = request()->name;
        $username = request()->username;
        $password = Hash::make(request()->password);
        $email = request()->email;
        $active = request()->active;
        
        
        /* $select_county = request()->select_county;
        $select_city = request()->select_city; */
        

        //dd($all);

        // 2. store the data in database
        
        // this is way to save data in database
        $user = new Users();

        $user->name = $name;
        $user->username = $username;
        $user->password = $password;
        $user->email_address = $email;
        $user->active = $active;
        
        $user->save();

        return to_route('users.index');
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
    public function update(Request $request, string $user)
    {
        request()->validate([
            'name' => ['required', 'min:3'],
            'username' => ['required'],
            'password' => 'required|string|min:5|confirmed',
            'password_confirmation' => 'required|min:5',
            'email' => ['required', 'email:rfc'],
            'active' => ['required'],
        ]);

        
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

        return to_route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $users)
    {
        $deleteId = Users::find($users);
        $deleteId->delete();

        return to_route('users.index');
    }
}