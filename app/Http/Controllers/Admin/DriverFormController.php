<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DriverForm;
use App\Models\Form;
use App\Models\FormData;
use App\Models\History;
use App\Models\HistoryData;
use App\Models\User;
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
        return view('admin.driver.driver-form.index', compact('forms', 'actionForms','driver', 'formData'));
    }


    public function fetchDriverForm($driverId, $formId)
    {
        $driver = User::findOrFail($driverId);
        $form = DriverForm::findOrFail($formId);

        // Fetch all forms for the given driver
        $forms = DriverForm::where('driver_id', $driverId)->get();

        // Initialize variables for selecting the form with the most filled fields
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

        return match ($form->name) {
            'Customer Registration' => view('admin.driver.driver-form.customer-registration', compact('driver', 'form', 'selectedForm')),
            'Onboarding Form' => view('admin.driver.driver-form.onboarding-form', compact('driver', 'form', 'selectedForm')),
            'Hire Agreement' => view('admin.driver.driver-form.hire-form', compact('driver', 'form', 'selectedForm')),
            'Proposal Form' => view('admin.driver.driver-form.proposal-form', compact('driver', 'form', 'selectedForm')),
            'Checklist Form' => view('admin.driver.driver-form.checklist-form', compact('driver', 'form', 'selectedForm')),
            'Payment Sheet' => view('admin.driver.driver-form.payment-sheet-form', compact('driver', 'form', 'selectedForm')),

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
            'rate',
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
                return 'admin.driver.pdfs.checklist';
            case 'Payment Sheet':
                return 'admin.driver.pdfs.payment-sheet';
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

        $formData = DriverForm::where('driver_id', $driverId)->first();

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



// Helper method for comparing values
private function isEqual($val1, $val2)
{
    return json_encode($val1) === json_encode($val2);
}


    public function copyDriverForm(Request $request, $formId)
    {

    $driverId = $request->input('driver_id');

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
        ->where('id', $formId)
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

    // Update the User table if personal_details are updated, but do not track these changes
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
            'hirer_insurance' => json_encode($insuranceData ?? null)
        ]);

        return redirect()->back()->with('success', 'History data recorded successfully.');
    }



   public function driverFormHistory($driverId)
    {
        $histories = HistoryData::where('driver_id', $driverId)->latest()->get();
        $driver = User::find($driverId);
        return view('admin.driver.others.histories', compact('histories', 'driver'));
    }









}
