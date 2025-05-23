<?php

namespace App\Http\Controllers;

use App\Http\Requests\Country\StoreCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;
use App\Models\Countries;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function index()
    {
        $countries = Countries::all();
        
        return view('countries.countries', ['countries'=>$countries]);
    }


    public function create()
    {
        
    }


    public function store(StoreCountryRequest $request)
    {

        $name = request()->name;

        //dd($title, $select);

        // 2. store the data in database
        
        // this is way to save data in database
        $country = new Countries();

        $country->name = $name;
        $country->save();

        return to_route('countries.index')->with('success', 'Country Created Successfully');

    }


    public function show(string $id)
    {
        
    }


    public function edit(string $id)
    {
        $countryinfo = Countries::find($id);

        return view('countries.edit', ['country'=>$countryinfo]);
    }


    public function update(UpdateCountryRequest $request, string $id)
    {

        $name = request()->name;

        //dd($request->all());
        
        // this is way to save data in database
        $country = Countries::find($id);
        $country->name = $name;

        $country->save();

        return to_route('countries.index')->with('success', 'Country Updated Successfully');
    }


    public function destroy(Request $request)
    {
        $deleteId = Countries::find($request->country_delete_id);
        $deleteId->delete();

        return to_route('countries.index')->with('success', 'Country Deleted Successfully');
    }
}