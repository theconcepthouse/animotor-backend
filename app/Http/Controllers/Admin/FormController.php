<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\FormData;
use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;
//use Spatie\LaravelPdf\Facades\Pdf;
//use function Spatie\LaravelPdf\Support\pdf;
//use Spatie\Browsershot\Browsershot;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class FormController extends Controller
{
    public function index($driverId)
    {
        $forms = Form::where('action', 0)->get();
        $form_action = Form::where('action', 1)->get();
        $user = User::findOrFail($driverId);

        $formData = FormData::where('driver_id', $driverId)->get();

        return view('admin.driver.forms.index', compact('forms', 'form_action', 'user'));
    }

    public function fetchCustomerForm($driverId, $formId)
    {
        $role = \request()->get('role') ?? 'driver';
        $driver = User::findOrFail($driverId);
        $form = Form::findOrFail($formId);
        $formFieldsJson = json_decode($form->fields, true);
        $formDt = FormData::where('driver_id', $driverId)->where('form_id', $formId)->first();

        $formData = $formDt ? json_decode($formDt->field_data, true) : [];

        $commonFields = $this->getCommonFieldsData($driverId, $formFieldsJson);

        return match ($form->name) {
            'Customer Registration' => view('admin.driver.forms.customer-registration', compact('role','driver', 'form', 'formData', 'formFieldsJson', 'commonFields')),
            'Onboarding Form' => view('admin.driver.forms.onboarding-form', compact('role','driver', 'form', 'formData', 'formFieldsJson', 'commonFields')),
            'Hire Agreement' => view('admin.driver.forms.hire-form', compact('driver', 'form', 'formData', 'formFieldsJson', 'commonFields')),
            'Proposal Form' => view('admin.driver.forms.proposal-form', compact('driver', 'form', 'formData', 'formFieldsJson', 'commonFields')),
            'Checklist Form' => view('admin.driver.forms.checklist-form', compact('driver', 'form', 'formData', 'formFieldsJson', 'commonFields')),
            'Payment Sheet' => view('admin.driver.forms.payment-sheet-form', compact('driver', 'form', 'formData', 'formFieldsJson', 'commonFields')),
            'Return Vehicle' => view('admin.driver.forms.return-vehicle-form', compact('driver', 'form', 'formData', 'formFieldsJson', 'commonFields')),
            'Report Vehicle Defect' => view('admin.driver.forms.report-defect', compact('driver', 'form', 'formData', 'formFieldsJson', 'commonFields')),
            'Report Accident' => view('admin.driver.forms.report-accident', compact('driver', 'form', 'formData', 'formFieldsJson', 'commonFields')),
            'Change of Address' => view('admin.driver.forms.change-address', compact('driver', 'form', 'formData', 'formFieldsJson', 'commonFields')),
            'Monthly Maintenance' => view('admin.driver.forms.monthly-maintenance', compact('driver', 'form', 'formData', 'formFieldsJson', 'commonFields')),
            'Submit Mileage' => view('admin.driver.forms.submit-mileage', compact('driver', 'form', 'formData', 'formFieldsJson', 'commonFields')),
            default => redirect()->back()->with('error', 'Form not found or not authorized to view this form.'),
        };
    }

    public function submitForm(Request $request)
    {
        $driverId = $request->get('driver_id');
        $formId = $request->get('form_id');

        FormData::updateOrCreate(
            ['driver_id' => $driverId, 'form_id' => $formId],
            ['field_data' => json_encode($request->except(['_token', 'driver_id', 'form_id', 'sending_method'])), 'status' => 'Pending']
        );

        return redirect()->back()->with(['success' => 'Form submitted successfully']);
    }


    public function getCommonFieldsData($driverId, $currentFormFields)
    {
        $commonFieldsData = [];
        $allFormData = FormData::where('driver_id', $driverId)->get();

        foreach ($allFormData as $formData) {
            $fieldData = json_decode($formData->field_data, true);
            foreach ($currentFormFields as $section => $fields) {
                foreach ($fields as $field) {
                    if (isset($field['fieldName']) && isset($fieldData[$field['fieldName']])) {
                        $commonFieldsData[$field['fieldName']] = $fieldData[$field['fieldName']];
                    }
                }
            }
        }

        return $commonFieldsData;
    }


    public function duplicateForm(Request $request, $formId, $driverId)
    {
        $driver = User::findOrFail($driverId);
        $formData = FormData::where('driver_id', $driver->id)->first();

        if ($formData)
        {
            $newFormData = new FormData();
            $newFormData->id = Str::uuid();
            $newFormData->driver_id = $formData->driver_id;
            $newFormData->form_id = $formId;
            $newFormData->field_data = $formData->field_data;
            $newFormData->status_2 = 'new';
            $newFormData->save();
            return redirect()->route('admin.DuplicatedForm', ['formId' => $formId, 'driverId' => $driver])->with(['success' => 'Form has been duplicated']);
        }
        return redirect()->back()->with(['error' => 'Form not found']);
    }

    public function duplicatedForm($formId, $driverId)
    {
        $formData = FormData::where('form_id', $formId)->where('driver_id', $driverId)->get();
        $driver = User::findOrFail($driverId);
        return view('admin.driver.forms.duplicated-form', compact('formData', 'driver'));
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
        $form = Form::findOrFail($formId);
        $driver = User::findOrFail($driverId);

        $formData = FormData::where('form_id', $formId)
                            ->where('driver_id', $driverId)
                            ->first();

        // Decode the JSON data safely
        $formFieldsJson = json_decode($form->fields ?? '[]', true);
        $submittedData = json_decode($formData->field_data ?? '[]', true);

        // Select the view template based on the form name
        $view = $this->selectPdfView($form->name);
        if (!$view) {
            return redirect()->back()->with('error', 'Invalid form type.');
        }

        // Prepare data for the view
        $data = [
            'driver' => $driver,
            'form' => $form,
            'formFieldsJson' => $formFieldsJson,
            'submittedData' => $submittedData
        ];

        // Load the view into PDF generator
        $pdf = PDF::loadView($view, $data);

        // Return the generated PDF as a download
        return $pdf->stream($form->name . ".pdf");
    }

    public function updateStatus(Request $request)
    {
        $formId = $request->form_id;
        $form = Form::find($formId);
        $form->status = $request->status;
        $form->save();
        return redirect()->back()->with(['success' => 'Form status updated successfully']);
    }







}
