<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegionController extends Controller
{
    public function index()
    {
        $data = Region::paginate(100);
        $title = "Region listing (service areas)";
        return view('admin.service_area.list', compact('data','title'));
    }

    public function create()
    {
        return view('admin.service_area.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $this->validateData($request);

        Region::create($validatedData);

        return redirect()->back()->with('success', 'Region created successfully.');
    }

    public function edit(Region $region)
    {
        return view('region.edit', compact('region'));
    }

    public function update(Request $request, Region $region): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $this->validateData($request, $region);

        $region->update($validatedData);

        return redirect()->route('region.index')->with('success', 'Region updated successfully.');
    }

    public function destroy(Region $region)
    {
        $region->delete();

        return redirect()->route('region.index')->with('success', 'Region deleted successfully.');
    }

    private function validateData(Request $request, Region $region = null): array
    {
        $rules = [
            'name' => 'required|unique:regions,name',
            'currency_code' => 'required',
            'currency_symbol' => 'required',
            'timezone' => 'required',
            'is_active' => 'required',
            'coordinates' => 'required',
        ];

        if ($region) {
            $rules['name'] = [
                'required',
                Rule::unique('regions')->ignore($region->id),
            ];
        }

        return $request->validate($rules);
    }
}
