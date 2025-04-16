<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cities;
use App\Models\Countries;
use App\Models\Posts;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Users::all();
        $posts = Posts::all();
        $countries = Countries::all();
        $cities = Cities::all();
        $categories = Category::all();

        if (Auth::user()) {
            return view('index', ['posts'=>$posts, 'users'=>$users, 'countries'=>$countries, 'cities'=>$cities, 'categories'=>$categories]);
        }else{
            return view('auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}