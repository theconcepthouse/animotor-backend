

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
            <a href="{{ request()->has('back_url') ? request()->get('back_url') : route('admin.drivers') }}" wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
            <a href="{{ request()->has('back_url') ? request()->get('back_url') : route('admin.drivers') }}" wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
        </div>

    </div>
    <div class="row g-gs">

        <div class="col-lg-12">
            <div class="card card-bordered- h-100">
                <div class="card-inner">

                    <form method="post" wire:submit="saveDriver">
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
                                          <h4 class="text-center">New Customer Details</h4>
                                        <div wire:key="1" class="row mt-3 gy-4">
                                              <div class="col-md-4">
                                                <label for="first_name" class="form-label">First Name</label>
                                                <input type="text" wire:model="first_name" class="form-control" id="first_name" name="first_name" >
                                            </div>
                                            <div class="col-md-4">
                                                <label for="last_name" class="form-label">Last Name</label>
                                                <input type="text" wire:model="last_name" class="form-control" id="last_name" name="last_name"  >
                                            </div>
                                            <div class="col-md-4">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" wire:model="email" class="form-control" id="email" name="email" >
                                            </div>
                                            <div class="col-md-4">
                                                <label for="work_phone" class="form-label">Work Number</label>
                                                <input type="tel" wire:model="work_phone" class="form-control" id="work_phone" name="work_phone"  >
                                            </div>
                                            <div class="col-md-4">
                                                <label for="phone" class="form-label">Mobile Number</label>
                                                <input type="tel" wire:model="phone" class="form-control" id="phone" name="phone" >
                                            </div>
{{--                                            <div class="col-md-4">--}}
{{--                                                <label for="hire_type" class="form-label">Hire Type</label>--}}
{{--                                                <select class="form-control" id="hire_type" name="hire_type" wire:model="hire_type" >--}}
{{--                                                    <option value="">Select Hire Type</option>--}}
{{--                                                    <option value="Social domestic" {{ $user?->hire_type == 'Social domestic' ? 'selected' : '' }}>Social domestic</option>--}}
{{--                                                    <option value="Rent to to buy" {{ $user?->hire_type == 'Rent to to buy' ? 'selected' : '' }}>Rent to to buy</option>--}}
{{--                                                    <option value="Credit hire" {{ $user?->hire_type == 'Credit hire' ? 'selected' : '' }}>Credit hire</option>--}}
{{--                                                    <option value="Insurance" {{ $user?->hire_type == 'Insurance' ? 'selected' : '' }}>Insurance</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
                                            <div class="col-md-4">
                                                <input type="hidden" id="role" name="role" wire:model="{{ $role }}" >
                                            </div>

                                        </div>
                                    @endif

                                    @if($step == 2)
                                        <h4 class="text-center">Address</h4>
                                        <div wire:key="2" class="row justify-content-center">

                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-01">Address Line 01</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="address" wire:model="address" class="form-control" id="default-01" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-01">Address Line 02</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="address_2" wire:model="address_2" id="default-01" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-01">Country</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="country" wire:model="country" id="default-01" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-01">City </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="city" wire:model="city" id="default-01" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-01">Postcode </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="postcode" wire:model="postcode" id="default-01" >
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    @endif

                                      @if($step == 3)
                                          <div class="container">
                                              <h4 class="text-center">Drivers license Details</h4>
                                              <div wire:key="3" class="row ">

                                                  <div class="row mb-3">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="driving_license_number">Driving license number</label>
                                                                <input type="text" id="driving_license_number" class="form-control" wire:model="driving_license_number">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="type_of_license_held">Type of license held</label>
                                                                <input type="text" id="type_of_license_held" class="form-control" wire:model="type_of_license_held">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="license_issue_date">License issue date</label>
                                                                <input type="date" id="license_issue_date" class="form-control" wire:model="license_issue_date">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="license_expiry_date">License expiry date</label>
                                                                <input type="date" id="license_expiry_date" class="form-control" wire:model="license_expiry_date">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="driving_test_pass_date">Driving test pass date</label>
                                                                <input type="date" id="driving_test_pass_date" class="form-control" wire:model="driving_test_pass_date">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="national_insurance_number">National Insurance number</label>
                                                                <input type="text" id="national_insurance_number" class="form-control" wire:model="national_insurance_number">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="taxi_number">Taxi number</label>
                    <input type="text" id="taxi_number" class="form-control" wire:model="taxi_number">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="dvla_check_code">DVLA check code</label>
                    <input type="text" id="dvla_check_code" class="form-control" wire:model="dvla_check_code">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="issuing_authority">Issuing authority</label>
                    <input type="text" id="issuing_authority" class="form-control" wire:model="issuing_authority">
                </div>
            </div>
        </div>

                                              </div>
                                          </div>
                                      @endif
                                      @if($step == 4)
                                          <div class="container">
                                              <h4 class="text-center">
                                                  Taxi License
                                              </h4>
                                              <div wire:key="4" class="row mb-3">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="taxi_license_number">Taxi license number</label>
                                                            <input type="text" id="taxi_license_number" class="form-control" wire:model="taxi_license_number">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="issuing_authority">Issuing authority</label>
                                                            <input type="text" id="issuing_authority" class="form-control" wire:model="taxi_issuing_authority">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="issuing_date">Issuing Date</label>
                                                            <input type="date" id="issuing_date" class="form-control" wire:model="issuing_date">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="expiry_date">Expiry Date</label>
                                                            <input type="date" id="expiry_date" class="form-control" wire:model="expiry_date">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="license_type">License Type</label>
                                                            <select name="license_type" id="license_type" class="form-control" wire:model="license_type">
                                                                <option value="Private Hire">Private Hire</option>
                                                                <option value="Public Hire">Public Hire (Black Cab)</option>
                                                                <option value="Hackney Carriage">Hackney Carriage</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="operator_name">Operator name (optional)</label>
                                                            <input type="text" id="operator_name" class="form-control" wire:model="operator_name">
                                                        </div>
                                                    </div>

                                              </div>



                                          </div>
                                      @endif
                                      @if($step == 5)
                                          <div class="container">
                                              <h4 class="text-center">
                                                  Emergency Contact Details
                                              </h4>
                                              <div wire:key="5" class="row mb-3">
                                                    <div class="row mb-3">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="contact_name">Contact Name</label>
                                                                <input type="text" id="contact_name" class="form-control" wire:model="contact_name">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="phone_number">Phone Number</label>
                                                                <input type="text" id="phone_number" class="form-control" wire:model="phone_number">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="email_address">Email Address</label>
                                                                <input type="email" id="email_address" class="form-control" wire:model="email_address">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="relationship">Relationship</label>
                                                                <input type="text" id="relationship" class="form-control" wire:model="relationship">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                          </div>
                                      @endif
                                      @if($step == 6)
                                          <div class="container">
                                              <h4 class="text-center">
                                                  Documents
                                              </h4>
                                              <div wire:key="6" class="row mb-3">
                                                    <div class="row mb-3">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="contact_name">Driver's License Front</label>
                                                                <input type="file" id="contact_name" class="form-control" wire:model="contact_name">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="phone_number">Driver's License Back</label>
                                                                <input type="file" id="phone_number" class="form-control" wire:model="phone_number">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="email_address">Proof Of Address</label>
                                                                <input type="file" id="email_address" class="form-control" wire:model="email_address">
                                                            </div>
                                                        </div>
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
</div><!-- .nk-block -->
