<?php

namespace App\Livewire\Admin\Customers;

use App\Models\Car;
use App\Models\Payment;
use App\Models\Rate;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Form extends Component
{
    public User $user;
    public Car $car;
//    public Rate $rate;


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
    public $insurance_group = '';
    public $date_out = '';
    public $time_out = '';
    public $date_due = '';
    public $time_due = '';


    // Rate
     public $items = [
        ['item' => '', 'rate' => '', 'units' => '', 'price' => '']
    ];
    public $other_items = [];

    public $subtotal;
    public $total_due;
    public $total_paid;



    // additional fee
    public ?string $title;
    public ?string $amount;
    public ?string $milage_limit;
    public ?string $milage_limit_type;
    public ?string $excess_milage_fee;
    public ?string $lost_damaged_key_charges;
    public ?string $vehicle_recovery_charges;
    public ?string $accident_non_fault_excess_fee;
    public ?string $accident_fault_based_excess_fee;
    public ?string $late_payment_per_day;
    public ?string $admin_charge_for_pcn_ticket;
    public ?string $admin_charge_for_speeding_ticket;
    public ?string $admin_charge_for_bus_lane_tickets;
    public ?string $returning_vehicle_dirty_minor;
    public ?string $returning_vehicle_dirty_major;
    public ?string $repossession_personal_visit_minimum;
    public $rateId;
    public $driverId;

    public array $steps = [
        'Customer',
        'Vehicle',
        'Rates',
        'Additional Fee',
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


     public function saveOnboarding()
    {
        if ($this->step == 1){
            $this->saveCustomer();
            return $this->step++;
        }
        if ($this->step == 2){
            $this->saveVehicle();
            return $this->step++;
        }
        if ($this->step == 3){
            $this->saveRate();
            return $this->step++;
        }
        if ($this->step == 4){
            $this->saveFee();
        }

        $this->successMsg();

    }

    public function saveCustomer()
    {
        // Validate the input
        $validated = $this->validate([
            'first_name' => 'string|min:1|max:255|required',
            'last_name' => 'nullable',
            'phone' => 'string|min:1|max:255|required|unique:users',
            'email' => 'string|min:1|max:255|required|unique:users|email',
            'work_phone' => 'nullable',
            'hire_type' => 'required',
            'role' => 'required',
        ]);

        // Check if the user is an owner and if the role is permitted
        if (isOwner() && !in_array($validated['role'], ['manager', 'rider'])) {
            return redirect()->route('admin.dashboard')->with('failure', 'You are not permitted to create this user');
        }
        $validated['password'] = 'password';
        $driver = User::create($validated);
        $this->driverId = $driver->id;
        $driver->addRole($validated['role']);
        $this->successMsg();
    }

    public function saveVehicle()
    {

        $validated = $this->validate([
            'registration_number' => 'nullable',
            'model' => 'required',
            'make' => 'required',
            'insurance_group' => 'nullable',
            'date_out' => 'required',
            'time_out' => 'required',
            'date_due' => 'required',
            'time_due' => 'required',
        ]);

        Car::create($validated);
        $this->successMsg();

    }

    public function saveRate()
    {
        $validated = $this->validate([
            'items' => 'nullable|array',
            'items.*.item' => 'nullable|string',
            'items.*.rate' => 'nullable|integer',
            'items.*.units' => 'nullable|integer',
            'items.*.price' => 'nullable|integer',

            'other_items' => 'nullable|array',
            'other_items.*.item' => 'nullable|string',
            'other_items.*.units' => 'nullable|integer',
            'other_items.*.price' => 'nullable|integer',

            'subtotal' => 'nullable|integer',
            'total_due' => 'nullable|string',
            'total_paid' => 'nullable|string',
        ]);

        // Calculate subtotal
        $subtotal = 0;
        if (!empty($validated['items'])) {
            foreach ($validated['items'] as $item) {
                $subtotal += intval($item['price']);
            }
        }
        if (!empty($validated['other_items'])) {
            foreach ($validated['other_items'] as $otherItem) {
                $subtotal += intval($otherItem['price']);
            }
        }
        $validated['subtotal'] = $subtotal;

        $validated['driver_id'] = $this->driverId;
        $validated['others'] = 1;
        $rate = Rate::create($validated);
        $this->rateId = $rate->id;

         // Process items to create payment entries
        foreach ($validated['items'] as $item) {
            $pricePerUnit = $item['price'] / $item['units'];
            for ($i = 0; $i < $item['units']; $i++) {
                Payment::create([
                    'driver_id' => $this->driverId,
                    'due_date' => now()->addDays($i * 7), // Example logic for due date
                    'amount' => $pricePerUnit, // Split price across units
                ]);
            }
        }

        $this->reset(['items', 'other_items', 'subtotal', 'total_due', 'total_paid']);
        $this->successMsg();
        return back();
    }

    public function saveFee()
    {

        $validated = $this->validate([
            'milage_limit' => 'nullable|string',
            'milage_limit_type' => 'nullable|string',
            'excess_milage_fee' => 'nullable|string',
            'lost_damaged_key_charges' => 'nullable|string',
            'vehicle_recovery_charges' => 'nullable|string',
            'accident_non_fault_excess_fee' => 'nullable|string',
            'accident_fault_based_excess_fee' => 'nullable|string',
            'late_payment_per_day' => 'nullable|string',
            'admin_charge_for_pcn_ticket' => 'nullable|string',
            'admin_charge_for_speeding_ticket' => 'nullable|string',
            'admin_charge_for_bus_lane_tickets' => 'nullable|string',
            'returning_vehicle_dirty_minor' => 'nullable|string',
            'returning_vehicle_dirty_major' => 'nullable|string',
            'repossession_personal_visit_minimum' => 'nullable|string'
        ]);

        $rate = Rate::findOrFail($this->rateId);
        $rate->update($validated);
        $this->redirectRoute('admin.drivers');
    }

    public function successMsg()
    {
        $this->js("NioApp.Toast('Successfully updated', 'success', {
                                position: 'top-right'
                            });");
    }

    public function render()
    {
        $subtotal = Rate::select('subtotal')->where('driver_id', $this->driverId)->sum('subtotal');
        $rates = Rate::where('driver_id', $this->driverId)->get();

        $rateItems = [];
        foreach ($rates as $rate) {
            $filteredItems = array_filter($rate->items, function($item) {
                return !empty($item['item']) && !empty($item['units']) && !empty($item['price']);
            });

            if (!empty($filteredItems)) {
                $rateItems[] = [
                    'rate' => $rate,
                    'items' => $filteredItems
                ];
            }
        }
        return view('livewire.admin.customers.form', compact('rates', 'rateItems', 'subtotal'));
    }



}
