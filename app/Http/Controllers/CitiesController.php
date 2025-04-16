<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Countries;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use function Laravel\Prompts\select;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = Cities::all();
        $countries = Countries::all();

        return view('cities.cities', ['cities'=>$cities],[ 'country'=>$countries]);
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
        request()->validate([
            'name' => 'required | min:3 | unique:cities',
            'select' => ['required'],
        ]);

        $name = request()->name;
        $select = request()->select;
        //dd($select);
        if ($select == 'null' ) {
            throw ValidationException::withMessages([
                'select' => 'Sorry: Select Country'
            ]);
        }

        //dd($title, $select);

        // 2. store the data in database
        
        // this is way to save data in database
        $city = new Cities();

        $city->name = $name;
        $city->country_id = $select;
        $city->save();

        return to_route('cities.index');
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
        $Cityinfo = Cities::find($id);
        $countries = Countries::all();

        return view('cities.edit', ['city'=>$Cityinfo],[ 'country'=>$countries]);
    }


    public function update(Request $request, string $id)
    {
        request()->validate([
            'name' => 'required | min:3',
            'select' => ['required'],
        ]);

        $name = request()->name;
        $select = request()->select;
        if ($select == 'null' ) {
            throw ValidationException::withMessages([
                'select' => 'Sorry: Select Country'
            ]);
        }

        //dd($request->all());
        
        // this is way to save data in database
        $city = Cities::find($id);
        $city->name = $name;
        $city->country_id = $select;

        $city->save();

        return to_route('cities.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteId = Cities::find($id);
        $deleteId->delete();

        return to_route('Cities.index');
    }
}