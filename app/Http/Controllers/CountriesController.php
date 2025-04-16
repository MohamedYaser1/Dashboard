<?php

namespace App\Http\Controllers;

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


    public function store()
    {
        request()->validate([
            'name' => 'required | min:3 | unique:countries',
        ]);

        $name = request()->name;

        //dd($title, $select);

        // 2. store the data in database
        
        // this is way to save data in database
        $country = new Countries();

        $country->name = $name;
        $country->save();

        return to_route('countries.index');

    }


    public function show(string $id)
    {
        
    }


    public function edit(string $id)
    {
        $countryinfo = Countries::find($id);

        return view('countries.edit', ['country'=>$countryinfo]);
    }


    public function update(Request $request, string $id)
    {
        request()->validate([
            'name' => 'required | min:3',
        ]);

        $name = request()->name;

        //dd($request->all());
        
        // this is way to save data in database
        $country = Countries::find($id);
        $country->name = $name;

        $country->save();

        return to_route('countries.index');
    }


    public function destroy(string $id)
    {
        $deleteId = Countries::find($id);
        $deleteId->delete();

        return to_route('countries.index');
    }
}