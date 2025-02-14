<?php

namespace App\Livewire\Admin\Customers;

use App\Models\Car;
use App\Models\Document;
use App\Models\DriverDocument;
use App\Models\DriverForm;
use App\Models\DriversLicense;
use App\Models\Rate;
use App\Models\Role;
use App\Models\TaxiLicense;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Controllers\Controller;

class AddDriver extends Component
{
    use WithFileUploads;

    public User $user;
    public Car $car;

    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $phone = '';
    public $work_phone = '';
    public $hire_type = '';
    public $role = '';
    public $password = '';
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
    public $driver_license_front;
    public $driver_license_back;
    public $proof_of_address;


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

    public function goBack()
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    public function setStep($step)
    {
        $this->step = $step;
    }


    public function saveDriver()
    {
        if ($this->step == 1) {
            $this->saveCustomer();
            return $this->step++;
        }
        if ($this->step == 2) {
            $this->saveAddress();
            return $this->step++;
        }
        if ($this->step == 3) {
            $this->saveLicense();
            return $this->step++;
        }
        if ($this->step == 4) {
            $this->saveTaxi();
            return $this->step++;
        }
        if ($this->step == 5) {
            $this->saveContact();
            return $this->step++;
        }
        if ($this->step == 6) {
            $this->saveDocument();
            return $this->step++;
        }
        $this->successMsg();
    }

    public function saveCustomer()
    {
        // Validate the input data
        $validated = $this->validate([
            'first_name' => 'string|min:1|max:255|required',
            'last_name' => 'nullable',
            'phone' => 'string|min:1|max:255|required|unique:users',
            'email' => 'string|min:1|max:255|required|unique:users|email',
            'work_phone' => 'nullable',
            'role' => 'required',
            'password' => 'required|string|min:3',
        ]);

        // Add company_id if the user is an owner
        if (isOwner()) {
            $validated['company_id'] = companyId();
        }

        $validated['password'] = Hash::make($validated['password']);

        // Create a new user and assign the role
        $customer = User::create($validated);
        $customer->addRole($validated['role']);
        $this->userId = $customer->id;

        // Create an instance of DriverForm using the user ID
        $this->createDriverForm($this->userId);
        $form = DriverForm::where('driver_id', $this->userId)->first();
        $form->update([
            'personal_details' => [
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'work_phone' => $validated['work_phone'],
            ]
        ]);

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

        $form = DriverForm::where('driver_id', $this->userId)->first();
        $form->update([
            'address' => [
                'address_line' => $validated['address'],
                'address_line_2' => $validated['address_2'],
                'country' => $validated['country'],
                'city' => $validated['city'],
                'postcode' => $validated['postcode'],
            ]
        ]);

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

        $form = DriverForm::where('driver_id', $this->userId)->first();
        $form->update([
            'drivers_license' => [
                'license_number' => $validated['driving_license_number'],
                'type_of_license_held' => $validated['type_of_license_held'],
                'license_issue_date' => $validated['license_issue_date'],
                'license_expire_date' => $validated['license_expiry_date'],
                'date_driving_test_passed' => $validated['driving_test_pass_date'],
                'national_insurance_number' => $validated['national_insurance_number'],
                'taxi_number' => $validated['taxi_number'],
                'dvla_check_code' => $validated['dvla_check_code'],
                'issuing_authority' => $validated['issuing_authority'],
            ]
        ]);

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

        $form = DriverForm::where('driver_id', $this->userId)->first();
        $form->update([
            'taxi_license' => [
                'taxi_license_number' => $validated['taxi_license_number'],
                'taxi_issuing_authority' => $validated['taxi_issuing_authority'],
                'issuing_date' => $validated['issuing_date'],
                'expiry_date' => $validated['expiry_date'],
                'license_type' => $validated['license_type'],
                'operator_name' => $validated['operator_name'],
            ]
        ]);
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
        if ($userId) {
            $userId->update($validated);
        } else {
            User::create($validated);
        }

        $this->successMsg();
        session()->flash('message', 'Emergency contact details successfully saved.');
    }

    public function saveDocument()
    {
        $validated = $this->validate([
            'driver_license_front' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'driver_license_back' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'proof_of_address' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        // Store the images if they are present
        $driverLicenseFront = $this->driver_license_front ? $this->storeImageWithOriginalName($this->driver_license_front, 'documents') : null;
        $driverLicenseBack = $this->driver_license_back ? $this->storeImageWithOriginalName($this->driver_license_back, 'documents') : null;
        $proofOfAddress = $this->proof_of_address ? $this->storeImageWithOriginalName($this->proof_of_address, 'documents') : null;

        $form = DriverForm::where('driver_id', $this->userId)->first();
        $form->update([
            'documents' => [
                'driver_license_front' => $driverLicenseFront,
                'driver_license_back' => $driverLicenseBack,
                'proof_of_address' => $proofOfAddress,
            ]
        ]);

        return redirect()->route('admin.drivers');
    }

    private function storeImageWithOriginalName($file, $path)
    {
        $fullPath = storage_path('app/public/' . $path);

        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0755, true);
        }

        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/' . $path, $filename);
        return asset('storage/' . $path . '/' . $filename);
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

    private function createDriverForm($driverId): null
    {
        $formNames = [
            'Customer Registration',
            'Onboarding Form',
            'Hire Agreement',
            'Proposal Form',
            'Checklist Form',
            'Payment Sheet',
        ];
        $actionFormNames = [
            'Return Vehicle',
            'Report Vehicle Defect',
            'Report Accident',
            'Change of Address',
            'Monthly Maintenance',
            'Submit Mileage',
        ];

        // Only exclude fields that are strictly necessary
        $excludeFields = ['id', 'driver_id', 'name', 'status', 'sending_method', 'state', 'action'];
        $columns = Schema::getColumnListing('driver_forms');

        // Identify JSON fields by excluding the necessary fields
        $jsonFields = array_diff($columns, $excludeFields);

        foreach ($formNames as $name) {
            $data = [
                'driver_id' => $driverId,
                'name' => $name,
                'status' => 'pending',
                'sending_method' => null,
                'state' => 'Generated',
                'action' => 0,
            ];

            // Explicitly set only the intended JSON fields to null
            foreach ($jsonFields as $field) {
                $data[$field] = null;
            }

            DriverForm::create($data);
        }

        foreach ($actionFormNames as $name) {
            $data = [
                'driver_id' => $driverId,
                'name' => $name,
                'status' => 'pending',
                'sending_method' => null,
                'state' => 'Generated',
                'action' => 1,
            ];

            foreach ($jsonFields as $field) {
                $data[$field] = null;
            }

            DriverForm::create($data);
        }

        return $form ?? null;
    }


}
