<?php

namespace App\Livewire\Admin\Customers;

use App\Models\Car;
use App\Models\Document;
use App\Models\DriverDocument;
use App\Models\DriversLicense;
use App\Models\Rate;
use App\Models\Role;
use App\Models\TaxiLicense;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Attributes\Computed;
use Livewire\Component;

class AddDriver extends Component
{
    public User $user;
    public Car $car;

    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $phone = '';
    public $work_phone = '';
    public $hire_type = '';
    public $role = '';
    public $registration_number = '';
    public $make = '';
    public $model = '';
    public $address = '';
    public $address_2 = '';
    public $country = '';
    public $city = '';
    public $postcode = '';
    public $userId;

    public $driving_license_number;
    public $type_of_license_held;
    public $license_issue_date;
    public $license_expiry_date;
    public $driving_test_pass_date;
    public $national_insurance_number;
    public $taxi_number;
    public $dvla_check_code;
    public $issuing_authority;


    public $taxi_license_number;
    public $taxi_issuing_authority;
    public $issuing_date;
    public $expiry_date;
    public $license_type;
    public $operator_name;

    public $contact_name;
    public $phone_number;
    public $email_address;
    public $relationship;


    public array $steps = [
        'Customer',
        'Address',
        'License',
        'Taxi',
        'Emergency',
        'Documents',
    ];

    #[Computed]
    public int $step = 1;

    public function goBack(){
        if($this->step > 1){
            $this->step--;
        }
    }

    public function setStep($step)
    {
        $this->step = $step;
    }


     public function saveDriver()
    {
        if ($this->step == 1){
            $this->saveCustomer();
            return $this->step++;
        }
        if ($this->step == 2){
            $this->saveAddress();
            return $this->step++;
        }
        if ($this->step == 3){
            $this->saveLicense();
            return $this->step++;
        }
        if ($this->step == 4){
            $this->saveTaxi();
            return $this->step++;
        }
        if ($this->step == 5){
            $this->saveContact();
            return $this->step++;
        }
        if ($this->step == 6){
            $this->saveDocument();
            return $this->step++;
        }
        $this->successMsg();
    }

    public function saveCustomer()
    {
        $validated = $this->validate([
            'first_name' => 'string|min:1|max:255|required',
            'last_name' => 'nullable',
            'phone' => 'string|min:1|max:255|required|unique:users',
            'email' => 'string|min:1|max:255|required|unique:users|email',
            'work_phone' => 'nullable',
//            'hire_type' => 'required',
            'role' => 'required',
        ]);

        if (isOwner() && !in_array($validated['role'], ['manager', 'rider'])) {
            return redirect()->route('admin.dashboard')->with('failure', 'You are not permitted to create this user');
        }
        $validated['password'] = 'password';
        $customer = User::create($validated);
        $customer->addRole($validated['role']);
        $this->userId = $customer->id;
        $this->successMsg();
    }

    public function saveAddress()
    {
        $validated = $this->validate([
            'address' => 'string|min:1|max:255|required',
            'address_2' => 'nullable',
            'country' => 'required',
            'city' => 'required',
            'postcode' => 'nullable',
        ]);

        $user_address = User::findOrFail($this->userId);
        $user_address->update($validated);

        $this->successMsg();
    }

    public function saveLicense()
    {

        $validated = $this->validate([
            'driving_license_number' => 'nullable|string',
            'type_of_license_held' => 'nullable|string',
            'license_issue_date' => 'nullable|date',
            'license_expiry_date' => 'nullable|date',
            'driving_test_pass_date' => 'nullable|date',
            'national_insurance_number' => 'nullable|string',
            'taxi_number' => 'nullable|string',
            'dvla_check_code' => 'nullable|string',
            'issuing_authority' => 'nullable|string',
        ]);

        $document = Document::where('name', 'Drivers License')->first();
        $validated['driver_id'] = $this->userId;
        $validated['document_id'] = $document->id;

        // Check if the driver's license document already exists for the user
        $driverDocument = DriverDocument::where('driver_id', $this->userId)
                                         ->where('document_id', $document->id)
                                         ->first();

        if ($driverDocument) {
            $driverDocument->update($validated);
        } else {
            DriverDocument::create($validated);
        }

        $this->successMsg();
    }

    public function saveTaxi()
    {
        $validated = $this->validate([
            'taxi_license_number' => 'nullable|string',
            'taxi_issuing_authority' => 'nullable|string',
            'issuing_date' => 'nullable|string',
            'expiry_date' => 'nullable|string',
            'license_type' => 'nullable|string',
            'operator_name' => 'nullable|string',
        ]);

        $validated['user_id'] = $this->userId;
        $taxiLicense = TaxiLicense::where('user_id', $this->userId)->first();

        if ($taxiLicense) {
            $taxiLicense->update($validated);
        } else {
            TaxiLicense::create($validated);
        }
        $this->successMsg();

    }

    public function saveContact()
    {
        $validated = $this->validate([
            'contact_name' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'email_address' => 'nullable|email',
            'relationship' => 'nullable|string',
        ]);

        $validated['id'] = $this->userId;
        $userId = User::where('id', $this->userId)->first();
        if ($userId){
            $userId->update($validated);
        }else {
            User::create($validated);
        }

        $this->successMsg();
        session()->flash('message', 'Emergency contact details successfully saved.');
    }

    public function successMsg()
    {
        $this->js("NioApp.Toast('Successfully updated', 'success', {
                                position: 'top-right'
                            });");
    }

    public function render()
    {
        return view('livewire.admin.customers.add-driver');
    }



}
