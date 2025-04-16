<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showSignup()
    {
        return view('auth.register');
        
    }

    public function signup(Request $request)
    {
        /* $validated = $request->validate
        ([
            'name' => 'required|string|max:252',
            'username' => 'required|string|max:252',
            'email_address' => 'required|email|unique:users',
            'password' => 'required|string|min:8'
        ]);

        $user = Users::create($validated);

        dd($user);

        Auth::login($user);

        return redirect()->route('users.index'); */


        request()->validate([
            'name' => ['required', 'min:3'],
            'username' => 'required | unique:users',
            'password' => 'required|string|min:5|confirmed',
            'password_confirmation' => 'required|min:5',
            'email_address' => ['required', 'email:rfc']
        ]);

        //$all = $request->all();
        $name = request()->name;
        $username = request()->username;
        $password = Hash::make(request()->password);
        $email_address = request()->email_address;
        $usertype = request()->usertype;

        
        //dd($all);

        // 2. store the data in database
        
        // this is way to save data in database
        $user = new Users();

        $user->name = $name;
        $user->username = $username;
        $user->password = $password;
        $user->email_address = $email_address;
        $user->usertype = $usertype;
        //dd($all);

        
        $user->save();

        Auth::login($user);

        return to_route(route: 'index');
    
    }

    public function login(Request $request)
    {

        $validated = $request->validate
        ([
            'username' => 'required|string|max:252',
            'password' => 'required|string|min:5'
        ]);

        //dd($validated);

        if(Auth::attempt($validated))
        {
            $request->session()->regenerate();

            return redirect()->route('index');
        }

        throw ValidationException::withMessages([
            'wrongLogin' => 'Sorry: Wrong Username Or Paasword'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.show');
    }

    
}