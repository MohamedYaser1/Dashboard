<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admins::all();
        return view('admins.admins', ['admins'=>$admins]);    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admins.add');
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
            'email' => ['required', 'email:rfc']
        ]);

        
        $name = request()->name;
        $username = request()->username;
        $password = Hash::make(request()->password);
        $email = request()->email;
        

        //dd($all);

        // 2. store the data in database
        
        // this is way to save data in database
        $admin = new Admins();

        $admin->name = $name;
        $admin->username = $username;
        $admin->password = $password;
        $admin->email_address = $email;
        
        $admin->save();

        return to_route('admins.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admins $admins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $admin)
    {
        $admin = Admins::find($admin);
        return view('admins.edit',['admin'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $admin)
    {
        request()->validate([
            'name' => ['required', 'min:3'],
            'username' => ['required'],
            'password' => 'required|string|min:5|confirmed',
            'password_confirmation' => 'required|min:5',
            'email' => ['required', 'email:rfc']
        ]);

        
        $name = request()->name;
        $username = request()->username;
        $password = Hash::make(request()->password);
        $email = request()->email;
        

        //dd($all);

        // 2. store the data in database
        
        // this is way to save data in database
        $admin = Admins::find($admin);

        $admin->name = $name;
        $admin->username = $username;
        $admin->password = $password;
        $admin->email_address = $email;
        
        $admin->save();

        return to_route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $admins)
    {
        $deleteId = Admins::find($admins);
        $deleteId->delete();

        return to_route('admins.index');
    }
}