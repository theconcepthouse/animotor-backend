<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function index()
    {
        $workshops = Workshop::latest()->paginate(100);
        return view('admin.workshop.index', compact('workshops'));
    }

    public function create()
    {
        return view('admin.workshop.create');
    }

   public function edit($workshopId)
   {
       $workshop = Workshop::findOrFail($workshopId);
       return view('admin.workshop.edit', compact('workshop'));
   }

   public function update(Request $request, $workshopId)
   {
       $workshop = Workshop::findOrFail($workshopId);
       return $request;
   }

   public function destroy($workshopId)
   {
       $workshop = Workshop::find($workshopId);
       $workshop->delete();
       return redirect()->back()->with('success', 'Workshop has been deleted');
   }

}
