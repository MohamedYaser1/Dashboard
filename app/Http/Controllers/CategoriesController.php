<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Cities;
use App\Models\Countries;
use App\Models\Posts;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        
        //dd($categories);

        return view('categories.categories', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

        $name = request()->name;
        $active = request()->active;
        //dd($active);
        if ($active == null ) 
        {
            throw ValidationException::withMessages([
                'select' => 'You Must Select Active Or Not Active'
            ]);
        }

        //dd($title, $select);

        // 2. store the data in database
        
        // this is way to save data in database
        $category = new Category();

        $category->name = $name;
        $category->active = $active;

        $category->save();

        return to_route('categories.index')->with('success','Category Added Successfully');

    }
    

    public function show(string $id)
    {

        $users = Users::all();
        $posts = Posts::all();
        $countries = Countries::all();
        $cities = Cities::all(); 
        $category = Category::find($id);
        $categories = Category::all();

        return view('categories.show', ['posts'=>$posts, 'users'=>$users, 'countries'=>$countries, 'cities'=>$cities, 'category'=>$category, 'categories'=>$categories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoryinfo = Category::find($id);

        return view('categories.edit', ['category'=>$categoryinfo]);
    }


    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {

        $name = request()->name;
        $active = request()->active;

        //dd($request->all());

        // 2. store the data in database
        
        // this is way to save data in database
        $category = Category::find($id);
        $category->name = $name;
        $category->active = $active;

        $category->save();

        /* $category->update([
            'name'=>$name,
            'active'=>$request->has('active')]); */

        return to_route('categories.index')->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $deleteId = Category::find($request->category_delete_id);
        $deleteId->delete();

        return to_route('categories.index')->with('success', 'Category Deleted Successfully');
    }
}