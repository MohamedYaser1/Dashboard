<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\StoreAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;


class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $admins = Admins::all();
        return view('admins.admins', ['admins'=>$admins]);  */   

        $admins = Users::all();
        return view('admins.admins', ['admins'=>$admins]);
    }

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
    public function store(StoreAdminRequest $request)
    {
        
        $name = request()->name;
        $username = request()->username;
        $password = Hash::make(request()->password);
        $email = request()->email;
        $usertype = request()->usertype;
        

        //dd($all);

        // 2. store the data in database
        
        // this is way to save data in database
        $admin = new Users();

        $admin->name = $name;
        $admin->username = $username;
        $admin->password = $password;
        $admin->email_address = $email;
        $admin->usertype = $usertype;
        
        $admin->save();

        return to_route('admins.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Users $admins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $admin)
    {
        $admin = Users::find($admin);
        return view('admins.edit',['admin'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, string $admin)
    {
        
        $name = request()->name;
        $username = request()->username;
        $password = Hash::make(request()->password);
        $email = request()->email;
        

        //dd($all);

        // 2. store the data in database
        
        // this is way to save data in database
        $admin = Users::find($admin);

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
        $deleteId = Users::find($admins);
        $deleteId->delete();

        return to_route('admins.index');
    }
}