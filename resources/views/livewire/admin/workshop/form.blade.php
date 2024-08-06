

<div class="nk-block nk-block-lg">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content ">
{{--            <h4 class="title nk-block-title">{{ 'Editing ' .$car->title  }} {{ $steps[$step - 1] }}</h4>--}}
          @if($step > 1)
                <h4 wire:click="goBack" class="title nk-block-title" style="cursor: pointer">
                    <img src="{{ asset('assets/img/icons/arrow-left.png') }}" />
                    {{ $steps[$step - 1] }}
                </h4>
          @endif

        </div>

        <div class="nk-block-head-content">
            <a href="{{ request()->has('back_url') ? request()->get('back_url') : route('admin.workshop.index') }}" wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
            <a href="{{ request()->has('back_url') ? request()->get('back_url') : route('admin.workshop.index') }}" wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
        </div>


    </div>
    <div class="row g-gs">

        <div class="col-lg-12">
            <div class="card card-bordered- h-100">
                <div class="card-inner">
                    <div class="container">

                        <form method="post" wire:submit="saveWorkshop">
                        <div class="container">
                            <div class="row">
                                <div style="background: transparent" class="step-form">
                                    @foreach($steps as $item)
                                        <div wire:key="{{ $item }}" wire:click="setStep({{ $loop->index + 1 }})"
                                             class="step {{ $step > $loop->index + 1 ? 'prev' : '' }} {{ $step == $loop->index + 1 ? 'active' : '' }}">
                                            @if($step > $loop->index + 1)
                                                <img class="step_img" src="{{ asset('admin/assets/images/mark.png') }}" style="height: 30px"/>
                                            @else
                                                <p>{{ $item }}</p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{--    {{ $step }}--}}
                        <div class="card card-">
                              <div class="card-inner">
                                  <div class="preview-block">
                                      @if($step == 1)

                                        <div wire:key="1" >

                                           <div class="div">
                                               <h4 class="mb-3 text-center">Company Info</h4>
                                               <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="company_name" class="required">Company Name <span class="text-danger">*</span></label>
                                                        <input type="text" id="company_name" wire:model.defer="company_info.company_name" name="company_info[company_name]" class="form-control" required>
                                                        @error('company_info.company_name') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="display_name" class="required">Display Name <span class="text-danger">*</span></label>
                                                        <input type="text" id="display_name" wire:model.defer="company_info.display_name" name="company_info[display_name]" class="form-control" required>
                                                        @error('company_info.display_name') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="company_number" class="required">Company Number <span class="text-danger">*</span></label>
                                                        <input type="text" id="company_number" wire:model.defer="company_info.company_number" name="company_info[company_number]" class="form-control" required>
                                                        @error('company_info.company_number') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="city" class="required">City/Town <span class="text-danger">*</span></label>
                                                        <input type="text" id="city" wire:model.defer="company_info.city" name="company_info[city]" class="form-control" required>
                                                        @error('company_info.city') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="street_name" class="required">Street Name <span class="text-danger">*</span></label>
                                                        <input type="text" id="street_name" wire:model.defer="company_info.street_name" name="company_info[street_name]" class="form-control" required>
                                                        @error('company_info.street_name') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="post_code" class="required">Post Code <span class="text-danger">*</span></label>
                                                        <input type="text" id="post_code" wire:model.defer="company_info.post_code" name="company_info[post_code]" class="form-control" required>
                                                        @error('company_info.post_code') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="company_reg_no" class="required">Company Reg no. <span class="text-danger">*</span></label>
                                                        <input type="text" id="company_reg_no" wire:model.defer="company_info.company_reg_no" name="company_info[company_reg_no]" class="form-control" required>
                                                        @error('company_info.company_reg_no') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="company_type" class="required">Company Type <span class="text-danger">*</span></label>
                                                        <select id="company_type" wire:model.defer="company_info.company_type" name="company_info[company_type]" class="form-control" required>
                                                            <option value="" disabled selected>Select</option>
                                                            <option value="type1">Type 1</option>
                                                            <option value="type2">Type 2</option>
                                                            <!-- Add more options as needed -->
                                                        </select>
                                                        @error('company_info.company_type') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="number_of_employees" class="required">Number of employees <span class="text-danger">*</span></label>
                                                        <input type="number" id="number_of_employees" wire:model.defer="company_info.number_of_employees" name="company_info[number_of_employees]" class="form-control" required>
                                                        @error('company_info.number_of_employees') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="company_website" class="required">Company website <span class="text-danger">*</span></label>
                                                        <input type="url" id="company_website" wire:model.defer="company_info.company_website" name="company_info[company_website]" class="form-control" required>
                                                        @error('company_info.company_website') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="contact_email" class="required">Contact Email <span class="text-danger">*</span></label>
                                                        <input type="email" id="contact_email" wire:model.defer="company_info.contact_email" name="company_info[contact_email]" class="form-control" required>
                                                        @error('company_info.contact_email') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="primary_phone_no" class="required">Primary Phone No. <span class="text-danger">*</span></label>
                                                        <input type="text" id="primary_phone_no" wire:model.defer="company_info.primary_phone_no" name="company_info[primary_phone_no]" class="form-control" required>
                                                        @error('company_info.primary_phone_no') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="secondary_phone_no">Secondary Phone Number </label>
                                                        <input type="text" id="secondary_phone_no" wire:model.defer="company_info.secondary_phone_no" name="company_info[secondary_phone_no]" class="form-control">
                                                        @error('company_info.secondary_phone_no') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="vat_registration_no">VAT registration number (if applicable) </label>
                                                        <input type="text" id="vat_registration_no" wire:model.defer="company_info.vat_registration_no" name="company_info[vat_registration_no]" class="form-control">
                                                        @error('company_info.vat_registration_no') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="region" class="required">Region <span class="text-danger">*</span></label>
                                                        <input type="text" id="region" wire:model.defer="company_info.region" name="company_info[region]" class="form-control" required>
                                                        @error('company_info.region') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="status" class="required">Status <span class="text-danger">*</span></label>
                                                        <select id="status" wire:model.defer="status" name="status" class="form-control" required>
                                                            <option value="" disabled selected>Select</option>
                                                            <option value="active">Active</option>
                                                            <option value="inactive">Inactive</option>
                                                            <!-- Add more options as needed -->
                                                        </select>
                                                        @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                           </div>
                                        </div>
                                    @endif

                                    @if($step == 2)
                                        <div wire:key="2" class="row justify-content-center" >

                                           <div>
                                                <h4 class="mb-3 text-center">Branch Info</h4>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="branch_name" class="required">Branch Name <span class="text-danger">*</span></label>
                                                        <input type="text" id="branch_name" wire:model.defer="branches.branch_name" name="branches[branch_name]" class="form-control" required>
                                                        @error('branches.branch_name') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="house_name_number" class="required">House Name & Number <span class="text-danger">*</span></label>
                                                        <input type="text" id="house_name_number" wire:model.defer="branches.house_name_number" name="branches[house_name_number]" class="form-control" required>
                                                        @error('branches.house_name_number') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="street_name" class="required">Street Name <span class="text-danger">*</span></label>
                                                        <input type="text" id="street_name" wire:model.defer="branches.street_name" name="branches[street_name]" class="form-control" required>
                                                        @error('branches.street_name') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="city" class="required">City/Town <span class="text-danger">*</span></label>
                                                        <input type="text" id="city" wire:model.defer="branches.city" class="form-control" required>
                                                        @error('branches.city') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="post_code" class="required">Post Code <span class="text-danger">*</span></label>
                                                        <input type="text" id="post_code" wire:model.defer="branches.post_code" class="form-control" required>
                                                        @error('branches.post_code') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="contact_email" class="required">Contact Email <span class="text-danger">*</span></label>
                                                        <input type="email" id="contact_email" wire:model.defer="branches.contact_email" class="form-control" required>
                                                        @error('branches.contact_email') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="primary_phone_no" class="required">Primary Phone No. <span class="text-danger">*</span></label>
                                                        <input type="text" id="primary_phone_no" wire:model.defer="branches.primary_phone_no" class="form-control" required>
                                                        @error('branches.primary_phone_no') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="secondary_phone_no">Secondary Phone Number</label>
                                                        <input type="text" id="secondary_phone_no" wire:model.defer="branches.secondary_phone_no" class="form-control">
                                                        @error('branches.secondary_phone_no') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="contact_person" class="required">Select Contact Person <span class="text-danger">*</span></label>
                                                        <select id="contact_person" wire:model.defer="branches.contact_person" class="form-control" required>
                                                            <option value="" disabled selected>Select</option>
                                                            <option value="1">Option</option>
                                                            <!-- Additional options would be added here -->
                                                        </select>
                                                        @error('branches.contact_person') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="status" class="required">Status <span class="text-danger">*</span></label>
                                                        <select id="status" wire:model.defer="branches.status" class="form-control" required>
                                                            <option value="" disabled selected>Select</option>
                                                            <option value="active">Active</option>
                                                            <option value="inactive">Inactive</option>
                                                        </select>
                                                        @error('branches.status') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="branch_images">Branch Images</label>
                                                        <input type="file" id="branch_images" wire:model="branches.branch_image" class="form-control">
                                                        @error('branches.branch_image') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    @endif

                                      @if($step == 3)

                                          <div wire:key="3" class="row justify-content-center">

                                          <div>
                                              <h4 class="mb-3 text-center">Contact Persons</h4>
                                               <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="first_name" class="required">First Name <span class="text-danger">*</span></label>
                                                    <input type="text" id="first_name" wire:model.defer="contact_persons.first_name" class="form-control" required>
                                                    @error('contact_persons.first_name') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="last_name" class="required">Last Name <span class="text-danger">*</span></label>
                                                    <input type="text" id="last_name" wire:model.defer="contact_persons.last_name" class="form-control" required>
                                                    @error('contact_persons.last_name') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="primary_phone_no" class="required">Primary Phone No. <span class="text-danger">*</span></label>
                                                    <input type="text" id="primary_phone_no" wire:model.defer="contact_persons.primary_phone_no" class="form-control" required>
                                                    @error('contact_persons.primary_phone_no') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="secondary_phone_no">Secondary Phone Number</label>
                                                    <input type="text" id="secondary_phone_no" wire:model.defer="contact_persons.secondary_phone_no" class="form-control">
                                                    @error('contact_persons.secondary_phone_no') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="email" class="required">Email <span class="text-danger">*</span></label>
                                                    <input type="email" id="email" wire:model.defer="contact_persons.email" class="form-control" required>
                                                    @error('contact_persons.email') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="branch" class="required">Branch <span class="text-danger">*</span></label>
                                                    <input type="text" id="branch" wire:model.defer="contact_persons.branch" class="form-control" required>
                                                    @error('contact_persons.branch') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                          </div>

                                        </div>

                                      @endif
                                      @if($step == 4)

                                          <div wire:key="4" class="row justify-content-center">

                                          <div>
                                              <h4 class="mb-3 text-center">Document</h4>
                                               <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="first_name" class="required">Company Type <span class="text-danger">*</span></label>
                                                    <select wire:model.defer="document.company_type" class="form-control" id="">
                                                        <option value="Company 1">Company 1</option>
                                                    </select>
                                                    @error('document.company_type') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                               <div class="form-group col-md-4">
                                                    <label for="first_name" class="required">Document Type <span class="text-danger">*</span></label>
                                                    <select wire:model.defer="document.document_type" class="form-control" id="">
                                                        <option value="Document 1">Document 1</option>
                                                    </select>
                                                    @error('document.document_type') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                               <div class="form-group col-md-4">
                                                    <label for="first_name" class="required">Verification<span class="text-danger">*</span></label>
                                                    <select wire:model.defer="document.verification" class="form-control" id="">
                                                        <option value="Action">Action</option>
                                                    </select>
                                                    @error('document.verification') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                               <div class="form-group col-md-4">
                                                    <label for="first_name" class="required">Document<span class="text-danger">*</span></label>
                                                   <input type="file" wire:model.defer="document.file" class="form-control">
                                                    @error('document.file') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>


                                            </div>
                                          </div>

                                        </div>

                                      @endif
                                      @if($step == 5)

                                          <div wire:key="5" class="row justify-content-center">

                                          <div>
                                              <h4 class="mb-3 text-center">Billing Info</h4>
                                              <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#tabItem5"><em class="icon ni ni-master-card"></em><span>Debit/Credit card</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#tabItem6"><em class="icon ni ni-building"></em><span>Bank Transfer</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#tabItem7"><em class="icon ni ni-money"></em><span>Cash</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#tabItem8"><em class="icon ni ni-file-code"></em><span>E Check</span></a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tabItem5">
                                                         <div>
                                                             <h4 class="mb-3 text-center">Payment Detail</h4>
                                                            <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Card Number <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.card_number" class="form-control" >
                                                                    @error('billing_info.card_number') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Expiry Date <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.expiry_date" class="form-control" >
                                                                    @error('billing_info.expiry_date') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">CVV Code <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.card_cvv" class="form-control" >
                                                                    @error('billing_info.card_cvv') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                            </div>
                                                         </div>
                                                        <div>
                                                             <h4 class="mb-3 text-center">Billing Address</h4>
                                                            <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Recipient Name <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.recipient_name" class="form-control" >
                                                                    @error('billing_info.recipient_name') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">House Name/Number <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.house_number" class="form-control" >
                                                                    @error('billing_info.house_number') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Street Name <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.street" class="form-control" >
                                                                    @error('billing_info.street') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">City/Town <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.city" class="form-control" >
                                                                    @error('billing_info.city') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Post Code <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.postcode" class="form-control" >
                                                                    @error('billing_info.postcode') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                            </div>
                                                         </div>
                                                    </div>
                                                    <div class="tab-pane" id="tabItem6">
                                                         <div>
                                                             <h4 class="mb-3 text-center">Payment Detail</h4>
                                                            <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Account Name <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.acct_name" class="form-control" >
                                                                    @error('billing_info.acct_name') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Account Number <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.acct_number" class="form-control" >
                                                                    @error('billing_info.acct_number') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Sort Code <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.sortcode" class="form-control" >
                                                                    @error('billing_info.sortcode') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">IBAN Number <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.iban" class="form-control" >
                                                                    @error('billing_info.iban') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Bank <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.iban" class="form-control" >
                                                                    @error('billing_info.iban') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Primary Phone Number <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.phone_number" class="form-control" >
                                                                    @error('billing_info.phone_number') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Secondary Phone Number </label>
                                                                    <input type="text" wire:model.defer="billing_info.sec_number" class="form-control" >
                                                                    @error('billing_info.phone_number') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Mobile Phone <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.phone" class="form-control" >
                                                                    @error('billing_info.phone') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Contact Person  <span class="text-danger">*</span></label>
                                                                    <select wire:model.defer="billing_info.contact_person" id="" class="form-control">
                                                                        <option value="">1</option>
                                                                    </select>
                                                                    @error('billing_info.contact_person') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Status </label>
                                                                    <select wire:model.defer="billing_info.status" class="form-control" id="">
                                                                        <option value="1">Active</option>
                                                                    </select>
                                                                    @error('billing_info.status') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                            </div>
                                                         </div>
                                                         <div>
                                                             <h4 class="mb-3 text-center">Billing Address</h4>
                                                            <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Recipient Name <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.recipient_name" class="form-control" required>
                                                                    @error('billing_info.recipient_name') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">House Name/Number <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.house_number" class="form-control" required>
                                                                    @error('billing_info.house_number') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Street Name <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.street" class="form-control" required>
                                                                    @error('billing_info.street') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">City/Town <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.city" class="form-control" required>
                                                                    @error('billing_info.city') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Post Code <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.postcode" class="form-control" required>
                                                                    @error('billing_info.postcode') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                            </div>
                                                         </div>
                                                    </div>
                                                    <div class="tab-pane" id="tabItem7">
                                                        <p>Cash</p>
                                                    </div>
                                                    <div class="tab-pane" id="tabItem8">
                                                          <div>
                                                             <h4 class="mb-3 text-center">Billing Address</h4>
                                                            <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Recipient Name <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.recipient_name" class="form-control" >
                                                                    @error('billing_info.recipient_name') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">House Name/Number <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.house_number" class="form-control" >
                                                                    @error('billing_info.house_number') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Street Name <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.street" class="form-control" >
                                                                    @error('billing_info.street') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">City/Town <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.city" class="form-control" >
                                                                    @error('billing_info.city') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Post Code <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.postcode" class="form-control" >
                                                                    @error('billing_info.postcode') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                            </div>
                                                         </div>
                                                         <div>
                                                             <h4 class="mb-3 text-center">Payment Details</h4>
                                                            <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Account Type <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.account_type" class="form-control" >
                                                                    @error('billing_info.account_type') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Account Holder <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.account_holder" class="form-control" >
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Account Number <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.account_number" class="form-control" >
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Routing Number <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.routing_number" class="form-control" >
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="first_name" class="required">Account Phone No <span class="text-danger">*</span></label>
                                                                    <input type="text" wire:model.defer="billing_info.routing_number" class="form-control" >
                                                                </div>
                                                            </div>
                                                         </div>
                                                    </div>
                                                </div>


                                          </div>

                                        </div>

                                      @endif
                                      @if($step == 6)

                                          <div wire:key="6" class="row justify-content-center">

                                                <div>
                                                <h4 class="mb-3 text-center">Document</h4>
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#tabItem5"><span>Services</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#tabItem6"><span>Products</span></a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tabItem5">
                                                        <div>
                                                            <h5 class="mb-3 text-left">General Service</h5>
                                                            <div class="card-inner">
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-12 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox" class="custom-control-input" id="enableAllServices">
                                                                                <label class="custom-control-label" for="enableAllServices">Enable All</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox" wire:model.defer="service.interim_service" class="custom-control-input" id="interimService">
                                                                                <label class="custom-control-label" for="interimService">Interim Service</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox" class="custom-control-input" id="engOilAndFilterChange">
                                                                                <label class="custom-control-label" for="engOilAndFilterChange">Eng Oil & Filter Change</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox" class="custom-control-input" id="fullService">
                                                                                <label class="custom-control-label" for="fullService">Full Service</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <h5 class="mb-3 mt-4 text-left">Car Wash</h5>
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-2 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox" class="custom-control-input" id="outsideWash">
                                                                                <label class="custom-control-label" for="outsideWash">Outside Wash</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox" class="custom-control-input" id="inAndOut">
                                                                                <label class="custom-control-label" for="inAndOut">In & Out</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox" class="custom-control-input" id="specialService">
                                                                                <label class="custom-control-label" for="specialService">Special Service</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox" class="custom-control-input" id="miniValet">
                                                                                <label class="custom-control-label" for="miniValet">Mini Valet</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox" class="custom-control-input" id="fullValet">
                                                                                <label class="custom-control-label" for="fullValet">Full Valet</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                 <h5 class="mb-3 mt-4 text-left">MOT</h5>
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-12 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox" class="custom-control-input" id="MOTenable">
                                                                                <label class="custom-control-label" for="MOTenable">Enable All</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox" class="custom-control-input" id="MOT">
                                                                                <label class="custom-control-label" for="MOT">MOT</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox" class="custom-control-input" id="EngFilterChange">
                                                                                <label class="custom-control-label" for="EngFilterChange">Eng Oil & Filter Change + MOT</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox" class="custom-control-input" id="FullServiceMOT">
                                                                                <label class="custom-control-label" for="FullServiceMOT">Full Service + MOT</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tabItem6">
                                                        <div>
                                                            <h5 class="mb-3 text-left">General Service</h5>
                                                            <div class="card-inner">
                                                                <div class="row gy-4">
                                                                    <div class="col-lg-12 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox" class="custom-control-input" id="ProductEnable">
                                                                                <label class="custom-control-label" for="ProductEnable">Enable All</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox" class="custom-control-input" id="Tyre">
                                                                                <label class="custom-control-label" for="Tyre">Tyre</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox" class="custom-control-input" id="Filter">
                                                                                <label class="custom-control-label" for="Filter">Filter</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox" class="custom-control-input" id="Mirror">
                                                                                <label class="custom-control-label" for="Mirror">Mirror</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                      @endif
                                      @if($step == 7)
                                            <div class="container mt-5">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#serviceCommission">Service Commission</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#productCommission">Product Commission</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="serviceCommission">
                                                <div class="mt-3">

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="selectBranch" class="form-label">Select Branch (es)*</label>
                                                        <select class="form-select" id="selectBranch">
                                                            <option>All</option>
                                                            <option>Branch 1</option>
                                                            <option>Branch 2</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="selectService" class="form-label">Select Service*</label>
                                                        <select class="form-select" id="selectService">
                                                            <option>Select Service</option>
                                                            <option>Service 1</option>
                                                            <option>Service 2</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="selectSubService" class="form-label">Select Sub Service*</label>
                                                        <select class="form-select" id="selectSubService">
                                                            <option>Select Sub Service</option>
                                                            <option>Sub Service 1</option>
                                                            <option>Sub Service 2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-3">
                                                        <label for="actualPrice" class="form-label">Actual Price</label>
                                                        <input type="text" class="form-control" id="actualPrice" placeholder="$10">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="profitType" class="form-label">Profit</label>
                                                        <select class="form-select" id="profitType">
                                                            <option>Percentage</option>
                                                            <option>Fixed Amount</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="profitPercentage" class="form-label">Profit Percentage</label>
                                                        <input type="text" class="form-control" id="profitPercentage" placeholder="25%">
                                                    </div>

                                                </div>
                                                 <div class="col-md-3">
                                                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                                                    </div>

                                                </div>
                                                <br>
                                                 <div class="table-responsive mt-4">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Service Name</th>
                                                                    <th>Amount</th>
                                                                    <th>Commission</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Car Spa & Cleaning</td>
                                                                    <td>£40</td>
                                                                    <td>£20</td>
                                                                    <td><span class="badge bg-success">Active</span></td>
                                                                    <td>
                                                                        <button class="btn btn-info">Edit</button>
                                                                        <button class="btn btn-danger">Delete</button>
                                                                    </td>
                                                                </tr>
                                                                <!-- Additional rows here -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                            </div>

                                            <div class="tab-pane fade" id="productCommission">
                                                <!-- Similar structure for Product Commission -->
                                                <div class="mt-3">
                                                    <p>Product commission content goes here...</p>
                                                   <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="selectBranchProduct" class="form-label">Select Branch (es)*</label>
                                                        <select class="form-select" id="selectBranchProduct">
                                                            <option>All</option>
                                                            <option>Branch 1</option>
                                                            <option>Branch 2</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="selectProduct" class="form-label">Select Product*</label>
                                                        <select class="form-select" id="selectProduct">
                                                            <option>Select product</option>
                                                            <option>Product 1</option>
                                                            <option>Product 2</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="selectSubProduct" class="form-label">Select Sub Product*</label>
                                                        <select class="form-select" id="selectSubProduct">
                                                            <option>Select Sub Product</option>
                                                            <option>Sub Product 1</option>
                                                            <option>Sub Product 2</option>
                                                        </select>
                                                    </div>
                                                    </div>
                                                    <div class="row mt-3">
                <div class="col-md-3">
                    <label for="actualPriceProduct" class="form-label">Actual Price</label>
                    <input type="text" class="form-control" id="actualPriceProduct" placeholder="$10">
                </div>
                <div class="col-md-3">
                    <label for="profitTypeProduct" class="form-label">Profit</label>
                    <select class="form-select" id="profitTypeProduct">
                        <option>Percentage</option>
                        <option>Fixed Amount</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="profitPercentageProduct" class="form-label">Profit Percentage</label>
                    <input type="text" class="form-control" id="profitPercentageProduct" placeholder="25%">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </div>
            </div>
                                               </div>
                                                <br>
                                              <div class="table-responsive mt-4">
                                                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Amount</th>
                        <th>Commission</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Battery</td>
                        <td>£40</td>
                        <td>£20</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td>
                            <button class="btn btn-info btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Car Wipers</td>
                        <td>£40</td>
                        <td>£20</td>
                        <td><span class="badge bg-danger">Inactive</span></td>
                        <td>
                            <button class="btn btn-info btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Tyres</td>
                        <td>£40</td>
                        <td>£20</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td>
                            <button class="btn btn-info btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
                                            </div>
                                        </div>
                                    </div>


                                      @endif
                                  </div>
                              </div>
                        </div>

                        <div class="row justify-content-center-">
                            <div class="col-lg-8 offset-lg-4">
                                <div class="form-group mt-3 w-100">
                                    <button type="submit" style="display: inline" class="btn btn-lg btn-primary col-4 text-center">{{ $step > 3 ? 'Save' : 'Next' }}</button>
                                </div>
                            </div>

                        </div>

                    </form>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div><!-- .nk-block -->

{{--<script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>--}}
