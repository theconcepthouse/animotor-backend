<?php

namespace App\Livewire\Admin\Workshop;

use App\Models\Workshop;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;


class Form extends Component
{

    public $workshop;
    public $workshopId;
    public $workshopID;
    public $company_info = [
        'company_name' => '',
        'display_name' => '',
        'company_number' => '',
        'city' => '',
        'street_name' => '',
        'post_code' => '',
        'company_reg_no' => '',
        'company_type' => '',
        'number_of_employees' => '',
        'company_website' => '',
        'contact_email' => '',
        'primary_phone_no' => '',
        'secondary_phone_no' => '',
        'vat_registration_no' => '',
        'region' => ''
    ];
    public $branches = [
        'branch_name' => '',
        'house_name_number' => '',
        'street_name' => '',
        'city' => '',
        'post_code' => '',
        'contact_email' => '',
        'primary_phone_no' => '',
        'secondary_phone_no' => '',
        'contact_person' => '',
        'status' => '',
        'branch_image' => ''
    ];

    public $contact_persons = [
        'first_name' => '',
        'last_name' => '',
        'primary_phone_no' => '',
        'secondary_phone_no' => '',
        'email' => '',
        'branch' => ''
    ];

    public $document = [
        'company_type' => '',
        'document_type' => '',
        'verification' => '',
        'file' => '',
    ];


    public array $steps = [
        'Company Info',
        'Branches',
        'Contact Person',
        'Documents',
        'Billing Info',
        'Services & Products',
        'Commissions',
    ];

     public function successMsg()
    {
        $this->js("NioApp.Toast('Successfully updated', 'success', {
                                position: 'top-right'
                            });");
    }

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

     public function saveWorkshop()
    {
        if ($this->step == 1){
            $this->saveCompany();
            return $this->step++;
        }
        if ($this->step == 2){
            $this->saveBranch();
            return $this->step++;
        }
        if ($this->step == 3){
            $this->saveContact();
            return $this->step++;
        }if ($this->step == 4){
            $this->saveDocument();
            return $this->step++;
        }
        $this->successMsg();

    }

    public function saveCompany()
    {
        $validatedData = $this->validate([
            'company_info.company_name' => 'nullable|string',
            'company_info.display_name' => 'nullable|string',
            'company_info.company_number' => 'nullable|string',
            'company_info.city' => 'nullable|string',
            'company_info.street_name' => 'nullable|string',
            'company_info.post_code' => 'nullable|string',
            'company_info.company_reg_no' => 'nullable|string',
            'company_info.company_type' => 'nullable|string',
            'company_info.number_of_employees' => 'nullable|integer',
            'company_info.company_website' => 'nullable|url',
            'company_info.contact_email' => 'nullable|email',
            'company_info.primary_phone_no' => 'nullable|string',
            'company_info.secondary_phone_no' => 'nullable|string',
            'company_info.vat_registration_no' => 'nullable|string',
            'company_info.region' => 'nullable|string',
        ]);
//        dd($validatedData);
        $workshop = Workshop::find($this->workshop?->id);
        if ($workshop){

            $workshop->update(['company_info' => $validatedData['company_info']]);
        }if (!$workshop){
            $workshop = new Workshop();
            $workshop->company_info = $validatedData['company_info'];
            $workshop->branches = [];
            $workshop->contact_persons = [];
            $workshop->document = [];
            $workshop->billing_info = [];
            $workshop->services_products = [];
            $workshop->commissions = [];
            $workshop->save();
            $this->workshopId = $workshop->id;
        }
        $this->successMsg();

    }

    public function saveBranch()
    {
        $validatedData = $this->validate([
            'branches.branch_name' => 'nullable|string',
            'branches.house_name_number' => 'nullable|string',
            'branches.street_name' => 'nullable|string',
            'branches.city' => 'nullable|string',
            'branches.post_code' => 'nullable|string',
            'branches.contact_email' => 'nullable|email',
            'branches.primary_phone_no' => 'nullable|string',
            'branches.secondary_phone_no' => 'nullable|string',
            'branches.contact_person' => 'nullable|string',
            'branches.status' => 'nullable|string',
            'branches.branch_image' => 'image|max:2024', // 1MB Max
        ]);

//        $branchImagesPaths = [];
//        if ($this->branches['branch_image']) {
//            foreach ($this->branches['branch_image'] as $image) {
//                $branchImagesPaths[] = $image->store('files', 'public');
//            }
//        }
//        $this->branches['branch_image'] = $branchImagesPaths;


        $workshop = Workshop::find($this->workshop?->id);
        if ($workshop){
            $workshop->update(['branches' => $validatedData['branches']]);
        }
        $update = Workshop::find($this->workshopId);
        if ($update){
             $update->update(['branches' => $validatedData['branches']]);
        }
        $this->successMsg();

    }

    public function saveContact()
    {
        $validatedData = $this->validate([
            'contact_persons.first_name' => 'required|string',
            'contact_persons.last_name' => 'required|string',
            'contact_persons.primary_phone_no' => 'required|string',
            'contact_persons.secondary_phone_no' => 'nullable|string',
            'contact_persons.email' => 'required|email',
            'contact_persons.branch' => 'required|string',

        ]);

        $workshop = Workshop::find($this->workshop?->id);
        if ($workshop){
            $workshop->update(['contact_persons' => $validatedData['contact_persons']]);
        }
        $update = Workshop::find($this->workshopId);
        if ($update){
             $update->update(['contact_persons' => $validatedData['contact_persons']]);
        }
        $this->successMsg();
    }

    public function saveDocument()
    {
        $validatedData = $this->validate([
            'document.company_type' => 'nullable|string',
            'document.document_type' => 'nullable|string',
            'document.verification' => 'nullable|string',
            'document.file' => 'nullable|string',
        ]);

        $workshop = Workshop::find($this->workshop?->id);
        if ($workshop){
            $workshop->update(['document' => $validatedData['document']]);
        }
        $update = Workshop::find($this->workshopId);
        if ($update){
             $update->update(['document' => $validatedData['document']]);
        }
        $this->successMsg();
    }



    public function mount($workshop = null)
    {
        if ($workshop) {
            $this->workshop = $workshop;
            $this->fill($workshop->toArray());
        }
    }


    public function render()
    {
        return view('livewire.admin.workshop.form');
    }
}
