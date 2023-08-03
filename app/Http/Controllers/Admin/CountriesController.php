<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function index()
    {
        $data = Country::all();
        $title = "Countries listing";
        return view('admin.countries.list', compact('data','title'));
    }


    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $this->validateData($request);

        Country::create($validatedData);

        return redirect()->back()->with('success', 'Country created successfully.');
    }


    public function update(Request $request, $id)
    {
        $country = Country::findOrFail($id);
        $validatedData = $this->validateData($request);

        $country->update($validatedData);

        return redirect()->back()->with('success', 'Country updated successfully.');
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);

        $country->delete();

        return redirect()->back()->with('success', 'Country deleted successfully.');
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);

       return view('admin.countries.edit', compact('country'));
    }

    private function validateData(Request $request): array
    {
        $rules = [
            'name' => 'required',
            'dial_code' => 'required',
            'code' => 'required',
            'flag' => 'nullable',
            'currency_name' => 'required',
            'currency_code' => 'required',
            'currency_symbol' => 'required',
            'dial_min_length' => 'required',
            'dial_max_length' => 'required',
        ];

        return $request->validate($rules);
    }
}
