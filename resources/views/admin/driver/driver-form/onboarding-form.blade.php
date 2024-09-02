@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md- mx-auto">

                           <div class="nk-block">

                               <div class="nk-block-between g-3">
                                <div class="nk-block-head-content mb-5">
{{--                                    <h4 class="title nk-block-title">Create new {{ $role }}</h4>--}}
                                    <h4 class="title nk-block-title">Onboarding Form</h4>
                                </div>
                                <div class="nk-block-head-content">
                                     <a href="{{ route('admin.driverForm', ['driverId' => $driver->id, 'formId' => $form->id]) }}" wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                    <a href="{{ route('admin.driverForm', ['driverId' => $driver->id, 'formId' => $form->id]) }}" wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>

                                </div>
                                </div>
{{--                               {{ dd($formFieldsJson['Customer Detail']) }}--}}
                                <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">

                                          <form action="{{ route('admin.submitDriverForm', $form->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                                                <input type="hidden" name="form_id" value="{{ $form->id }}">

                                                <div class="container">
                                                    @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                @if(session()->has('success'))
                                                    <div class="alert alert-success">
                                                        {{ session()->get('success') }}
                                                    </div>
                                                @endif
                                                </div>

                                                <div class="container">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">New Customer Details</h4>
                                                    </div>

                                                    <div class="row">

                                                        <div class="form-group col-md-4">
                                                            <label for="first_name">First name</label>
                                                            <input type="text" class="form-control bg" id="first_name" name="personal_details[first_name]"
                                                                   value="{{ old('personal_details.first_name', $selectedForm->personal_details['first_name'] ?? $form->personal_details['first_name'] ?? '') }}" required>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="last_name">Last name</label>
                                                            <input type="text" class="form-control bg" id="last_name" name="personal_details[last_name]"
                                                                   value="{{ old('personal_details.last_name', $selectedForm->personal_details['last_name'] ?? $form->personal_details['last_name'] ?? '') }}" required>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control bg" id="email" name="personal_details[email]"
                                                                   value="{{ old('personal_details.email', $selectedForm->personal_details['email'] ?? $form->personal_details['email'] ?? '') }}" required>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="phone">Phone</label>
                                                            <input type="text" class="form-control bg" id="phone" name="personal_details[phone]"
                                                                   value="{{ old('personal_details.phone', $selectedForm->personal_details['phone'] ?? $form->personal_details['phone'] ?? '') }}" required>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="work_phone">Work phone</label>
                                                            <input type="text" class="form-control bg" id="work_phone" name="personal_details[work_phone]"
                                                                   value="{{ old('personal_details.work_phone', $selectedForm->personal_details['work_phone'] ?? $form->personal_details['work_phone'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="hire_type">Hire type</label>
                                                            <select class="form-control" id="hire_type" name="personal_details[hire_type]">
                                                                <option value="Social Domestic" {{ old('personal_details.hire_type', $selectedForm->personal_details['hire_type'] ?? '') == 'Social Domestic' ? 'selected' : '' }}>Social Domestic</option>
                                                                <option value="Rent to Buy" {{ old('personal_details.hire_type', $selectedForm->personal_details['hire_type'] ?? '') == 'Rent to Buy' ? 'selected' : '' }}>Rent to Buy</option>
                                                                <option value="Credit Hire" {{ old('personal_details.hire_type', $selectedForm->personal_details['hire_type'] ?? '') == 'Credit Hire' ? 'selected' : '' }}>Credit Hire</option>
                                                                <option value="Insurance" {{ old('personal_details.hire_type', $selectedForm->personal_details['hire_type'] ?? '') == 'Insurance' ? 'selected' : '' }}>Insurance</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="container mt-5">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Vehicle Details</h4>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                        <label class="form-label">Select Vehicle</label>
                                                               <div class="form-control-wrap">
                                                                <select class="form-select js-select2 select2-hidden-accessible" id="vehicle_select" data-search="on" aria-hidden="true">
                                                                    <option selected disabled>Select Vehicle</option>
                                                                    @foreach($vehicles as $index => $item)
                                                                        @php
                                                                            $vehicleDetails = is_array($item->vehicle_details) ? $item->vehicle_details : [];
                                                                        @endphp
                                                                        <option value="{{ $item->id }}" data-registration="{{ $vehicleDetails['registration_number'] ?? '' }}" data-select2-id="{{ $item->id }}">
                                                                            {{ $vehicleDetails['registration_number'] ?? '' }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                            <div class="form-group col-md-4">
                                                                <label for="registration_number">Registration number</label>
                                                                <input style="background-color: #e6e6e6" type="text" class="form-control" id="registration_number" name="vehicle[registration_number]"
                                                                       value="{{ old('vehicle.registration_number', $form->vehicle['registration_number'] ?? '') }}" readonly>
                                                            </div>


                                                        <div class="form-group col-md-4">
                                                                <label for="vehicle_make">Car Make</label>
                                                                <input style="background-color: #e6e6e6" type="text" class="form-control" id="vehicle_make" name="vehicle[car_make]"
                                                                       value="{{ old('vehicle.car_make', $form->vehicle['car_make'] ?? '') }}" readonly>
                                                            </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="car_model">Car model</label>
                                                            <input style="background-color: #e6e6e6" type="text" class="form-control" id="vehicle_model" name="vehicle[car_model]"
                                                                   value="{{ old('vehicle.car_model', $form->vehicle['car_model'] ?? '') }}" readonly>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="insurance_group">Insurance group</label>
                                                            <input type="text" class="form-control" id="insurance_group" name="vehicle[insurance_group]"
                                                                   value="{{ old('vehicle.insurance_group', $form->vehicle['insurance_group'] ?? '') }}">
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="date_out">Date out</label>
                                                            <input type="date" class="form-control" id="date_out" name="vehicle[date_out]"
                                                                   value="{{ old('vehicle.date_out', $form->vehicle['date_out'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="date_due">Date due</label>
                                                            <input type="date" class="form-control" id="date_due" name="vehicle[date_due]"
                                                                   value="{{ old('vehicle.date_due', $form->vehicle['date_due'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="time_out">Time out</label>
                                                            <input type="time" class="form-control" id="time_out" name="vehicle[time_out]"
                                                                   value="{{ old('vehicle.time_out', $form->vehicle['time_out'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="time_back">Time back</label>
                                                            <input type="time" class="form-control" id="time_back" name="vehicle[time_back]"
                                                                   value="{{ old('vehicle.time_back', $form->vehicle['time_back'] ?? '') }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="container mt-5">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Rate Details</h4>
                                                    </div>
                                                    <div>
                                                       <div class="row">
                                                            @php
                                                                // Check if rate is a string before decoding, else use the existing array or empty array
                                                                $rates = is_string($driverForm->rate) ? json_decode($driverForm->rate, true) : (is_array($driverForm->rate) ? $driverForm->rate : []);
                                                                $rates = $rates ?? [];
                                                            @endphp
                                                        @forelse($rates as $index => $rate)
                                                            <div class="row">
                                                                    <div class="form-group col-md-3">
                                                                    <label for="item_{{ $index }}">Item</label>
                                                                    <input style="background: #e6e6e6" readonly type="text" class="form-control" id="item_{{ $index }}" name="rate[{{ $index }}][item]"
                                                                           value="{{ old('rate.' . $index . '.item', $rate['item'] ?? '') }}">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="rate_{{ $index }}">Rate</label>
                                                                    <input style="background: #e6e6e6" readonly type="number" class="form-control" id="rate_{{ $index }}" name="rate[{{ $index }}][rate]"
                                                                           value="{{ old('rate.' . $index . '.rate', $rate['rate'] ?? '') }}">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="unit_{{ $index }}">Unit</label>
                                                                    <input style="background: #e6e6e6" readonly type="text" class="form-control" id="unit_{{ $index }}" name="rate[{{ $index }}][units]"
                                                                           value="{{ old('rate.' . $index . '.units', $rate['units'] ?? '') }}">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="price_{{ $index }}">Price</label>
                                                                    <input style="background: #e6e6e6" readonly type="number" class="form-control" id="price_{{ $index }}" name="rate[{{ $index }}][price]"
                                                                           value="{{ old('rate.' . $index . '.price', $rate['price'] ?? '') }}">
{{--                                                                    <a href="" class="btn btn-link"><em class="icon ni ni-delete"></em></a>--}}
                                                                </div>
                                                            </div>
                                                             <!-- Hidden inputs for driver_id and rate_index -->

{{--                                                            <input type="hidden" name="driver_id" value="{{ $driverForm->driver_id }}" class="driver_id">--}}
{{--                                                            <input type="hidden" name="rate_index" value="{{ $index }}" class="rate_index">--}}
{{--                                                    --}}
{{--                                                            <!-- Delete button -->--}}
{{--                                                            <button type="button" class="btn btn-danger delete-rate-btn" data-driver-id="{{ $driverForm->driver_id }}" data-rate-index="{{ $index }}">--}}
{{--                                                                <i class="fa fa-trash"></i>--}}
{{--                                                            </button>--}}
                                                           @empty
                                                             <div class="form-group col-md-3">
                                                                <label >Item</label>
                                                                <input style="background: #e6e6e6" readonly type="text" class="form-control" value="Not Set">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label >Rate</label>
                                                                <input style="background: #e6e6e6" readonly type="text" class="form-control" value="Not Set">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label >Unit</label>
                                                                <input style="background: #e6e6e6" readonly type="text" class="form-control" value="Not Set">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="price">Price</label>
                                                                <input style="background: #e6e6e6" readonly type="text" class="form-control" value="Not Set">
                                                            </div>


                                                        @endforelse
                                                    </div>

                                                    </div>
                                                    <div class="row">

                                                        <!-- Modal Trigger Code -->
                                                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#modalDefault">Add New</button>

                                                    <!-- Modal Content Code -->

                                                    </div>
                                                    <div class="row mt-3">
                                                         <div class="form-group col-md-4">
                                                            <label for="sub_total">Sub total</label>
                                                            <input style="background: #e6e6e6" type="number" class="form-control" id="sub_total" name="rate_total[sub_total]"
                                                                   value="{{ $priceSum }}" readonly >
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="total_paid">Total paid</label>
                                                            <input type="number" class="form-control" id="total_paid" name="rate_total[total_paid]"
                                                                   value="{{ old('rate_total.total_paid', $form->rate_total['total_paid'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="total_due">Total due</label>
                                                            <input type="number" class="form-control" id="total_due" name="rate_total[total_due]"
                                                                   value="{{ old('rate_total.total_due', $form->rate_total['total_due'] ?? '') }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="container mt-5">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Charges Details</h4>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="late_payment_per_day">Late payment per day</label>
                                                            <input type="number" class="form-control" id="late_payment_per_day" name="charges[late_payment_per_day]"
                                                                   value="{{ old('charges.late_payment_per_day', $form->charges['late_payment_per_day'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="admin_charge_for_pcn_ticket">Admin charge for pcn ticket</label>
                                                            <input type="number" class="form-control" id="admin_charge_for_pcn_ticket" name="charges[admin_charge_for_pcn_ticket]"
                                                                   value="{{ old('charges.admin_charge_for_pcn_ticket', $form->charges['admin_charge_for_pcn_ticket'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="admin_charge_for_speeding_ticket">Admin charge for speeding ticket</label>
                                                            <input type="number" class="form-control" id="admin_charge_for_speeding_ticket" name="charges[admin_charge_for_speeding_ticket]"
                                                                   value="{{ old('charges.admin_charge_for_speeding_ticket', $form->charges['admin_charge_for_speeding_ticket'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="admin_charge_for_bus_lane_tickets">Admin charge for bus lane tickets</label>
                                                            <input type="number" class="form-control" id="admin_charge_for_bus_lane_tickets" name="charges[admin_charge_for_bus_lane_tickets]"
                                                                   value="{{ old('charges.admin_charge_for_bus_lane_tickets', $form->charges['admin_charge_for_bus_lane_tickets'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="returning_vehicle_dirty_minor">Returning vehicle dirty minor</label>
                                                            <input type="number" class="form-control" id="returning_vehicle_dirty_minor" name="charges[returning_vehicle_dirty_minor]"
                                                                   value="{{ old('charges.returning_vehicle_dirty_minor', $form->charges['returning_vehicle_dirty_minor'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="returning_vehicle_dirty_major">Returning vehicle dirty major</label>
                                                            <input type="number" class="form-control" id="returning_vehicle_dirty_major" name="charges[returning_vehicle_dirty_major]"
                                                                   value="{{ old('charges.returning_vehicle_dirty_major', $form->charges['returning_vehicle_dirty_major'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="repossession_personal_visit_minimum">Repossession personal visit minimum</label>
                                                            <input type="number" class="form-control" id="repossession_personal_visit_minimum" name="charges[repossession_personal_visit_minimum]"
                                                                   value="{{ old('charges.repossession_personal_visit_minimum', $form->charges['repossession_personal_visit_minimum'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="milage_limit">Milage limit</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="charges[milage_limit]" id="milage_limit_Yes" value="Yes"
                                                                       {{ old('charges.milage_limit', $form->charges['milage_limit'] ?? '') == 'Yes' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="milage_limit_Yes">Yes</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="charges[milage_limit]" id="milage_limit_No" value="No"
                                                                       {{ old('charges.milage_limit', $form->charges['milage_limit'] ?? '') == 'No' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="milage_limit_No">No</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div id="milageLimitDetails" style="display: none;">
                                                         <div class="row">
                                                            <div class="form-group col-md-4">
                                                            <label for="milage_limit_type">Milage limit type</label>
                                                            <select class="form-control" id="milage_limit_type" name="charges[milage_limit_type]">
                                                                <option value="Per Day" {{ old('charges.milage_limit_type', $form->charges['milage_limit_type'] ?? '') == 'Per Day' ? 'selected' : '' }}>Per Day</option>
                                                                <option value="Per Week" {{ old('charges.milage_limit_type', $form->charges['milage_limit_type'] ?? '') == 'Per Week' ? 'selected' : '' }}>Per Week</option>
                                                                <option value="Per Month" {{ old('charges.milage_limit_type', $form->charges['milage_limit_type'] ?? '') == 'Per Month' ? 'selected' : '' }}>Per Month</option>
                                                            </select>
                                                        </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="milage_limit_value">Milage limit value</label>
                                                                <input type="number" class="form-control" id="milage_limit_value" name="charges[milage_limit_value]"
                                                                       value="{{ old('charges.milage_limit_value', $form->charges['milage_limit_value'] ?? '') }}">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                            <label for="excess_milage_fee">Excess milage fee</label>
                                                            <input type="text" class="form-control" id="excess_milage_fee" name="charges[excess_milage_fee]"
                                                                   value="{{ old('charges.excess_milage_fee', $form->charges['excess_milage_fee'] ?? '') }}">
                                                        </div>
                                                       </div>
                                                    </div>

                                                      <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="lost_damaged_key_charges">Lost damaged key charges</label>
                                                            <input type="number" class="form-control" id="lost_damaged_key_charges" name="charges[lost_damaged_key_charges]"
                                                                   value="{{ old('charges.lost_damaged_key_charges', $form->charges['lost_damaged_key_charges'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="vehicle_recovery_charges">Vehicle recovery charges</label>
                                                            <input type="number" class="form-control" id="vehicle_recovery_charges" name="charges[vehicle_recovery_charges]"
                                                                   value="{{ old('charges.vehicle_recovery_charges', $form->charges['vehicle_recovery_charges'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="accident_non_fault_excess_fee">Accident non fault excess fee</label>
                                                            <input type="number" class="form-control" id="accident_non_fault_excess_fee" name="charges[accident_non_fault_excess_fee]"
                                                                   value="{{ old('charges.accident_non_fault_excess_fee', $form->charges['accident_non_fault_excess_fee'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="accident_fault_based_excess_fee">Accident fault based excess fee</label>
                                                            <input type="number" class="form-control" id="accident_fault_based_excess_fee" name="charges[accident_fault_based_excess_fee]"
                                                                   value="{{ old('charges.accident_fault_based_excess_fee', $form->charges['accident_fault_based_excess_fee'] ?? '') }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="modalDefault">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
            <em class="icon ni ni-cross"></em>
        </a>
        <div class="modal-header">
            <h5 class="modal-title">Add Rate Item</h5>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.saveRate') }}" method="POST">
                @csrf
                <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                <input type="hidden" name="form_id" value="{{ $form->id }}">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="item">Item</label>
                        <input type="text" class="form-control" id="item" name="rate[item]">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="rate">Rate</label>
                        <input type="number" class="form-control" id="rate" name="rate[rate]">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="unit">Unit</label>
                        <input type="number" class="form-control" id="unit" name="rate[units]">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="rate[price]">
                    </div>

                </div>
                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>

        </div>

        </div>
        </div>
        </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    $(document).ready(function() {
        // Initialize Select2
        $('.js-select2').select2();

        // Fetch driverId and formId from Blade variables
        var driverId = '{{ $driver->id }}';
        var formId = '{{ $form->id }}';

        // On vehicle selection change
        $('#vehicle_select').on('change', function() {
            // Get the selected vehicle ID
            var vehicleId = $(this).val();

            // Construct the URL dynamically with Blade
            var url = '{{ route('admin.fetchDriverForm', ['driverId' => ':driverId', 'formId' => ':formId']) }}';
            url = url.replace(':driverId', driverId).replace(':formId', formId) + '?vehicleId=' + encodeURIComponent(vehicleId);

            // Log URL for debugging
            console.log(url);

            // Perform AJAX request to fetch vehicle details
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    // Set the input fields with the fetched vehicle details
                    $('#registration_number').val(response.registration_number);
                    $('#vehicle_make').val(response.make);
                    $('#vehicle_model').val(response.model);
                },
                error: function(xhr, status, error) {
                    // Handle error (e.g., clear input or show a message)
                    $('#registration_number').val('');
                    $('#vehicle_make').val('');
                    $('#vehicle_model').val('');
                    console.error('Failed to fetch vehicle details:', xhr.responseText);
                }
            });
        });
    });
</script>

   <script>
  // Function to calculate total due
  function calculateTotalDue() {
    // Get the values of sub_total and total_paid inputs
    const subTotal = parseFloat(document.getElementById('sub_total').value) || 0;
    const totalPaidInput = document.getElementById('total_paid');
    const totalPaid = parseFloat(totalPaidInput.value);

    // Check if total_paid has a valid input
    if (!isNaN(totalPaid)) {
      // Calculate the total due
      const totalDue = subTotal - totalPaid;

      // Set the calculated total due to the total_due input
      document.getElementById('total_due').value = totalDue.toFixed(2); // Ensure 2 decimal places
    } else {
      // Clear the total_due input if no valid total_paid value is entered
      document.getElementById('total_due').value = '';
    }
  }

  // Add event listener to recalculate total due when total_paid changes
  document.getElementById('total_paid').addEventListener('input', calculateTotalDue);
</script>


    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to show or hide the div based on the selected radio button
        function toggleMilageLimitDetails() {
            const milageLimitYes = document.getElementById('milage_limit_Yes');
            const milageLimitDetails = document.getElementById('milageLimitDetails');

            if (milageLimitYes.checked) {
                milageLimitDetails.style.display = 'block'; // Show div
            } else {
                milageLimitDetails.style.display = 'none'; // Hide div
            }
        }

        // Attach event listeners to radio buttons
        document.getElementById('milage_limit_Yes').addEventListener('click', toggleMilageLimitDetails);
        document.getElementById('milage_limit_No').addEventListener('click', toggleMilageLimitDetails);

        // Run the function on page load to set the correct initial state
        toggleMilageLimitDetails();
    });
</script>

@endsection
