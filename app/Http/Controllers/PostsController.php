<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Category;
use App\Models\Cities;
use App\Models\Countries;
use App\Models\Posts;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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

        return view('posts.posts', [ 'posts'=>$posts, 'users'=>$users, 'countries'=>$countries, 'cities'=>$cities, 'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Users::all();
        $countries = Countries::all();
        $cities = Cities::all();
        $categories = Category::all();
        if (Auth::user()->active == "1") {
            return view('posts.add', ['users'=>$users, 'countries'=>$countries, 'cities'=>$cities, 'categories'=>$categories]);
        }else{
            throw ValidationException::withMessages([
                'notactive' => "Sorry: You Can't Create Posts"
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

        $title = request()->title;
        $details = request()->details;
        $select_category = request()->select_category;
        $select_country = request()->select_country;
        $select_city = request()->select_city;
        $active = request()->active;
        $posted_by = request()->posted_by;
        $img_name = null;
        if ($request->has('img')) {
            $img = request()->file('img');
            $img_exe = $img->getClientOriginalExtension();
            $img_name = time().'.'.$img_exe;
            
            $path = 'storage/post_image/';
            
            $img->move($path, $img_name);
        }  
        

        $post = new Posts();
        $post->title = $title;
        $post->details = $details;
        if ($img_name) {
            $post->img = $img_name;
        }
        $post->user_id = $posted_by;
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
    public function update(UpdatePostRequest $request, string $post)
    {

        $title = request()->title;
        $details = request()->details;
        $select_category = request()->select_category;
        $select_country = request()->select_country;
        $select_city = request()->select_city;
        $active = request()->active;
        $user_id = Auth::user()->id;
        $img_name = null;


        $post = Posts::find($post);

        if ($request->has('img')) {
            $destination = 'storage/post_image/'.$post->img;
            if (File::exists($destination)) 
            {
                File::delete($destination);
            }
            $img = request()->file('img');
            $img_exe = $img->getClientOriginalExtension();
            $img_name = time().'.'.$img_exe;            
            $path = 'storage/post_image/';
            
            $img->move($path, $img_name);
        } 
        

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

        return redirect()->route('posts.index')->with('success', 'Post Updated Successfully');

    }

    /* Display Cities by Countries using ajax */

    public function getCity(Request $request)
    {
        $data['cities'] = Cities::where("country_id",$request->country_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $deleteId = Posts::find($request->post_delete_id);
        $destination = 'storage/post_image/'.$deleteId->img;
            if (File::exists($destination)) 
            {
                File::delete($destination);
            }
        $deleteId->delete();

        return to_route('posts.index')->with('success', 'Post Deleted Successfully');
    }
}