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
                                                            <label for="registration_number">Registration number</label>
                                                            <input type="text" class="form-control" id="registration_number" name="vehicle[registration_number]"
                                                                   value="{{ old('vehicle.registration_number', $form->vehicle['registration_number'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="insurance_group">Insurance group</label>
                                                            <input type="text" class="form-control" id="insurance_group" name="vehicle[insurance_group]"
                                                                   value="{{ old('vehicle.insurance_group', $form->vehicle['insurance_group'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="car_model">Car model</label>
                                                            <input type="text" class="form-control" id="car_model" name="vehicle[car_model]"
                                                                   value="{{ old('vehicle.car_model', $form->vehicle['car_model'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="car_make">Car make</label>
                                                            <input type="text" class="form-control" id="car_make" name="vehicle[car_make]"
                                                                   value="{{ old('vehicle.car_make', $form->vehicle['car_make'] ?? '') }}">
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
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="item">Item</label>
                                                            <input type="text" class="form-control" id="item" name="rate[item]"
                                                                   value="{{ old('rate.item', $form->rate['item'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="rate">Rate</label>
                                                            <input type="number" class="form-control" id="rate" name="rate[rate]"
                                                                   value="{{ old('rate.rate', $form->rate['rate'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="unit">Unit</label>
                                                            <input type="text" class="form-control" id="unit" name="rate[unit]"
                                                                   value="{{ old('rate.unit', $form->rate['unit'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="price">Price</label>
                                                            <input type="number" class="form-control" id="price" name="rate[price]"
                                                                   value="{{ old('rate.price', $form->rate['price'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="sub_total">Sub total</label>
                                                            <input type="number" class="form-control" id="sub_total" name="rate[sub_total]"
                                                                   value="{{ old('rate.sub_total', $form->rate['sub_total'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="total_paid">Total paid</label>
                                                            <input type="number" class="form-control" id="total_paid" name="rate[total_paid]"
                                                                   value="{{ old('rate.total_paid', $form->rate['total_paid'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="total_due">Total due</label>
                                                            <input type="number" class="form-control" id="total_due" name="rate[total_due]"
                                                                   value="{{ old('rate.total_due', $form->rate['total_due'] ?? '') }}">
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
                                                            <input type="number" class="form-control" id="excess_milage_fee" name="charges[excess_milage_fee]"
                                                                   value="{{ old('charges.excess_milage_fee', $form->charges['excess_milage_fee'] ?? '') }}">
                                                        </div>
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

@endsection