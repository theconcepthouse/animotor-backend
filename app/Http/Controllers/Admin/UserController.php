<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Region;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use App\Models\VehicleType;
use App\Services\CarService;
use App\Services\Firebase\FirestoreService;
use App\Services\MonifyService;
use App\Services\NotificationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function users()
    {
        $users = User::whereHasRole(['user','customer'])->paginate(100);
        $title = "All users";
        return view('admin.user.list', compact('users','title'));
    }

    public function riders()
    {
        if(isOwner()){
            $users = User::whereHasRole(['rider'])
                ->where('company_id', companyId())->latest()->paginate(100);
        }else if (isAdmin()){
            $users = User::whereHasRole(['rider'])->paginate(100);
        }else{
            $users = [];
        }
        $title = "Customers list";
        return view('admin.user.list', compact('users','title'));
    }

    public function index()
    {
        $users = User::withTrashed()->whereHasRole(['user','admin','receptionist','accountant'])->paginate(100);
        $title = "All users";
        return view('admin.user.list', compact('users','title'));
    }

    public function sendNotification()
    {
        return view('admin.notification');
    }

    public function show(Request $request, $id)
    {
        $monify = $request->get('monify') ?? false;


        $user = User::findOrFail($id);

        if($monify){
            if(!$user->monify_account){
                $monify = new MonifyService();
                $monify->createMonify($user);

            }
        }

        $rides = $user->trips;
        $driver_trips = $user->driver_trips;
        if(hasTrips()){
            $transactions = $user->transactions;
        }else{
            $transactions  = $user->transaction_records()->latest()->get();
        }
        return view('admin.user.show', compact('user','transactions','driver_trips','rides'));
    }

    public function create(Request $request)
    {
        $role = $request->get('role') ?? 'rider';

        if(isOwner() && !in_array($role, ['manager','rider','driver'])){
            return redirect()->route('admin.dashboard')->with('failure','you are not permitted to create this user');
        }

        $car_models = [];
        $car_makes = [];
        $car_types = [];
        if($role == 'driver'){

            $car_makes = VehicleMake::all();
            $car_types = VehicleType::all();
            $car_models = VehicleModel::where('make_id', $car_makes?->first()?->id)->get();
        }
        $regions = Region::withoutAirport()->select('name','id')->get();
        $departments = Role::where('name','!=','superadmin')->get();
        return view('admin.user.create', compact('departments','car_types','regions','role','car_makes','car_models'));
    }

    public function edit($id)
    {
        $departments = Role::where('name','!=','superadmin')->get();
        $user = User::findOrFail($id);

        $car_models = [];
        $car_makes = [];
        $car_types = [];
        $regions = Region::withoutAirport()->select('name','id')->get();
        $services = Service::select('name','id')->get();

        if($user->hasRole('driver')){
            if(!$user->car){
                $user->car()->firstOrNew();
            }
            $car_makes = VehicleMake::all();
            $car_types = VehicleType::all();
            if($user?->car?->model){
                $car_models = VehicleModel::where('name', $user?->car?->model)->get();
            }else{
                $car_models = VehicleModel::where('name', $car_makes?->first()?->id)->get();
            }
        }

        return view('admin.user.edit', compact('departments','regions','user','car_types','car_models','car_makes','services'));
    }

    public function store(Request $request, CarService $carService)
    {

        if(isOwner() && !in_array($request->input('role'), ['manager','rider'])){
            return redirect()->route('admin.dashboard')->with('failure','you are not permitted to create this user');
        }

        $rules = [
            'first_name' => 'string|min:1|max:255|required',
            'last_name' => 'nullable',
            'phone' => 'string|min:1|max:255|required|unique:users',
            'email' => 'string|min:1|max:255|required|unique:users|email',
            'role' => 'required',
            'gender' => 'nullable',
            'region_id' => 'nullable',
            'avatar' => 'nullable',
            'password' => 'required',
        ];
        $data = $request->validate($rules);
        $data['password'] = Hash::make($data['password']);
        if(isOwner()){
            $data['company_id'] = companyId();
        }

        $user = User::create($data);

        $user->addRole($data['role']);

        if($data['role'] == 'driver'){
            $request_data = $this->getCarData($user, $request);

            $carService->createOrUpdate(null, $request_data);

        }


        return redirect()->back()->with('success',ucfirst($data['role']).' successfully created');
    }

    public function update(Request $request, $id, CarService $carService)
    {
        $rules = [
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'phone' => 'nullable|unique:users,phone,'.$id,
            'email' => 'nullable|unique:users,email,'.$id,
            'gender' => 'nullable',
            'status' => 'nullable',
            'comment' => 'nullable',
            'region_id' => 'nullable',
            'service_id' => 'nullable',
            'avatar' => 'nullable',
            'password' => 'nullable',
        ];
        $data = $request->validate($rules);
//        return $data;
        if($request->input('password')){
            $data['password'] = Hash::make($data['password']);
        }

        $user = User::findOrFail($id);

        $user->update($data);

//        if($data['department'] != $user->role()){
//            $user->detachRole($user->role());
//
//            $user->attachRole($data['department']);
//        }

        if($user->hasRole('driver') && $request->has('title')){
            $request_data = $this->getCarData($user, $request);

            $carService->createOrUpdate($user?->car, $request_data);

        }

        return back()->with('success','User successfully updated');
    }

    public function deleted()
    {
        $users = User::onlyTrashed()->paginate(100);
        $title = "Deleted accounts";
        return view('admin.user.trashed', compact('users', 'title'));
    }



    public function updateStatus($id, $status, FirestoreService $firestoreService): RedirectResponse
    {
        $user = User::findOrFail($id);

        if($status == 'approved' && $user->unapproved_documents > 0){
            return redirect()->back()->with('failure','Approve all document to approve driver');
        }

        if($status == 'approved'){
            $notificationService = new NotificationService();

            $data['title'] = "Account approved";
            $data['message'] = "Congrats, your account is now approved";

            $notificationService->notify('Congrats, your account is now approved','notification','Account approved',$user, $data);
        }
        $user->status = $status;
        $user->save();
        $firestoreService->updateUser($user);
        return redirect()->back()->with('success','Status successfully updated');
    }

    public function destroy(Request $request, $id)
    {
        $back_url = $request->get('back_url') ?? route('admin.riders');
        $user = User::findOrFail($id);
        if($user->id == auth()->id()){
            return redirect()->back()->with('failure','sorry you cant delete yourself');
        }
        $user->delete();
        return redirect()->to($back_url)->with('success', "User successfully deactivated");
    }
    public function forceDelete($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->forceDelete();
        return redirect()->back()->with('success', "User Deleted");
    }

    public function restoreDelete($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        $user->restore();

        $user = User::withTrashed()->findOrFail($id);

        return redirect()->back()->with('success', "User activated");
    }

    /**
     * @param $user
     * @param Request $request
     * @return array
     */


    private function getCarData($user, Request $request): array
    {
        $request['driver_id'] = $user->id;


        $request['make'] = $request->get('vehicle_make');
        $request['type'] = $request->get('vehicle_type');


        return $request->only(['make', 'type', 'driver_id','door', 'year', 'color', 'model', 'vehicle_no', 'image', 'gear', 'title']);
    }


}
