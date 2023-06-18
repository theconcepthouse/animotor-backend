<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Category;
use App\Models\CategoryAmount;
use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\OtherPayment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::paginate(100);
        return view('admin.doctors.list', compact('doctors'));
    }


    public function create()
    {
        return view('admin.doctors.create');
    }

    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        $today = Carbon::today()->toDateString();
        if($doctor->is_audiologist){
            $today_appointments = Appointment::whereDate('appointment_date', $today)->where('audiologist_id', $id)->get();

            $appointments = Appointment::where('audiologist_id', $id)->get();


        }else{
            $today_appointments = Appointment::whereDate('appointment_date', $today)->where('assigned_doctor_id', $id)->get();
            $appointments = Appointment::where('assigned_doctor_id', $id)->get();
        }
        return view('admin.doctors.view', compact('doctor','today_appointments','appointments'));
    }

    public function payments(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);
        $payments = Invoice::where('doctor_id',$id)->get();

        $other_payments = OtherPayment::where('doctor_id',$id)->get();

        $category_id = $request->input('category_id');
        $date_from = $request->input('date_from');
        $date_end = $request->input('date_end');
        $payment_status = $request->input('payment_status');

        $query = Appointment::query();

        if($doctor->is_audiologist){
            $query->where('audiologist_id', $id);
        }else{
            $query->where('assigned_doctor_id', $id);
        }

        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        if ($date_from) {
            $query->where('appointment_date', '>=', $date_from);
        }

        if ($payment_status) {
            $query->where('payment_status',  $payment_status);
        }

        if ($date_end) {
            $query->where('appointment_date', '<=', $date_end);
        }

        $appointments = $query->get();

//        $categories = Category::all();


        return view('admin.doctors.payments', compact('doctor','other_payments','payments',
            'appointments',
//            'categories',
            'date_end','date_from',
            'payment_status','category_id',
        ));
    }

    public function store(Request $request)
    {
        $rules = [
            'first_name' => 'string|min:1|max:255|required',
            'last_name' => 'nullable',
            'title' => 'nullable',
            'phone' => 'required|unique:doctors',
            'email' => 'required|unique:doctors',
            'joined' => 'required',
            'status' => 'nullable',
            'category' => 'required',
            'is_audiologist' => 'nullable',
        ];
        $data = $request->validate($rules);

        if($data['category'] == 'Audiologist'){
            $data['is_audiologist'] = true;
        }

        $doctor = Doctor::create($data);


        return redirect()->route('admin.doctor.edit',['doctor' => $doctor->id, 'payment' => 'yes'])->with('success','Doctor successfully created, please add payment details');
    }
    public function update(Request $request, $id)
    {
//        phone,'.$doctorId
        $rules = [
            'first_name' => 'string|min:1|max:255|required',
            'last_name' => 'nullable',
            'title' => 'nullable',
            'phone' => 'required|unique:doctors,phone,'.$id,
            'email' => 'required|unique:doctors,email,'.$id,
            'joined' => 'required',
            'status' => 'nullable',
            'is_audiologist' => 'nullable',
        ];
        $data = $request->validate($rules);

        $doctor = Doctor::findOrfail($id);

        $doctor->update($data);

        return redirect()->route('admin.doctor.index')->with('success','Doctor successfully updated');
    }




    public function edit($id)
    {
        $doctor = Doctor::findOrfail($id);
        $category_amounts = [];
        $categories = Category::whereStatus('active')->get();
//        $categories = Category::whereType('doctor')->whereStatus('active')->get();

        if(\request()->has('payment')){
            $category_amounts = CategoryAmount::whereType('doctor')->whereModelId($id)->get();
        }

        return view('admin.doctors.edit', compact('doctor','categories','category_amounts'));
    }

    public function toggleStatus($id)
    {
        $doctor = Doctor::findOrfail($id);

        if ($doctor->status == 'active'){
            $doctor->status = 'disabled';
        }else{
            $doctor->status = 'active';
        }

        $doctor->save();

        return redirect()->back()->with('success','Doctor status successfully updated');

    }

    public function doctorsPayment()
    {
        $categories = [];
        $cats = OtherPayment::where('type','OTHER_PAYMENTS')->first();
       $doctors = Doctor::paginate(100);
       if($cats){
           $categories = explode(",", $cats->proof);
       }
        return view('admin.payments.doctors_payment', compact('doctors','categories'));
    }



    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        return redirect()->back()->with('success','Payment successfully removed');
    }
}
