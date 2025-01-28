<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\DriverForm;
use App\Models\Form;
use App\Models\FormData;
use App\Models\History;
use App\Models\HistoryData;
use App\Models\Payment;
use App\Models\Rate;
use App\Models\User;
use App\Models\Vehicle;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DriverFormController extends Controller
{
    public function index($driverId)
    {
        $forms = DriverForm::where('driver_id', $driverId)->where('action', 0)->get();
        $actionForms = DriverForm::where('driver_id', $driverId)->where('action', 1)->get();
        $driver = User::find($driverId);
        $formData = DriverForm::where('driver_id', $driverId)->first();
        return view('admin.driver.driver-form.index', compact('forms', 'actionForms', 'driver', 'formData'));
    }

    public function fetchDriverForm($driverId, $formId, Request $request)
    {
        $driver = User::findOrFail($driverId);
        $form = DriverForm::findOrFail($formId);

        // Fetch all forms for the given driver
        $forms = DriverForm::where('driver_id', $driverId)->get();

        $selectedForm = null;
        $maxFilledFieldsCount = 0;

        foreach ($forms as $driverForm) {
            $filledFieldsCount = 0;

            foreach ($driverForm->getAttributes() as $attribute => $value) {
                if (in_array($attribute, ['id', 'driver_id', 'name', 'status', 'action', 'sending_method', 'state', 'created_at', 'updated_at'])) {
                    continue; // Skip non-data fields
                }

                if (is_array($value) && !empty($value)) {
                    $filledFieldsCount += count(array_filter($value, function ($item) {
                        return !is_null($item) && $item !== '';
                    }));
                } elseif (!is_array($value) && !is_null($value) && $value !== '') {
                    $filledFieldsCount++;
                }
            }

            if ($filledFieldsCount > $maxFilledFieldsCount) {
                $maxFilledFieldsCount = $filledFieldsCount;
                $selectedForm = $driverForm;
            }
        }

        // If no form with filled fields was found, fall back to the most recently updated form
        if (!$selectedForm) {
            $selectedForm = DriverForm::where('driver_id', $driverId)->orderBy('updated_at', 'desc')->first();
        }

        $driverForm = DriverForm::where('driver_id', $driverId)
            ->where('id', $formId)
            ->firstOrFail();

        $vehicles = Car::all();
        $vehicleId = $request->query('vehicleId');
        $vehicle = Car::find($vehicleId);

        if ($vehicle) {
//            $vehicleDetails = is_array($vehicle->vehicle_details) ? $vehicle->vehicle_details : [];
            return response()->json([
                'registration_number' => $vehicle->registration_number ?? '',
                'make' => $vehicle->make ?? '',
                'model' => $vehicle->model ?? ''
            ]);
        }

        $priceSum = Rate::where('driver_id', $driverId)->sum('price');
        $rates = Rate::where('driver_id', $driverId)->where('payment_item', 0)->get();

        $deposit = Rate::where('driver_id', $driverId)
            ->whereRaw('LOWER(item) = ?', ['deposit'])
            ->sum('price');
        $roadTax = Rate::where('driver_id', $driverId)
            ->whereRaw('LOWER(item) = ?', ['road tax'])
            ->sum('price');

        return match ($form->name) {
            'Customer Registration' => view('admin.driver.driver-form.customer-registration', compact('driver', 'form', 'selectedForm')),
            'Onboarding Form' => view('admin.driver.driver-form.onboarding-form', compact('driver', 'form', 'selectedForm', 'driverForm', 'vehicles', 'priceSum', 'rates')),
            'Hire Agreement' => view('admin.driver.driver-form.hire-form', compact('driver', 'form', 'selectedForm')),
            'Proposal Form' => view('admin.driver.driver-form.proposal-form', compact('driver', 'form', 'selectedForm', 'driverForm')),
            'Checklist Form' => view('admin.driver.driver-form.checklist-form', compact('driver', 'form', 'selectedForm')),
            'Payment Sheet' => view('admin.driver.driver-form.payment-sheet-form', compact('driver', 'form', 'selectedForm',
                'priceSum', 'driverForm', 'deposit', 'roadTax')),

            'Return Vehicle' => view('admin.driver.driver-form.return-vehicle', compact('driver', 'form', 'selectedForm')),
            'Report Vehicle Defect' => view('admin.driver.driver-form.report-defect', compact('driver', 'form', 'selectedForm')),
            'Report Accident' => view('admin.driver.driver-form.report-accident', compact('driver', 'form', 'selectedForm')),
            'Change of Address' => view('admin.driver.driver-form.change-address', compact('driver', 'form', 'selectedForm')),
            'Monthly Maintenance' => view('admin.driver.driver-form.monthly-maintenance', compact('driver', 'form', 'selectedForm')),
            'Submit Mileage' => view('admin.driver.driver-form.submit-mileage', compact('driver', 'form', 'selectedForm')),

            default => redirect()->back()->with('error', 'Form not found or not authorized to view this form.'),
        };
    }

    protected function generateReferenceNumber(): int
    {
        return rand(1000000000, 9999999999);
    }

    public function submitDriverForm(Request $request)
    {
        $driverId = $request->input('driver_id');
        $formId = $request->input('form_id');

        // Generate a reference number
        $referenceNumber = $this->generateReferenceNumber();

        // Define the fields that should be updated
        $fieldsToUpdate = [
            'personal_details',
            'address',
            'vehicle',
//            'rate',
            'rate_total',
            'charges',
            'signature',
            'declaration',
            'additional_fee',
            'hirer_insurance',
            'fleet_insurance',
            'documents',
            'drivers_license',
            'taxi_license',
            'claim',
            'convictions',
            'level_of_cover',
            'supporting_documents',
            'client_details',
            'bodywork',
            'damage_assessment',
            'wheels_tyres',
            'windscreens',
            'mirrors',
            'dash',
            'interior',
            'exterior',
            'handbook',
            'spare_wheel',
            'fuel_cap',
            'aerial',
            'floor_mats',
            'tools',
            'payment',
            'permission',
            'return_vehicle',
            'report_vehicle',
            'report_accident',
            'change_address',
            'monthly_maintenance',
            'mileage',
            'hire',
            'reason',
            'agreement',
        ];

        // Step 1: Fetch and update the current form being submitted
        $driverForm = DriverForm::where('driver_id', $driverId)
            ->where('id', $formId)
            ->firstOrFail();

        // Update the fields in the current form
        foreach ($fieldsToUpdate as $field) {
            if ($request->has($field)) {
                $driverForm->$field = $request->input($field);
            }
        }

        // Attach the reference number to the form if it's a report_accident form
        if ($request->has('report_accident')) {
            $reportAccident = $request->input('report_accident');
            $reportAccident['reference_number'] = $referenceNumber;
            $driverForm->report_accident = $reportAccident;
        }

        $driverForm->save();

        // Update the User table if personal_details are updated
        if ($request->has('personal_details')) {
            $user = User::find($driverId);
            $personalDetails = $request->input('personal_details');

            if (isset($personalDetails['first_name'])) {
                $user->first_name = $personalDetails['first_name'];
            }
            if (isset($personalDetails['last_name'])) {
                $user->last_name = $personalDetails['last_name'];
            }
            if (isset($personalDetails['email'])) {
                $user->email = $personalDetails['email'];
            }

            $user->save();
        }

        // Step 2: Update related forms with the new data
        $relatedForms = DriverForm::where('driver_id', $driverId)
            ->where('id', '!=', $formId)->where('action', 0) // Exclude the current form
            ->get();

        foreach ($relatedForms as $relatedForm) {
            $needsUpdate = false;

            foreach ($fieldsToUpdate as $field) {
                if ($request->has($field)) {
                    $relatedForm->$field = $request->input($field);
                    $needsUpdate = true;
                }
            }

            if ($needsUpdate) {
                $relatedForm->save();
            }
        }

        return redirect()->back()->with('success', 'Form submitted successfully.');
    }


    public function updateStatus(Request $request)
    {
        $formId = $request->form_id;
        $form = DriverForm::find($formId);
        $form->status = $request->status;
        $form->save();
        return redirect()->back()->with(['success' => 'Form status updated successfully']);
    }

    public function driverDocuments($driverId)
    {
        $driver = User::findOrFail($driverId);
        $documents = DriverForm::where('driver_id', $driver->id)->first();
        return view('admin.driver.others.driver-documents', compact('driver', 'documents'));
    }

    public function updateDocument(Request $request, $driverId)
    {
        $driver = User::findOrFail($driverId);

        // Validate the incoming document
        $request->validate([
            'documents' => 'required|array',
            'document_type' => 'required|string',
            'documents.*' => 'nullable|string', // Assuming document paths are passed as strings
        ]);

        $documentType = $request->input('document_type');
        $documentPath = $request->input('documents.' . $documentType);

        $driverForms = DriverForm::where('driver_id', $driver->id)->where('action', 0)->get();

        foreach ($driverForms as $driverForm) {
            $documents = $driverForm->documents;
            $documents[$documentType] = $documentPath;

            // Save the updated documents array back to the form
            $driverForm->documents = $documents;
            $driverForm->save();
        }

        return redirect()->back()->with('success', 'Document updated successfully for all forms.');
    }

    private function selectPdfView($formName)
    {
        switch ($formName) {
            case 'Customer Registration':
                return 'admin.driver.pdfs.customer-registration';
            case 'Hire Agreement':
                return 'admin.driver.pdfs.hire-agreement';
            case 'Onboarding Form':
                return 'admin.driver.pdfs.onboarding';
            case 'Proposal Form':
                return 'admin.driver.pdfs.proposal';
            case 'Checklist Form':
                return 'admin.driver.pdfs.checklist-pdf';
            case 'Payment Sheet':
                return 'admin.driver.pdfs.payment-sheet-pdf';
            case 'Return Vehicle':
                return 'admin.driver.pdfs.return-vehicle';
            case 'Report Vehicle Defect':
                return 'admin.driver.pdfs.vehicle-defect';
            default:
                return null; // Return null if no matching view found
        }
    }

    public function generatePDF($formId, $driverId)
    {
        $form = DriverForm::findOrFail($formId);
        $driver = User::findOrFail($driverId);

        $formData = DriverForm::where('driver_id', $driverId)->findOrFail($formId);

        $view = $this->selectPdfView($form->name);
        if (!$view) {
            return redirect()->back()->with('error', 'Invalid form type.');
        }

        // Prepare data for the view
        $data = [
            'driver' => $driver,
            'form' => $form,
            'formData' => $formData
        ];

        // Load the view into PDF generator
        $pdf = PDF::setOption(['dpi' => 115, 'defaultFont' => 'sans-serif'])->loadView($view, $data);
        return $pdf->stream($form->name . ".pdf");
    }

    public function copyDriverForm(Request $request)
    {

        $driverId = $request->input('driver_id');
        $formId = $request->input('form_id');

        $fieldsToUpdate = [
            'personal_details',
            'address',
            'vehicle',
            'hirer_insurance',
            'payment',
            'hire',
            'reason',
        ];

        // Step 1: Fetch the current form being submitted
        $driverForm = DriverForm::where('driver_id', $driverId)
            ->firstOrFail();

        // Update the fields in the current form
        foreach ($fieldsToUpdate as $field) {
            if ($request->has($field)) {
                $newData = $request->input($field);
                $driverForm->$field = array_merge($driverForm->$field ?? [], $newData);
            }
        }

        $driverForm->save();

        // Call createHistory to log changes
        $this->storeHistoryData($request, $driverId);

        if ($request->has('personal_details')) {
            $user = User::find($driverId);
            $personalDetails = $request->input('personal_details');

            if (isset($personalDetails['email'])) {
                $user->email = $personalDetails['email'];
            }
            if (isset($personalDetails['phone'])) {
                $user->phone = $personalDetails['phone'];
            }

            $user->save();
        }

        // Step 2: Update related forms with the new data
        $relatedForms = DriverForm::where('driver_id', $driverId)
            ->where('id', '!=', $formId)
            ->where('action', 0) // Exclude the current form
            ->get();

        foreach ($relatedForms as $relatedForm) {
            $needsUpdate = false;

            foreach ($fieldsToUpdate as $field) {
                if ($request->has($field)) {
                    $newData = $request->input($field);
                    $relatedForm->$field = array_merge($relatedForm->$field ?? [], $newData);
                    $needsUpdate = true;
                }
            }

            if ($needsUpdate) {
                $relatedForm->save();
            }
        }

        return redirect()->back()->with('success', 'Form submitted successfully.');
    }

    public function storeHistoryData(Request $request, $driverId)
    {

        $driverFormId = $request->form_id;

        // Prepare data for storage using dot notation for nested inputs
        $hireData = [
            'hire_start_data' => [
                'old_data' => $request->input('old_hire.hire_start_date'),
                'new_data' => $request->input('hire.hire_start_date')
            ],
            'hire_end_data' => [
                'old_data' => $request->input('old_hire.hire_end_date'),
                'new_data' => $request->input('hire.hire_end_date')
            ],
            'reason' => [
                'reason' => $request->input('reason.hire_reason_for_change'),
                'date_of_change' => $request->input('reason.hire_date_of_change') ?? now()
            ]
        ];

        $vehicleOutData = [
            'vehicle_date_out' => [
                'old_data' => $request->input('old_vehicle_out.date_out'),
                'new_data' => $request->input('vehicle.date_out')
            ],
            'vehicle_date_due' => [
                'old_data' => $request->input('old_vehicle_out.date_due'),
                'new_data' => $request->input('vehicle.date_due')
            ],
            'reason' => [
                'reason' => $request->input('vehicle_reason_for_change'),
                'date_of_change' => $request->input('vehicle_date_of_change') ?? now()
            ]
        ];

        $personalData = [
            'phone' => [
                'old_data' => $request->input('old_personal_details.phone'),
                'new_data' => $request->input('personal_details.phone')
            ],
            'email' => [
                'old_data' => $request->input('old_personal_details.email'),
                'new_data' => $request->input('personal_details.email')
            ],
            'reason' => [
                'reason' => $request->input('reason.contact_details'),
                'date_of_change' => $request->input('date.contact_details') ?? now()
            ],
        ];

        $paymentDateData = [
            'payment_date' => [
                'old_data' => $request->input('old_payment.received_date'),
                'new_data' => $request->input('payment.received_date')
            ],
            'reason' => [
                'reason' => $request->input('payment.reason_payment_date'),
                'date_of_change' => $request->input('payment.date.payment_date') ?? now()
            ],
        ];

        $paymentAmtData = [
            'payment_date' => [
                'old_data' => $request->input('old_payment_amount.received_date'),
                'new_data' => $request->input('payment.received_date')
            ],
            'reason' => [
                'reason' => $request->input('payment.reason.payment_date'),
                'date_of_change' => $request->input('payment.date.payment_date') ?? now()
            ],
        ];

        $vehicleData = [
            'registration_number' => [
                'old_data' => $request->input('old_vehicle.registration_number'),
                'new_data' => $request->input('vehicle.registration_number'),
            ],
            'car_model' => [
                'old_data' => $request->input('old_vehicle.car_model'),
                'new_data' => $request->input('vehicle.car_model'),
            ],
            'car_make' => [
                'old_data' => $request->input('old_vehicle.car_make'),
                'new_data' => $request->input('vehicle.car_make'),
            ],
            'reason' => [
                'reason' => $request->input('reason.vehicle_change'),
                'date_of_change' => $request->input('reason.date_vehicle_change') ?? now(),
            ],
        ];

        $insuranceData = [
            'type_of_cover' => [
                'old_data' => $request->input('old_hirer_insurance.type_of_cover'),
                'new_data' => $request->input('hirer_insurance.type_of_cover'),
            ],
            'insurance_company' => [
                'old_data' => $request->input('old_hirer_insurance.insurance_company'),
                'new_data' => $request->input('hirer_insurance.insurance_company'),
            ],
            'reason' => [
                'reason_for_change' => $request->input('reason.reason_hirer_insurance'),
                'date_of_change' => $request->input('reason.date_hirer_insurance') ?? now(),
            ],
        ];

        $addressData = [
            'address' => [
                'old_data' => $request->input('old_address.address'),
                'new_data' => $request->input('address.address'),
            ],
            'address_2' => [
                'old_data' => $request->input('old_address.address_line_2'),
                'new_data' => $request->input('address.address_line_2'),
            ],
            'city' => [
                'old_data' => $request->input('old_address.city'),
                'new_data' => $request->input('address.city'),
            ],
            'country' => [
                'old_data' => $request->input('old_address.country'),
                'new_data' => $request->input('address.country'),
            ],
            'postcode' => [
                'old_data' => $request->input('old_address.postcode'),
                'new_data' => $request->input('address.postcode'),
            ],
            'reason' => [
                'reason_for_change' => $request->input('address_reason_for_change'),
                'date_of_change' => now(),
            ],
        ];

        // Create a new history record
        HistoryData::create([
            'driver_id' => $driverId,
            'driver_form_id' => $driverFormId,
            'hire' => json_encode($hireData ?? null),
            'vehicle_out' => json_encode($vehicleOutData ?? null),
            'vehicle' => json_encode($vehicleData ?? null),
            'personal_details' => json_encode($personalData ?? null),
            'payment_date' => json_encode($paymentDateData ?? null),
            'payment' => json_encode($paymentAmtData ?? null),
            'hirer_insurance' => json_encode($insuranceData ?? null),
            'address' => json_encode($addressData ?? null)
        ]);

        return redirect()->back()->with('success', 'History data recorded successfully.');
    }


    public function driverFormHistory($driverId)
    {
        $histories = HistoryData::where('driver_id', $driverId)->latest()->get();
        $driver = User::find($driverId);
        return view('admin.driver.others.histories', compact('histories', 'driver'));
    }

    public function saveRate(Request $request, $driverId)
    {

        $validated = $request->validate([
            'item' => 'required|string',
            'unit' => 'required|numeric',
            'rate' => 'required|numeric',
            'price' => 'nullable|numeric',
            'interval' => 'required|integer',  // 'interval' is an integer (7 or 30)
        ]);

        $validated['driver_id'] = $driverId;
        $rateId = $request->get('rate_id');
        $rate = Rate::where('driver_id', $driverId)->where('id', $rateId)->first();

        if ($rate) {
            $rate->update($validated);
            Payment::where('driver_id', $driverId)->where('rate_id', $rate->id)->delete();

            $pricePerUnit = $rate->price / $rate->unit;
            for ($i = 0; $i < $rate->unit; $i++) {
                Payment::create([
                    'driver_id' => $driverId,
                    'due_date' => now()->addDays($i * $validated['interval']),  // Use the interval directly
                    'amount' => $pricePerUnit,
                    'name' => $rate->item,
                    'rate_id' => $rate->id,
                ]);
            }
            return redirect()->back()->with('success', 'Rate updated successfully.');
        }

        $rate = Rate::create($validated);
        $pricePerUnit = $rate->price / $rate->unit;

        for ($i = 0; $i < $rate->unit; $i++) {
            Payment::create([
                'driver_id' => $driverId,
                'due_date' => now()->addDays($i * $validated['interval']),  // Use the interval directly
                'amount' => $pricePerUnit,
                'name' => $rate->item,
                'rate_id' => $rate->id,
            ]);
        }

        return redirect()->back()->with('success', 'Rate saved successfully.');
    }


    public function saveRateTotal(Request $request)
    {
        $driverId = $request->input('driver_id');
        $formId = $request->input('form_id');

        $validated = $request->validate([
            'rate_total' => 'nullable|array',
            'rate_total.sub_total' => 'nullable|string',
            'rate_total.total_paid' => 'nullable|string',
            'rate_total.total_due' => 'nullable|numeric',
        ]);

        $driverForm = DriverForm::where('driver_id', $driverId)
            ->where('id', $formId)
            ->firstOrFail();

        $driverForm->rate_total = json_encode($validated);
        $driverForm->save();

        // Step 2: Update related forms with the same rate_total data
        $relatedForms = DriverForm::where('driver_id', $driverId)
            ->where('id', '!=', $formId) // Exclude the current form
            ->where('action', 0) // Assuming action = 0 means the form is active or relevant
            ->get();

        foreach ($relatedForms as $relatedForm) {
            $relatedForm->rate_total = json_encode($validated['rate_total']);
            $relatedForm->save();
        }

        return redirect()->back()->with('success', 'Form submitted successfully.');
    }

    public function saveClaim(Request $request)
    {
        $driverId = $request->input('driver_id');
        $formId = $request->input('form_id');

        $validated = $request->validate([
            'claim_details' => 'nullable|array',
            'claim_details.type_of_claim' => 'nullable|string',
            'claim_details.status' => 'nullable|string',
            'claim_details.claim_date' => 'nullable|string',
            'claim_details.claim_time' => 'nullable|string',
            'claim_details.describe_incident' => 'nullable|string',
        ]);

        $driverForm = DriverForm::where('driver_id', $driverId)
            ->where('id', $formId)
            ->firstOrFail();

        $existingClaim = is_string($driverForm->claim_details) ? json_decode($driverForm->claim_details, true) : (is_array($driverForm->claim_details) ? $driverForm->claim_details : []);
        $newClaim = [
            'type_of_claim' => $validated['claim_details']['type_of_claim'] ?? null,
            'status' => $validated['claim_details']['status'] ?? null,
            'claim_date' => $validated['claim_details']['claim_date'] ?? null,
            'claim_time' => $validated['claim_details']['claim_time'] ?? null,
            'describe_incident' => $validated['claim_details']['describe_incident'] ?? null,
        ];

        // Append the new rate to the existing rates array
        $existingClaim[] = $newClaim;
        $driverForm->claim_details = json_encode($existingClaim);

        $claim = is_string($driverForm->claim) ? json_decode($driverForm->claim, true)
            : (is_array($driverForm->claim) ? $driverForm->claim : []);

        $claim['accident_claim'] = "Yes";
        $driverForm->claim = $claim;

        $driverForm->save();

        return redirect()->back()->with('success', 'Form submitted successfully.');
    }

    public function updateClaim(Request $request)
    {
        $driverId = $request->input('driver_id');
        $formId = $request->input('form_id');
        $claimIndex = $request->input('claim_index');

        // Validate the inputs
        $validated = $request->validate([
            'claim_index' => 'required|integer|min:0',
            'claim_details' => 'nullable|array',
            'claim_details.' . $claimIndex . '.type_of_claim' => 'nullable|string',
            'claim_details.' . $claimIndex . '.status' => 'nullable|string',
            'claim_details.' . $claimIndex . '.claim_date' => 'nullable|date',
            'claim_details.' . $claimIndex . '.claim_time' => 'nullable|string',
            'claim_details.' . $claimIndex . '.describe_incident' => 'nullable|string',
        ]);

        // Fetch the driver form
        $driverForm = DriverForm::where('driver_id', $driverId)
            ->where('id', $formId)
            ->firstOrFail();

        // Decode the existing claims from JSON
        $existingClaims = is_string($driverForm->claim_details) ? json_decode($driverForm->claim_details, true) : (is_array($driverForm->claim_details) ? $driverForm->claim_details : []);

        // Validate that the claim index exists
        if (!isset($existingClaims[$claimIndex])) {
            return redirect()->back()->with('error', 'Claim not found.');
        }

        // Update the existing claim at the specified index
        $existingClaims[$claimIndex] = [
            'type_of_claim' => $validated['claim_details'][$claimIndex]['type_of_claim'] ?? $existingClaims[$claimIndex]['type_of_claim'],
            'status' => $validated['claim_details'][$claimIndex]['status'] ?? $existingClaims[$claimIndex]['status'],
            'claim_date' => $validated['claim_details'][$claimIndex]['claim_date'] ?? $existingClaims[$claimIndex]['claim_date'],
            'claim_time' => $validated['claim_details'][$claimIndex]['claim_time'] ?? $existingClaims[$claimIndex]['claim_time'],
            'describe_incident' => $validated['claim_details'][$claimIndex]['describe_incident'] ?? $existingClaims[$claimIndex]['describe_incident'],
        ];

        // Save the updated claims back to the database
        $driverForm->claim_details = json_encode($existingClaims);
        $driverForm->save();

        return redirect()->back()->with('success', 'Claim updated successfully.');
    }

    public function saveConvictions(Request $request)
    {

        $validated = $request->validate([
            'driver_id' => 'required',
            'form_id' => 'required',
            'conviction_details' => 'nullable|array',
            'conviction_details.conviction_code' => 'nullable|string',
            'conviction_details.penalty_points' => 'nullable|string',
            'conviction_details.conviction_date' => 'nullable|date',
            'conviction_details.expiry_date' => 'nullable|date',
        ]);

        $driverForm = DriverForm::where('driver_id', $validated['driver_id'])
            ->where('id', $validated['form_id'])
            ->firstOrFail();

        // Update conviction_details
        $existingConvictions = $driverForm->conviction_details ?? [];
        $existingConvictions[] = [
            'conviction_code' => $validated['conviction_details']['conviction_code'] ?? null,
            'penalty_points' => $validated['conviction_details']['penalty_points'] ?? null,
            'conviction_date' => $validated['conviction_details']['conviction_date'] ?? null,
            'expiry_date' => $validated['conviction_details']['expiry_date'] ?? null,
        ];
        $driverForm->conviction_details = $existingConvictions;

        // Update convictions flag
        $driverForm->convictions = array_merge(
            $driverForm->convictions ?? [],
            ['motoring_convictions' => 'Yes']
        );

        $driverForm->save();

        return redirect()->back()->with('success', 'Convictions saved successfully.');
    }

    public function updateConvictions(Request $request)
    {
        $driverId = $request->input('driver_id');
        $formId = $request->input('form_id');
        $convictionIndex = $request->input('conviction_index');

        // Validate the inputs
        $validated = $request->validate([
            'conviction_index' => 'required|integer|min:0',
            'conviction_details' => 'nullable|array',
            'conviction_details.' . $convictionIndex . '.conviction_code' => 'nullable|integer',
            'conviction_details.' . $convictionIndex . '.penalty_points' => 'nullable|integer',
            'conviction_details.' . $convictionIndex . '.conviction_date' => 'nullable|date',
            'conviction_details.' . $convictionIndex . '.expiry_date' => 'nullable|date',
        ]);

        // Fetch the driver form
        $driverForm = DriverForm::where('driver_id', $driverId)
            ->where('id', $formId)
            ->firstOrFail();

        // Decode the existing conviction details from JSON
        $existingConvictions = is_string($driverForm->conviction_details) ? json_decode($driverForm->conviction_details, true) : (is_array($driverForm->conviction_details) ? $driverForm->conviction_details : []);

        // Validate that the conviction index exists
        if (!isset($existingConvictions[$convictionIndex])) {
            return redirect()->back()->with('error', 'Conviction not found.');
        }

        // Update the existing conviction at the specified index
        $existingConvictions[$convictionIndex] = [
            'conviction_code' => $validated['conviction_details'][$convictionIndex]['conviction_code'] ?? $existingConvictions[$convictionIndex]['conviction_code'],
            'penalty_points' => $validated['conviction_details'][$convictionIndex]['penalty_points'] ?? $existingConvictions[$convictionIndex]['penalty_points'],
            'conviction_date' => $validated['conviction_details'][$convictionIndex]['conviction_date'] ?? $existingConvictions[$convictionIndex]['conviction_date'],
            'expiry_date' => $validated['conviction_details'][$convictionIndex]['expiry_date'] ?? $existingConvictions[$convictionIndex]['expiry_date'],
        ];

        // Save the updated conviction details back to the database
        $driverForm->conviction_details = json_encode($existingConvictions);
        $driverForm->save();

        return redirect()->back()->with('success', 'Conviction updated successfully.');
    }

    public function saveCriminalConvictions(Request $request)
    {
        $driverId = $request->input('driver_id');
        $formId = $request->input('form_id');

        $validated = $request->validate([
            'conviction_details_2' => 'nullable|array',
            'conviction_details_2.describe_conviction' => 'nullable|string',
        ]);

        $driverForm = DriverForm::where('driver_id', $driverId)
            ->where('id', $formId)
            ->firstOrFail();

        $existingData = is_string($driverForm->conviction_details_2) ? json_decode($driverForm->conviction_details_2, true) : (is_array($driverForm->conviction_details_2) ?
            $driverForm->conviction_details_2 : []);


        $newData = [
            'describe_conviction' => $validated['conviction_details_2']['describe_conviction'] ?? null,
        ];

        $existingData[] = $newData;
        $driverForm->conviction_details_2 = json_encode($existingData);

        $convictions = is_string($driverForm->convictions) ? json_decode($driverForm->convictions, true)
            : (is_array($driverForm->convictions) ? $driverForm->convictions : []);
        $convictions['criminal_conviction'] = "Yes";
        $driverForm->convictions = $convictions;

        $driverForm->save();

        return redirect()->back()->with('success', 'Form submitted successfully.');
    }

    public function updateCriminalConvictions(Request $request)
    {
        $driverId = $request->input('driver_id');
        $formId = $request->input('form_id');
        $convictionIndex = $request->input('conviction_index');

        // Validate the inputs
        $validated = $request->validate([
            'conviction_index' => 'required|integer|min:0',
            'conviction_details_2' => 'nullable|array',
            'conviction_details_2.' . $convictionIndex . '.describe_conviction' => 'nullable|string',
        ]);

        // Fetch the driver form
        $driverForm = DriverForm::where('driver_id', $driverId)
            ->where('id', $formId)
            ->firstOrFail();

        // Decode the existing criminal convictions from JSON
        $existingData = is_string($driverForm->conviction_details_2)
            ? json_decode($driverForm->conviction_details_2, true)
            : (is_array($driverForm->conviction_details_2)
                ? $driverForm->conviction_details_2
                : []);

        // Validate that the conviction index exists
        if (!isset($existingData[$convictionIndex])) {
            return redirect()->back()->with('error', 'Criminal conviction not found.');
        }

        // Update the existing criminal conviction at the specified index
        $existingData[$convictionIndex] = [
            'describe_conviction' => $validated['conviction_details_2'][$convictionIndex]['describe_conviction']
                ?? $existingData[$convictionIndex]['describe_conviction'],
        ];

        // Save the updated criminal convictions back to the database
        $driverForm->conviction_details_2 = json_encode($existingData);
        $driverForm->save();

        return redirect()->back()->with('success', 'Criminal conviction updated successfully.');
    }

    public function saveRefusalConvictions(Request $request)
    {
        $driverId = $request->input('driver_id');
        $formId = $request->input('form_id');

        // Validate the input
        $validated = $request->validate([
            'conviction_details_3' => 'nullable|array',
            'conviction_details_3.describe_refusals_3' => 'nullable|string',
        ]);

        // Fetch the driver form
        $driverForm = DriverForm::where('driver_id', $driverId)
            ->where('id', $formId)
            ->firstOrFail();

        // Decode existing conviction_details_3
        $existingData = is_string($driverForm->conviction_details_3)
            ? json_decode($driverForm->conviction_details_3, true)
            : (is_array($driverForm->conviction_details_3)
                ? $driverForm->conviction_details_3
                : []);

        // Prepare new data
        $newData = [
            'describe_refusals_3' => $validated['conviction_details_3']['describe_refusals_3'] ?? null,
        ];

        // Append new data to existing data
        $existingData[] = $newData;
        $driverForm->conviction_details_3 = json_encode($existingData);

        // Update the convictions field
        $convictions = is_string($driverForm->convictions)
            ? json_decode($driverForm->convictions, true)
            : (is_array($driverForm->convictions)
                ? $driverForm->convictions
                : []);

        // Set 'ever_been_refused_motor_insurance' to "Yes"
        $convictions['ever_been_refused_motor_insurance'] = "Yes";
        $driverForm->convictions = $convictions;

        $driverForm->save();

        return redirect()->back()->with('success', 'Form submitted successfully.');
    }

    public function updateRefusalConvictions(Request $request)
    {
        $driverId = $request->input('driver_id');
        $formId = $request->input('form_id');
        $convictionIndex = $request->input('conviction_index');

        // Validate the inputs
        $validated = $request->validate([
            'conviction_index' => 'required|integer|min:0',
            'conviction_details_3' => 'nullable|array',
            'conviction_details_3.' . $convictionIndex . '.describe_refusals' => 'nullable|string',
        ]);

        // Fetch the driver form
        $driverForm = DriverForm::where('driver_id', $driverId)
            ->where('id', $formId)
            ->firstOrFail();

        // Decode the existing refusal convictions from JSON
        $existingData = is_string($driverForm->conviction_details_3)
            ? json_decode($driverForm->conviction_details_3, true)
            : (is_array($driverForm->conviction_details_3)
                ? $driverForm->conviction_details_3
                : []);

        // Validate that the conviction index exists
        if (!isset($existingData[$convictionIndex])) {
            return redirect()->back()->with('error', 'Refusal conviction not found.');
        }

        // Update the existing refusal conviction at the specified index
        $existingData[$convictionIndex] = [
            'describe_refusals' => $validated['conviction_details_3'][$convictionIndex]['describe_refusals']
                ?? $existingData[$convictionIndex]['describe_refusals'],
        ];

        // Save the updated refusal convictions back to the database
        $driverForm->conviction_details_3 = json_encode($existingData);
        $driverForm->save();

        return redirect()->back()->with('success', 'Refusal conviction updated successfully.');
    }


}
