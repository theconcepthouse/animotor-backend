<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\DriverDocument;
use App\Models\DriverForm;
use App\Models\Form;
use App\Models\FormData;
use App\Models\History;
use App\Models\Payment;
use App\Models\Rate;
use App\Models\User;
use App\Services\DriverDocumentService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


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

    public function all(){
        $drivers = User::whereHasRole(['driver', 'customer'])->latest()->get();
        return view('admin.driver.index', compact('drivers'));
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

        $driverDocumentService->createOrUpdate($request['document_id'], $request['driver_id'], $request['status'], $request['expiry_date'], $request['file'], $request['comment'], $request['is_approved']);

        return redirect()->back()->with('success','Document update');
    }




    // new code
     public function createDriver(Request $request)
    {
//        $driver = User::findOrFail($driverId);

        $role = $request->get('role') ?? 'driver';

        return view('admin.driver.create-driver', compact('role',  ));
    }


     public function storeDriver(Request $request)
    {

        if(isOwner() && !in_array($request->input('role'), ['manager','rider'])){
            return redirect()->route('admin.dashboard')->with('failure','you are not permitted to create this user');
        }

        $rules = [
            'first_name' => 'string|min:1|max:255|required',
            'last_name' => 'nullable',
            'phone' => 'string|min:1|max:255|required|unique:users',
            'email' => 'string|min:1|max:255|required|unique:users|email',
            'work_phone' => 'nullable',
            'hire_type' => 'required',
            'role' => 'required',
            'password' => 'required|string|min:3',
        ];


        $data = $request->validate($rules);
        $data['password'] = Hash::make($request->password);
        $data['pass'] = $request->password;


        // Check if user exists, if yes, update; if no, create new
        $user = User::updateOrCreate(
            ['id' => $request->driver_id],
            $data
        );

        $user->syncRoles([$data['role']]);

        $formId = $request->get('form_id');
        $newData = $request->except(['_token', 'driver_id', 'form_id', 'sending_method']);

        $this->createDriverForm($user->id);
        $form = DriverForm::where('driver_id', $user->id)->first();
        $form->update(['personal_details' => $newData]);

        return redirect()->back()->with(['success' => 'Driver successfully created']);

    }

    public function createOnBoarding(Request $request)
    {
        $role = $request->get('role') ?? 'driver';
        $rates = Rate::all();
        return view('admin.driver.create-onboarding', compact('role', 'rates'));
    }

    public function addDriver(Request $request)
    {
         $role = $request->get('role') ?? 'driver';
        return view('admin.driver.add-driver', compact('role'));
    }

    public function addDocument($userId)
    {
        $driver = User::findOrFail($userId);

        $title = $driver->name.' documents';
        $data = $driver->documents;

        $all_docs = Document::where('status',true)->where('is_required', true)->get();
       return view('admin.driver.others.add-document', compact('all_docs', 'driver', 'data', 'title'));
    }

    public function addNewDoc(Request $request)
    {
        $doc_file = DriverDocument::where('document_id', $request->get('document_id'))->first();
        if ($doc_file){
            return redirect()->back()->with('error', 'Document already exist');
        }
        $driver_doc = new DriverDocument();
        $driver_doc->document_id = $request->get('document_id');
        $driver_doc->driver_id = $request->get('driver_id');
        $driver_doc->save();
        return redirect()->back()->with('success', 'successfully added');
    }

     public function storeDocument(Request $request, DriverDocumentService $driverDocumentService)
    {

        $request->validate([
            'driver_id' => 'required',
            'document_id' => 'required',
        ]);
        $driverDocumentService->createOrUpdateDoc($request['document_id'], $request['driver_id'], $request['expiry_date'], $request['file'], $request['driving_license_number']);

        return redirect()->back()->with('success','Document update');
    }



    public function deleteDriver($driverId)
    {
        $driver = User::findOrFail($driverId);
        $driver->delete();

        DriverForm::where('driver_id', $driverId)->delete();
        return redirect()->back()->with('success','Driver successfully deleted');
    }

    public function driverStatus(Request $request, $driverId)
    {
        $driver = User::findOrFail($driverId);
        $driver->status = $request->status;
        $driver->save();
        return redirect()->back()->with('success','Driver status successfully updated');
    }







}
