<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\FormData;
use App\Models\History;
use App\Models\User;
//use Barryvdh\DomPDF\Facade as PDF;
//use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;
use function Spatie\LaravelPdf\Support\pdf;
use Spatie\Browsershot\Browsershot;

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


    // Function to merge common fields data with form fields
   public function mergeCommonFields($driverId, $formFields)
    {
        $commonFieldsData = $this->getCommonFieldsData($driverId);

        foreach ($formFields as &$fields) {
            foreach ($fields as &$field) {
                if (isset($field['fieldName']) && isset($commonFieldsData[$field['fieldName']])) {
                    $field['value'] = $commonFieldsData[$field['fieldName']];
                }
            }
        }

        return $formFields;
    }


    public function generatePDF($formId, $driverId)
    {
        $form = Form::findOrFail($formId);
        $driver = User::findOrFail($driverId);

        $formData = FormData::where('form_id', $formId)
                            ->where('driver_id', $driverId)
                            ->first();

        // Ensure the form fields are in JSON string format before decoding
        $formFieldsJson = is_string($form->fields) ? json_decode($form->fields, true) : $form->fields;
        $submittedData = $formData ? (is_string($formData->field_data) ? json_decode($formData->field_data, true) : $formData->field_data) : null;

        // Determine the view based on the form name
        $view = '';
        switch ($form->name) {
            case 'Customer Registration':
                $view = 'admin.driver.pdfs.customer-registration';
                break;
            case 'Hire Agreement':
                $view = 'admin.driver.pdfs.hire-agreement';
                break;
            case 'Onboarding Form':
                $view = 'admin.driver.pdfs.onboarding';
                break;
            case 'Proposal Form':
                $view = 'admin.driver.pdfs.proposal';
                break;
            case 'Checklist Form':
                $view = 'admin.driver.pdfs.checklist';
                break;
            case 'Payment Sheet':
                $view = 'admin.driver.pdfs.payment-sheet';
                break;
            case 'Return Vehicle':
                $view = 'admin.driver.pdfs.return-vehicle';
                break;
            case 'Report Vehicle Defect':
                $view = 'admin.driver.pdfs.vehicle-defect';
                break;
            default:
                return redirect()->back()->with('error', 'Invalid form type.');
        }

        $pathToChrome = '/path/to/google-chrome';
        // Generate the PDF
        return pdf()->view($view, compact('driver', 'form', 'formFieldsJson', 'submittedData'))
            ->format('a4')->name($form->name.".pdf");
    }



}
