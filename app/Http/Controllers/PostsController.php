<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cities;
use App\Models\Countries;
use App\Models\Posts;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class PostsController extends Controller
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


        return view('posts.posts', ['posts'=>$posts, 'users'=>$users, 'countries'=>$countries, 'cities'=>$cities, 'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        $countries = Countries::all();
        $cities = Cities::all();
        $categories = Category::all();
        return view('posts.add', ['user_id'=>$user_id, 'countries'=>$countries, 'cities'=>$cities, 'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'details' => 'required|max:254',
            'img' => 'mimes:png,jpg,jpeg',
            'select_category' => 'required',
            'select_country' => 'required',
            'select_city' => 'required',
            'active' => 'required',
        ]);

        $title = request()->title;
        $details = request()->details;
        $select_category = request()->select_category;
        $select_country = request()->select_country;
        $select_city = request()->select_city;
        $active = request()->active;
        $user_id = Auth::user()->id;
        $img_name = null;
        if ($request->has('img')) {
            $img = request()->file('img');

            $img_name = $img->getClientOriginalName();
            $path = 'post_img/';
            
            $img->move($path, $img_name);
        }        

        $post = new Posts();
        $post->title = $title;
        $post->details = $details;
        if ($img_name) {
            $post->img = $img_name;
        }
        $post->user_id = $user_id;
        $post->category_id = $select_category;
        $post->country_id  = $select_country;
        $post->city_id  = $select_city;
        $post->active = $active;

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = Users::all();
        $post = Posts::find($id);
        $countries = Countries::all();
        $cities = Cities::all();
        $categories = Category::all();


        return view('posts.show', ['post'=>$post, 'users'=>$users, 'countries'=>$countries, 'cities'=>$cities, 'categories'=>$categories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $post)
    {
        $post = Posts::find($post);
        $countries = Countries::all();
        $cities = Cities::all();
        $categories = Category::all();

        return view('posts.edit', ['post'=>$post, 'countries'=>$countries, 'cities'=>$cities, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $post)
    {
        $request->validate([
            'title' => 'required|min:3',
            'details' => 'required|max:254',
            'img' => 'mimes:png,jpg,jpeg',
            'select_category' => 'required',
            'select_country' => 'required',
            'select_city' => 'required',
            'active' => 'required',
        ]);

        $title = request()->title;
        $details = request()->details;
        $select_category = request()->select_category;
        $select_country = request()->select_country;
        $select_city = request()->select_city;
        $active = request()->active;
        $user_id = Auth::user()->id;
        $img_name = null;
        if ($request->has('img')) {
            $img = request()->file('img');

            $img_name = $img->getClientOriginalName();
            $path = 'post_img/';
            
            $img->move($path, $img_name);
        } 
        
        if ($select_category == 'null' ) {
            throw ValidationException::withMessages([
                'select' => 'Sorry: You Must Select Category'
            ]);
        }
        if ($select_country == 'null' ) {
            throw ValidationException::withMessages([
                'select' => 'Sorry: You Must Select Country'
            ]);
        }
        if ($select_city == 'null' ) {
            throw ValidationException::withMessages([
                'select' => 'Sorry: You Must Select City'
            ]);
        }

        $post = Posts::find($post);
        $post->title = $title;
        $post->details = $details;
        if ($img_name) {
            $post->img = $img_name;
        }
        $post->user_id = $user_id;
        $post->category_id = $select_category;
        $post->country_id  = $select_country;
        $post->city_id  = $select_city;
        $post->active = $active;

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post Added Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}