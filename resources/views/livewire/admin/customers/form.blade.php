

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
{{--        <div class="nk-block-head-content">--}}
{{--            @if($step)--}}
{{--                <h4></h4>--}}
{{--            @endif--}}
{{--        </div>--}}

    </div>
    <div class="row g-gs">

        <div class="col-lg-12">
            <div class="card card-bordered- h-100">
                <div class="card-inner">

                    <form method="post" wire:submit="saveOnboarding">
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
                                            <div class="col-md-4">
                                                <label for="hire_type" class="form-label">Hire Type</label>
                                                <select class="form-control" id="hire_type" name="hire_type" wire:model="hire_type" >
                                                    <option value="">Select Hire Type</option>
                                                    <option value="Social domestic" {{ $user?->hire_type == 'Social domestic' ? 'selected' : '' }}>Social domestic</option>
                                                    <option value="Rent to to buy" {{ $user?->hire_type == 'Rent to to buy' ? 'selected' : '' }}>Rent to to buy</option>
                                                    <option value="Credit hire" {{ $user?->hire_type == 'Credit hire' ? 'selected' : '' }}>Credit hire</option>
                                                    <option value="Insurance" {{ $user?->hire_type == 'Insurance' ? 'selected' : '' }}>Insurance</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="hidden" id="role" name="role" wire:model="{{ $role }}" >
                                            </div>

                                        </div>
                                    @endif

                                    @if($step == 2)
                                        <h4 class="text-center">Vehicle Details</h4>
                                        <div wire:key="2" class="row justify-content-center">

                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-01">Registration</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="registration_number" wire:model="registration_number" class="form-control" id="default-01" placeholder="Input placeholder">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-01">Make</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="make" wire:model="make" id="default-01" placeholder="Input placeholder">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-01">Model</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="model" wire:model="model" id="default-01" placeholder="Input placeholder">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-01">Insurance Group (Optional)</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="insurance_group" wire:model="insurance_group" id="default-01" placeholder="Input placeholder">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-01">Date Out</label>
                                                    <div class="form-control-wrap">
                                                        <input type="date" class="form-control" name="date_out" wire:model="date_out" id="default-01" placeholder="Input placeholder">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-01">Time</label>
                                                    <div class="form-control-wrap">
                                                        <input type="time" class="form-control" name="time_out" wire:model="time_out" id="default-01" placeholder="Input placeholder">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-01">Date Due Back</label>
                                                    <div class="form-control-wrap">
                                                        <input type="date" class="form-control" name="date_due" wire:model="date_due" id="default-01" placeholder="Input placeholder">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-01">Time</label>
                                                    <div class="form-control-wrap">
                                                        <input type="time" class="form-control" name="time_due" wire:model="time_due" id="default-01" placeholder="Input placeholder">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                      @if($step == 3)
                                          <div class="container">
                                              <h4 class="text-center">Rates</h4>
                                              <div wire:key="3" class=" ">
{{--                                                  {{ dd($rateItems['items']) }}--}}


                                                <div class="row items-container">

                                                     @foreach ($rateItems as $rateItem)
                                                       @foreach ($rateItem['items'] as $item)

                                                        <div class="col-lg-3 mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-01">Item</label>
                                                        <div class="form-control-wrap">
                                                            <input style="background: #e6e6e6" type="text" readonly value="{{ $item['item']  }}" class="form-control" id="default-01" placeholder="Item">

                                                        </div>
                                                    </div>
                                                </div>
                                                        <div class="col-lg-3 mb-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="default-01">Rates</label>
                                                            <div class="form-control-wrap">
                                                                <input style="background: #e6e6e6" type="text" readonly value="{{ $item['rate'] }}" class="form-control" id="default-01" placeholder="Rates">
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="col-lg-3 mb-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-01">Units</label>
                                                                <div class="form-control-wrap">
                                                                    <input style="background: #e6e6e6" type="text" readonly value="{{ $item['units'] }}" class="form-control" id="default-01" placeholder="Units">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 mb-3">
                                                        <div class="form-group">
                                                        <label class="form-label" for="default-01">Price</label>
                                                        <div class="form-control-wrap">
                                                            <input style="background: #e6e6e6" type="number" readonly value="{{ $item['price'] }}" class="form-control" id="default-01" placeholder="Price">
                                                        </div>
                                                    </div>
                                                       </div>

                                                      @endforeach
                                                    @endforeach

                                                </div>
                                                  <hr>
{{--                                                  <a onclick="myFunction()" class="btn btn-secondary mb-3" >Add New Item</a>--}}

                                                     <form wire:submit.prevent="saveRate" method="POST">
                                                          <div style="display: inline" id="">
                                                            <div class="row">
                                                            <div class="col-lg-3 mb-3">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="item-0">Item</label>
                                                                    <div class="form-control-wrap">
                                                                        <select  wire:model="items.0.item" class="form-control" id="item-0">
                                                                            <option value="Per Hour">Per Hour</option>
                                                                            <option value="Per Week">Per Week</option>
                                                                            <option value="Per Month">Per Month</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-3">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="rate-0">Rates</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="number"  wire:model="items.0.rate" class="form-control" id="rate-0" placeholder="Rates" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-3">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="units-0">Units</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="number"  wire:model="items.0.units" class="form-control" id="units-0" placeholder="Units" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-3">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="price-0">Price</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="number" wire:model="items.0.price" class="form-control" id="price-0" placeholder="Price" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
{{--                                                               <a data-bs-toggle="modal" class="btn btn-link " href="#addItem" >Add New</a>--}}
                                                               <a onclick="myFunction()" class="btn btn-link mb-3" >Add New Item</a>

                                                          </div>
                                                            <div style="display: none" id="myDIV">
                                                                <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <label for="num">Item</label>
                                                                    <input type="text" class="form-control" id="num" wire:model="other_items.0.item" placeholder="Item" >
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="amount">Unit</label>
                                                                    <input type="number" class="form-control" id="amount" wire:model="other_items.0.units" placeholder="Unit" >
                                                                </div>

                                                                 <div class="form-group col-md-4">
                                                                    <label for="receivedDate">Price</label>
                                                                    <input type="number" class="form-control" id="receivedDate" wire:model="other_items.0.price" placeholder="Price" >
                                                                </div>
                                                            </div>
                                                             </div>
                                                            <div class="row mt-5">
                                                                  <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="default-01">Subtotal {{ $subtotal }}</label>
                                                                    <div class="form-control-wrap">
                                                                        <input  type="number" wire:model="subtotal" class="form-control" value="{{ $subtotal }}" readonly id="default-01" placeholder="0.00">
                                                                    </div>
                                                                </div>
                                                              </div>
                                                                  <div class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="full-name">Total Paid</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="number" wire:model="total_paid" class="form-control" id="full-name" placeholder="Total Paid">
                                                                        </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="full-name">Total Due</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="number" wire:model="total_due" class="form-control" id="full-name" placeholder="0.00">
                                                                        </div>
                                                                    </div>
                                                              </div>

                                                    </div>
                                                        <button type="submit" class="btn btn-primary mt-2">Save</button>
                                                    </form>

                                              </div>


                                          </div>

                                      @endif
                                      @if($step == 4)
                                          <div class="container">
                                              <h4 class="text-center">
                                                  Additional fees and charges applicable to this agreement
                                              </h4>
                                              <div wire:key="3" class="row ">
                                                    <div class="row mt-5">
                                                        <!-- Late Payment per Day -->
                                                        <div class="col-lg-4 mb-3">
                                                            <div class="form-control-wrap">
                                                                <label class="form-label" for="late-payment-per-day">Late Payment per Day</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">£</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="late-payment-per-day" name="late_payment_per_day" wire:model="late_payment_per_day"  placeholder="2.00">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Admin Charge for PCN Ticket -->
                                                        <div class="col-lg-4 mb-3">
                                                            <div class="form-control-wrap">
                                                                <label class="form-label" for="admin-charge-for-pcn-ticket">Admin Charge for PCN Ticket</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">£</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="admin-charge-for-pcn-ticket" name="admin_charge_for_pcn_ticket" wire:model="admin_charge_for_pcn_ticket"  placeholder="2.00">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Admin Charge for Speeding Ticket -->
                                                        <div class="col-lg-4 mb-3">
                                                            <div class="form-control-wrap">
                                                                <label class="form-label" for="admin-charge-for-speeding-ticket">Admin Charge for Speeding Ticket</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">£</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="admin-charge-for-speeding-ticket" name="admin_charge_for_speeding_ticket" wire:model="admin_charge_for_speeding_ticket"  placeholder="2.00">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Admin Charge for Bus Lane Tickets -->
                                                        <div class="col-lg-4 mb3">
                                                            <div class="form-control-wrap">
                                                                <label class="form-label" for="admin-charge-for-bus-lane-tickets">Admin Charge for Bus Lane Tickets</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">£</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="admin-charge-for-bus-lane-tickets" name="admin_charge_for_bus_lane_tickets" wire:model="admin_charge_for_bus_lane_tickets"  placeholder="2.00">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Returning Vehicle Dirty (Minor) -->
                                                        <div class="col-lg-4 mb-3">
                                                            <div class="form-control-wrap">
                                                                <label class="form-label" for="returning-vehicle-dirty-minor">Returning Vehicle Dirty (Minor)</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">£</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="returning-vehicle-dirty-minor" name="returning_vehicle_dirty_minor" wire:model="returning_vehicle_dirty_minor"  placeholder="2.00">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Returning Vehicle Dirty (Major) -->
                                                        <div class="col-lg-4 mb-3">
                                                            <div class="form-control-wrap">
                                                                <label the form-label for="returning-vehicle-dirty-major">Returning Vehicle Dirty (Major)</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">£</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="returning-vehicle-dirty-major" name="returning_vehicle_dirty_major" wire:model="returning_vehicle_dirty_major"  placeholder="2.00">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Repossession/Personal Visit (Minimum) -->
                                                        <div class="col-lg-4 mb-3">
                                                            <div class="form-control-wrap">
                                                                <label class="form-label" for="repossession-personal-visit">Repossession/Personal Visit (Minimum)</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">£</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="repossession-personal-visit" name="repossession_personal_visit" wire:model="repossession_personal_visit"  placeholder="2.00">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  <div class="row mt-4">
                                                    <!-- Mileage Limit Radios -->
                                                    <div class="col-lg-4 mb-3">
                                                        <div class="preview-block">
                                                            <label class="form-label" for="milage-limit-period">Mileage Limit</label>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio1" name="milage_limit" checked class="custom-control-input" wire:model="milage_limit" value="1" />
                                                                <label class="custom-control-label" for="customRadio1">Yes</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio2" name="milage_limit" class="custom-control-input" wire:model="milage_limit" value="0" />
                                                                <label class="custom-control-label" for="customRadio2">No</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Milage Limit Period -->
                                                    <div class="col-lg-4 mb-3">
                                                        <div class="form-control-wrap">
                                                            <label class="form-label" for="milage-limit-period">Mileage Limit</label>
                                                            <div class="input-group">
                                                                <select class="form-control" id="milage-limit-period" name="milage_limit_period" wire:model="milage_limit_period">
                                                                    <option value="per_day">Per Day</option>
                                                                    <option value="per_week">Per Week</option>
                                                                    <option value="per_month">Per Month</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Mileage Limit Value -->
                                                    <div class="col-lg-4 mb-3">
                                                        <div class="form-control-wrap">
                                                            <label class="form-label" for="milage-limit-value">Mileage Limit Value</label>
                                                            <div class="input-group">
                                                                <select class="form-control form-control-select" id="milage-limit-value" name="milage_limit_value" wire:model="milage_limit_value">
                                                                    <option value="4">4</option>
                                                                    <option value="8">8</option>
                                                                    <option value="12">12</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Excess Mileage Fee -->
                                                    <div class="col-lg-4 mb-3">
                                                        <div class="form-control-wrap">
                                                            <label class="form-label" for="excess-milage-fee">Excess Mileage Fee (per mile)</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">£</span>
                                                                </div>
                                                                <input type="text" class="form-control" id="excess-milage-fee" name="excess_milage_fee" wire:model="excess_milage_fee"  placeholder="2.00">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Lost/Damaged Key Charges -->
                                                    <div class="col-lg-4 mb-3">
                                                        <div class="form-control-wrap">
                                                            <label class="form-label" for="lost-damaged-key-charges">Lost/Damaged Key Charges</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">£</span>
                                                                </div>
                                                                <input type="text" class="form-control" id="lost-damaged-key-charges" name="lost_damaged_key_charges" wire:model="lost_damaged_key_charges" placeholder="2.00">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Vehicle Recovery Charges -->
                                                    <div class="col-lg-4 mb-3">
                                                        <div class="form-control-wrap">
                                                            <label the form-label for="vehicle-recovery-charges">Vehicle Recovery Charges</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span the input-group-text id="basic-addon1">£</span>
                                                                </div>
                                                                <input type="text" class="form-control" id="vehicle-recovery-charges" name="vehicle_recovery_charges" wire:model="vehicle_recovery_charges" placeholder="2.00">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Accident NON-FAULT EXCESS FEE -->
                                                    <div class="col-lg-4 mb-3">
                                                        <div class="form-control-wrap">
                                                            <label class="form-label" for="accident-non-fault-excess-fee">Accident NON-FAULT EXCESS FEE</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span the input-group-text id="basic-addon1">£</span>
                                                                </div>
                                                                <input type="text" class="form-control" id="accident-non-fault-excess-fee" name="accident_non_fault_excess_fee" wire:model="accident_non_fault_excess_fee"  placeholder="2.00">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Accident FAULT BASED EXCESS FEE -->
                                                    <div class="col-lg-4 mb-3">
                                                        <div class="form-control-wrap">
                                                            <label the form-label for="accident-fault-based-excess-fee">Accident FAULT BASED EXCESS FEE</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span the input-group-text id="basic-addon1">£</span>
                                                                </div>
                                                                <input type="text" class="form-control" id="accident-fault-based-excess-fee" name="accident_fault_based_excess_fee" wire:model="accident_fault_based_excess_fee"  placeholder="2.00">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                              </div>

                                              <div class="mt-5">
                                                  <a href="" class="btn btn-outline-secondary">Invite by Link</a>
                                                  <a href="" class="btn btn-secondary">Invite by Email</a>
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

                     <div class="modal fade" id="addItem" tabindex="-1" aria-labelledby="addItemLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                <div class="modal-body modal-body-md">
                                   <form wire:submit.prevent="saveOtherRate" method="POST">
                                       @csrf
                {{--                       <input type="hidden" name="driver_id" value="{{ $driver->id }}">--}}
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="num">Item</label>
                                            <input type="text" class="form-control" id="num" wire:model="other_items.0.item" placeholder="Item" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="amount">Unit</label>
                                            <input type="number" class="form-control" id="amount" wire:model="other_items.0.units" placeholder="Unit" required>
                                        </div>

                                         <div class="form-group col-md-4">
                                            <label for="receivedDate">Price</label>
                                            <input type="number" class="form-control" id="receivedDate" wire:model="other_items.0.price" placeholder="Price" required>
                                        </div>


                                    </div>

                                    <button type="submit" class="btn btn-primary">Save Item</button>
                              </form>

                                </div><!-- .modal-body -->
                            </div>
                            <!-- .modal-content -->
                        </div>
                    </div>






                </div>
            </div>
        </div>
    </div>
</div><!-- .nk-block -->

<script>
    document.addEventListener('livewire:load', function () {
    Livewire.on('itemSaved', () => {
        $('#addItem').modal('hide');
    });
});

</script>

<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>

<script>
    document.getElementById('toggleButton').addEventListener('click', function() {
        var form = document.getElementById('myForm');
        if (form.style.display === 'none' || form.style.display === '') {
            form.style.display = 'block';
            this.textContent = 'Hide Form';
        } else {
            form.style.display = 'none';
            this.textContent = 'Show Form';
        }
    });
</script>

 <script>
        let itemIndex = 1;

        function addItem() {
            const container = document.getElementById('items-container');
            const itemRow = document.createElement('div');
            itemRow.classList.add('form-row', 'mb-3');
            itemRow.innerHTML = `
                <div class="form-group col-md-3">
                    <label for="item">Item</label>
                    <input type="text" name="items[${itemIndex}][item]" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="rate">Rate</label>
                    <input type="number" name="items[${itemIndex}][rate]" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="units">Units</label>
                    <input type="number" name="items[${itemIndex}][units]" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="price">Price</label>
                    <input type="number" name="items[${itemIndex}][price]" class="form-control" required>
                </div>
            `;
            container.appendChild(itemRow);
            itemIndex++;
        }
    </script>
