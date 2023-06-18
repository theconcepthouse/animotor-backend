<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\User;
use App\Services\DriverDocumentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    public function index($status){

        if(!in_array($status,['approved','unapproved','negative_balance'])){
            $title = "All Drivers";
            $drivers = User::whereHasRole(['driver'])->latest()->paginate(500);
        }else{

            if($status == 'negative_balance'){
                $title = " Drivers with negative balance ";

                $drivers = User::whereHasRole(['driver'])->where('status', 'active')->latest()->paginate(500);
            }else{

                $title = $status." Drivers ";

                $drivers = User::whereHasRole(['driver'])->where('status', $status)->latest()->paginate(500);
            }

        }

        return view('admin.driver.list', compact('drivers', 'title'));
    }

    public function documents($driver_id, DriverDocumentService $driverDocumentService){
        $driver = User::findOrFail($driver_id);

        $title = $driver->name.' documents';
        $documentIds = $driver->documents->pluck('document_id');
        $data = $driver->documents;
        $missing_documents = Document::where('status',true)->where('is_required', true)->whereNotIn('id', $documentIds)->get();

        if($driver->documents->count() < 1 && count($missing_documents) > 0){
            $driverDocumentService->createRequired($driver);
            return redirect()->route('admin.driver.documents',['id' => $driver_id]);
        }

        return view('admin.driver.documents',compact('missing_documents','driver','title','data'));
    }

    public function updateDocument(Request $request, DriverDocumentService $driverDocumentService): RedirectResponse
    {
        $request->validate([
            'driver_id' => 'required',
            'document_id' => 'required',
        ]);

        $driverDocumentService->createOrUpdate($request['document_id'], $request['driver_id'], $request['status'], $request['expiry_date'], $request['file'], $request['comment']);

        return redirect()->back()->with('success','Document update');
    }
}
