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
            }else if($status == 'unapproved'){
                $title = " Drivers with negative balance ";

                $drivers = User::whereHasRole(['driver'])->whereIn('status', ['unapproved','blocked','pending'])->latest()->paginate(500);
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

    public function updateDocument(Request $request, DriverDocumentService $driverDocumentService)
    {
        $request->validate([
            'driver_id' => 'required',
            'document_id' => 'required',
        ]);

        if($request->has('status')){
            $status = $request->get('status');

            if($status == 'approved'){
                $request['is_approved'] = true;
            }
        }
        return $request->all();
       return $driverDocumentService->createOrUpdate($request['document_id'], $request['driver_id'], $request['status'], $request['expiry_date'], $request['file'], $request['comment'], $request['is_approved']);

        return redirect()->back()->with('success','Document update');
    }
}
