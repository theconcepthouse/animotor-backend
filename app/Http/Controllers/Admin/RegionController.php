<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Region;
use App\Models\Zone;
use App\Services\DataService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use MatanYadaev\EloquentSpatial\Objects\LineString;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Objects\Polygon;

class RegionController extends Controller
{
    public function index(Request $request)
    {
        $defaultTitle = "Region listing (service areas)";
        $title = $defaultTitle;

        if ($request->has('region_id')) {
            $region = Region::findOrFail($request->region_id);
            if ($region) {
                $title = $region->name . " sub regions listing";
            }
            $data = Region::byParentId($request->region_id)->paginate(100);
        } else if ($request->has('country_id')) {
            $country = Country::findOrFail($request->country_id);
            if ($country) {
                $title = $country->name . " regions listing";
            }
            $data = Region::byCountryId($request->country_id)->paginate(100);
        } else {
            $data = Region::paginate(100);
        }

        return view('admin.service_area.list', compact('data', 'title'));
    }

    public function create()
    {
        $regions = Region::whereNull('parent_id')->where('is_active', true)->get();
        $countries = Country::where('is_active',true)->orderBy('name', 'asc')->get();
        $timezones = (new DataService())->timeZones();
        return view('admin.service_area.create', compact('regions','countries','timezones'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $this->validateData($request);

//        if(!$validatedData['currency_code'] || !$validatedData['currency_symbol']){
             $country = Country::find($validatedData['country_id']);
            if($country){
                $validatedData['currency_code'] = $country->currency_code;
                $validatedData['currency_symbol'] = $country->currency_symbol;
            }
//        }

        $polygon = [];

        if($request->has('coordinates')){
            $value = $request->coordinates;

            foreach(explode('),(',trim($value,'()')) as $index=>$single_array){
                if($index == 0)
                {
                    $lastcord = explode(',',$single_array);
                }
                $coords = explode(',',$single_array);
                $polygon[] = new Point($coords[0], $coords[1]);
            }

            $polygon[] = new Point($lastcord[0], $lastcord[1]);
        }

        $validatedData['coordinates'] = new Polygon([new LineString($polygon)]);

        Region::create($validatedData);

        return redirect()->route('admin.regions.index')->with('success', 'Region created successfully.');
    }

    public function edit(Region $region)
    {
//        $region = Region::findOrFail($region->id);
        $regions = Region::whereNull('parent_id')->where('is_active', true)->get();
        $countries = Country::where('is_active',true)->orderBy('name', 'asc')->get();

        $timezones = (new DataService())->timeZones();


        $region= Region::selectRaw("*,ST_AsText(ST_Centroid(`coordinates`)) as center")->findOrFail($region->id);

        if (isset($region->coordinates[0])) {
            $area = json_decode($region->coordinates[0]->toJson(),true);
        } else {
            $area = [
                'lat' => 23.757989,
                'lng' => 90.360587,
            ];
        }


        return view('admin.service_area.edit', compact('region','regions','countries','area','timezones'));
    }

    public function getAllZoneCordinates($id = 0): JsonResponse
    {
        $zones = Region::where('id', '<>', $id)->active()->get();
        $data = [];
        foreach($zones as $zone)
        {
            $area = json_decode($zone->coordinates[0]->toJson(),true);
            $data[] = format_coordiantes($area['coordinates']);
        }
        return response()->json($data,200);
    }

    public function search(Request $request): JsonResponse
    {
        $key = explode(' ', $request['search']);
        $zones=Region::where(function ($q) use ($key) {
            foreach ($key as $value) {
                $q->orWhere('name', 'like', "%{$value}%");
            }
        })->limit(50)->get();
        return response()->json([
            'view'=>view('admin-views.zone.partials._table',compact('zones'))->render(),
            'total'=>$zones->count()
        ]);
    }


    public function update(Request $request, Region $region): \Illuminate\Http\RedirectResponse
    {

        $validatedData = $this->validateData($request, $region);

        $polygon = [];

        if($request->has('coordinates')){
            $value = $request->coordinates;

            foreach(explode('),(',trim($value,'()')) as $index=>$single_array){
                if($index == 0)
                {
                    $lastcord = explode(',',$single_array);
                }
                $coords = explode(',',$single_array);
                $polygon[] = new Point($coords[0], $coords[1]);
            }

            $polygon[] = new Point($lastcord[0], $lastcord[1]);
        }

        $validatedData['coordinates'] = new Polygon([new LineString($polygon)]);

        $region->update($validatedData);

        return redirect()->route('admin.regions.index')->with('success', 'Region updated successfully.');
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
            'currency_code' => 'nullable',
            'currency_symbol' => 'nullable',
            'timezone' => 'required',
            'is_active' => 'nullable',
            'parent_id' => 'nullable',
            'country_id' => 'nullable',
            'image' => 'nullable',
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
