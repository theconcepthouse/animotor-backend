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
                                    <h4 class="title nk-block-title">Payment Sheet</h4>
                                </div>
                                <div class="nk-block-head-content">
                                    <a href="{{ route('admin.driverForm', ['driverId' => $driver->id, 'formId' => $form->id]) }}"
                                       wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                            class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                    <a href="{{ route('admin.driverForm', ['driverId' => $driver->id, 'formId' => $form->id]) }}"
                                       wire:navigate
                                       class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                            class="icon ni ni-arrow-left"></em></a>

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


                                                <div class="container mt-4">
                                                     <div class="row d-none" >

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
                                                    </div>
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Hire Agreement</h4>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="hire_start_date">Hire start date</label>

                                                            <input type="date" class="form-control" id="hire_start_date"
                                                                   name="hire[hire_start_date]"
                                                                   value="{{ old('hire.hire_start_date', $selectedForm->hire['hire_start_date'] ?? $form->hire['hire_start_date'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="hire_end_date">Hire end date</label>

                                                            <input type="date" class="form-control" id="hire_end_date"
                                                                   name="hire[hire_end_date]"
                                                                   value="{{ old('hire.hire_end_date', $selectedForm->hire['hire_end_date'] ?? $form->hire['hire_end_date'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="hire_type">Hire type</label>
                                                            <select class="form-control" id="hire_type" name="personal_details[hire_type]">
                                                                <option value="Social Domestic" {{ old('personal_details.hire_type', $form->personal_details['hire_type'] ?? '') == 'Social Domestic' ? 'selected' : '' }}>Social Domestic</option>
                                                                <option value="Rent to Buy" {{ old('personal_details.hire_type', $form->personal_details['hire_type'] ?? '') == 'Rent to Buy' ? 'selected' : '' }}>Rent to Buy</option>
                                                                <option value="Credit Hire" {{ old('personal_details.hire_type', $form->personal_details['hire_type'] ?? '') == 'Credit Hire' ? 'selected' : '' }}>Credit Hire</option>
                                                                <option value="Insurance" {{ old('personal_details.hire_type', $form->personal_details['hire_type'] ?? '') == 'Insurance' ? 'selected' : '' }}>Insurance</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                   <div class="row">
                                                    <div class="form-group col-md-4">
                                                    <label for="payment_frequency">Payment frequency</label>
                                                    <select class="form-control" id="payment_frequency" name="payment[payment_frequency]">
                                                        <option value="Hourly" {{ old('payment.payment_frequency', $selectedForm->payment['payment_frequency'] ?? $form->payment['payment_frequency'] ?? '') == 'Hourly' ? 'selected' : '' }}>Hourly</option>
                                                        <option value="Daily" {{ old('payment.payment_frequency', $selectedForm->payment['payment_frequency'] ?? $form->payment['payment_frequency'] ?? '') == 'Daily' ? 'selected' : '' }}>Daily</option>
                                                        <option value="Weekly" {{ old('payment.payment_frequency', $selectedForm->payment['payment_frequency'] ?? $form->payment['payment_frequency'] ?? '') == 'Weekly' ? 'selected' : '' }}>Weekly</option>
                                                        <option value="Monthly" {{ old('payment.payment_frequency', $selectedForm->payment['payment_frequency'] ?? $form->payment['payment_frequency'] ?? '') == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                                                    </select>
                                                </div>

                                                   <div class="form-group col-md-4">
                                                        <label for="duration">Duration</label>
                                                        <select class="form-control" id="duration" name="payment[duration]">
                                                            <option value="5 hours" {{ old('payment.duration', $selectedForm->payment['duration'] ?? $form->payment['duration'] ?? '') == '5 hours' ? 'selected' : '' }}>5 hours</option>
                                                            <option value="5 days" {{ old('payment.duration', $selectedForm->payment['duration'] ?? $form->payment['duration'] ?? '') == '5 days' ? 'selected' : '' }}>5 days</option>
                                                            <option value="7 weeks" {{ old('payment.duration', $selectedForm->payment['duration'] ?? $form->payment['duration'] ?? '') == '7 weeks' ? 'selected' : '' }}>7 weeks</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="deposit">Deposit</label>
                                                        <input type="number" class="form-control" id="deposit" name="payment[deposit]"
                                                               value="{{ old('payment.deposit', $selectedForm->payment['deposit'] ?? $form->payment['deposit'] ?? '') }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="total">Total</label>
                                                        <input type="number" class="form-control" id="total" name="payment[total]"
                                                               value="{{ old('payment.total', $selectedForm->payment['total'] ?? $form->payment['total'] ?? '') }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="you_paid">You paid</label>
                                                        <input type="number" class="form-control" id="you_paid" name="payment[you_paid]"
                                                               value="{{ old('payment.you_paid', $selectedForm->payment['you_paid'] ?? $form->payment['you_paid'] ?? '') }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="outstanding_balance">Outstanding balance</label>
                                                        <input type="number" class="form-control" id="outstanding_balance" name="payment[outstanding_balance]"
                                                               value="{{ old('payment.outstanding_balance', $selectedForm->payment['outstanding_balance'] ?? $form->payment['outstanding_balance'] ?? '') }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="hire_total">Hire total</label>
                                                        <input type="number" class="form-control" id="hire_total" name="payment[hire_total]"
                                                               value="{{ old('payment.hire_total', $selectedForm->payment['hire_total'] ?? $form->payment['hire_total'] ?? '') }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="vehicle_condition">Vehicle condition</label>
                                                        <input type="text" class="form-control" id="vehicle_condition" name="payment[vehicle_condition]"
                                                               value="{{ old('payment.vehicle_condition', $selectedForm->payment['vehicle_condition'] ?? $form->payment['vehicle_condition'] ?? '') }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                    <label for="road_tax">Road tax</label>
                                                    <select class="form-control" id="road_tax" name="payment[road_tax]">
                                                        <option value="Daily" {{ old('payment.road_tax', $selectedForm->payment['road_tax'] ?? $form->payment['road_tax'] ?? '') == 'Daily' ? 'selected' : '' }}>Daily</option>
                                                        <option value="Weekly" {{ old('payment.road_tax', $selectedForm->payment['road_tax'] ?? $form->payment['road_tax'] ?? '') == 'Weekly' ? 'selected' : '' }}>Weekly</option>
                                                        <option value="Monthly" {{ old('payment.road_tax', $selectedForm->payment['road_tax'] ?? $form->payment['road_tax'] ?? '') == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                                                        <option value="Yearly" {{ old('payment.road_tax', $selectedForm->payment['road_tax'] ?? $form->payment['road_tax'] ?? '') == 'Yearly' ? 'selected' : '' }}>Yearly</option>
                                                    </select>
                                                </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="road_tax_amount">Road tax amount</label>
                                                        <input type="number" class="form-control" id="road_tax_amount" name="payment[road_tax_amount]"
                                                               value="{{ old('payment.road_tax_amount', $selectedForm->payment['road_tax_amount'] ?? $form->payment['road_tax_amount'] ?? '') }}">
                                                    </div>
                                                </div>

                                                </div>
                                                <div class="container mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Additional Fee Detail</h4>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="late_payment_per_day">Late Payment</label>
                                                            <select name="additional_fee[late_payment_per_day]" id="late_payment_per_day" class="form-control">
                                                                <option value="Per day" {{ old('additional_fee.late_payment_per_day', $selectedForm->additional_fee['late_payment_per_day'] ?? $form->additional_fee['late_payment_per_day'] ?? '') == 'Per day' ? 'selected' : '' }}>Per day</option>
                                                                <option value="Per week" {{ old('additional_fee.late_payment_per_day', $selectedForm->additional_fee['late_payment_per_day'] ?? $form->additional_fee['late_payment_per_day'] ?? '') == 'Per week' ? 'selected' : '' }}>Per week</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="late_payment_amount">Late Payment Amount</label>
                                                            <input type="text" class="form-control" id="late_payment_amount" name="additional_fee[late_payment_amount]"
                                                                   value="{{ old('additional_fee.late_payment_amount', $selectedForm->additional_fee['late_payment_amount'] ?? $form->additional_fee['late_payment_amount'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="excess_mile_amount">Excess Mile Amount</label>
                                                            <input type="number" class="form-control" id="excess_mile_amount" name="additional_fee[excess_mile_amount]"
                                                                   value="{{ old('additional_fee.excess_mile_amount', $selectedForm->additional_fee['excess_mile_amount'] ?? $form->additional_fee['excess_mile_amount'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="admin_charge_for_pcn_ticket">Admin PCN Charge</label>
                                                            <input type="text" class="form-control" id="admin_charge_for_pcn_ticket" name="additional_fee[admin_charge_for_pcn_ticket]"
                                                                   value="{{ old('additional_fee.admin_charge_for_pcn_ticket', $selectedForm->additional_fee['admin_charge_for_pcn_ticket'] ?? $form->additional_fee['admin_charge_for_pcn_ticket'] ?? '') }}">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="container mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Payment Detail</h4>
                                                    </div>

                                                   <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="due_date">Due Date</label>
                                                        <input type="date" class="form-control" id="due_date" name="payment[due_date]"
                                                               value="{{ old('payment.due_date', $selectedForm->payment['due_date'] ?? '') }}" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="amount">Amount</label>
                                                        <input type="number" class="form-control" id="amount" name="payment[amount]"
                                                               value="{{ old('payment.amount', $selectedForm->payment['amount'] ?? '') }}" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="received_date">Received Date</label>
                                                        <input type="date" class="form-control" id="received_date" name="payment[received_date]"
                                                               value="{{ old('payment.received_date', $selectedForm->payment['received_date'] ?? '') }}" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="received_amount">Received Amount</label>
                                                        <input type="number" class="form-control" id="received_amount" name="payment[received_amount]"
                                                               value="{{ old('payment.received_amount', $selectedForm->payment['received_amount'] ?? '') }}" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="late_payment_days">Late Payment Days</label>
                                                        <input type="number" class="form-control" id="late_payment_days" name="payment[late_payment_days]"
                                                               value="{{ old('payment.late_payment_days', $selectedForm->payment['late_payment_days'] ?? '') }}">
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
