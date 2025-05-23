<?php

namespace App\Http\Controllers;

use App\Http\Requests\City\StoreCityRequest;
use App\Http\Requests\City\UpdateCityRequest;
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
    public function store(StoreCityRequest $request)
    {

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

        return to_route('cities.index')->with('success', 'City Created Successfully');
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


    public function update(UpdateCityRequest $request, string $id)
    {

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

        return to_route('cities.index')->with('success', 'City Updated Successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $deleteId = Cities::find($request->city_delete_id);
        $deleteId->delete();

        return to_route('cities.index')->with('success', 'City Deleted Successfully');
    }
}