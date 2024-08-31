@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container">
            <div class="nk-content-inner">
                  <div class="nk-block-head-content">
                        <a href="{{ route('admin.drivers') }}" wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                        <a href="{{ route('admin.drivers') }}" wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>

                    </div>
                <div class="nk-content-body">
                     <div class="container mb-3 mt-4">
                         <h4>Driver Name: {{ $driver->name }}</h4>
                     </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session()->has('message'))
                        <div class="alert alert-danger">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="components-preview wide-md- mx-auto">

                           <div class="nk-block">


                                 <div class="card card-bordered card-preview">
                                    <div class="card-inner">
                                        <ul class="nav nav-tabs mt-n3" >
                                             <li class="nav-item "  >
                                                <a class="nav-link active btn btn-primary" href="{{ route('admin.driverForm', $driver->id) }}" wire:navigate>Forms</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('admin.driverDocuments', $driver->id) }}" wire:navigate>Documents</a>
                                            </li>
                                            <li class="nav-item" >
                                                <a class="nav-link" href="{{ route('admin.paymentHistory', $driver->id) }}" wire:navigate >Payment History</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" href="{{ route('admin.driverPcn', $driver->id) }}" wire:navigate >PCNS</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" href="{{ route('admin.notes', $driver->id) }}" wire:navigate >Notes</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" href="{{ route('admin.driverFormHistory', $driver->id) }}" >History</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>


                                <div class="card card-bordered">
                                    <div class="card-inner-group">
                                        <div class="card-inner p-0">

                                            <div class="nk-tb-list">
                                                <div class="nk-tb-item nk-tb-head">

                                                    <div class="nk-tb-col tb-col-sm"><span>Name</span></div>
                                                    <div class="nk-tb-col"><span>State</span></div>
                                                    <div class="nk-tb-col"><span>Sending Method</span></div>
                                                    <div class="nk-tb-col"><span>Status</span></div>
                                                    <div class="nk-tb-col"><span>Action</span></div>
                                                </div>
                                                <!-- .nk-tb-item -->
                                                @foreach($forms as $item)
                                                     <div class="nk-tb-item">
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <span class="tb-product">
                                                                <span class="title">{{ $item->name }}</span>
                                                            </span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub text-capitalize">{{ $item->state }}</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead">{{ $item->sending_method ? : "Not Set" }}</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#modalDefault-{{ $item?->id }}">{!! $item?->status() !!}</button>
{{--                                                            <span class="tb-sub">{!! $item->isComplete() !!}</span>--}}
                                                        </div>

                                                         <div class="nk-tb-col">
                                                            <div class="nk-tb-col nk-tb-col-tools">
                                                                 <input type="hidden" name="form_id" value="{{ $item->id }}">
                                                                <ul style="justify-content: center" class="nk-tb-actions gx-2">
                                                                    <li class="nk-tb-action">
                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalLarge" class="bg-white btn btn-sm btn-outline-light btn-icon" data-bs-placement="top" aria-label="Approve" data-bs-original-title="Duplicate Form"><em class="icon ni ni-repeat"></em></a>

{{--                                                                        <a href="{{ route('admin.duplicateForm', ['formId' => $item->id, 'driverId' => $driver->id]) }}" class="bg-white btn btn-sm btn-outline-light btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Approve" data-bs-original-title="Duplicate Form"><em class="icon ni ni-repeat"></em></a>--}}
                                                                    </li>
                                                                    <li class="nk-tb-action">
                                                                        <a href="{{ route('admin.addDocument', $driver->id) }}" class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" aria-label="Document" data-bs-original-title="Details"><em class="icon ni ni-upload-cloud"></em></a>
                                                                    </li>
                                                                    <li class="nk-tb-action">
                                                                        <a href="{{ route('admin.fetchDriverForm', ['driverId' => $driver->id, 'formId' => $item->id]) }}"  class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" aria-label="Details" data-bs-original-title="Details"><em class="icon ni ni-eye"></em></a>
                                                                    </li>
                                                                    <li class="nk-tb-action">
                                                                        <a href="{{ route('admin.generatePDF', ['formId' => $item->id, 'driverId' => $driver->id]) }}" target="_blank" class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" aria-label="Details" data-bs-original-title="Document"><em class="icon ni ni-file"></em></a>
                                                                    </li>
                                                                    <li class="nk-tb-action">
                                                                        <a href="{{ route('admin.notes', $driver->id) }}" class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" aria-label="Details" data-bs-original-title="Notes"><em class="icon ni ni-edit"></em></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="modal fade" tabindex="-1" id="modalDefault-{{ $item?->id }}"  aria-modal="true" role="dialog">
                                                         <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title">Modal Title</h5>
                                                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{ route('admin.updateStatus') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="form_id" value="{{ $item?->id }}">
                                                            <div class="row">
                                                                <div class="col-lg-10">
                                                                    <select name="status" class="form-control" id="">
                                                                        <option selected disabled>Select Status</option>
                                                                        <option value="pending">Pending</option>
                                                                        <option value="in-progress">In-Progress</option>
                                                                        <option value="completed">Completed</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-8 mt-3">
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        </div>
                                                        </div>
                                                        </div>
                                                    </div>


                                                @endforeach


                                            </div>
                                            <!-- .nk-tb-list -->
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="nk-block">

                                <h4 class="mb-3">Actions/Events</h4>
                                    <div class="card card-bordered">
                                        <div class="card-inner-group">
                                            <div class="card-inner p-0">
                                                <div class="nk-tb-list">
                                                    <div class="nk-tb-item nk-tb-head">

                                                        <div class="nk-tb-col tb-col-sm"><span>Name</span></div>
                                                        <div class="nk-tb-col"><span>State</span></div>
                                                        <div class="nk-tb-col"><span>Sending Method</span></div>
                                                        <div class="nk-tb-col"><span>Status</span></div>
                                                        <div class="nk-tb-col"><span>Action</span></div>
                                                    </div>
                                                    <!-- .nk-tb-item -->
                                                    @foreach($actionForms as $item)
                                                     <div class="nk-tb-item">
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <span class="tb-product">
                                                                <span class="title">{{ $item->name }}</span>
                                                            </span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub text-capitalize">{{ $item->state }}</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead">{{ $item->sending_method ? : "Not Set" }}</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#modalDefault-{{ $item?->id }}">{!! $item?->status() !!}</button>
{{--                                                            <span class="tb-sub">{!! $item->isComplete() !!}</span>--}}
                                                        </div>

                                                         <div class="nk-tb-col">
                                                            <div class="nk-tb-col nk-tb-col-tools">
                                                                 <input type="hidden" name="form_id" value="{{ $item->id }}">
                                                                <ul style="justify-content: center" class="nk-tb-actions gx-2">
                                                                    <li class="nk-tb-action">
{{--                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalLarge-{{ $item?->id }}" class="bg-white btn btn-sm btn-outline-light btn-icon" data-bs-placement="top" aria-label="Approve" data-bs-original-title="Duplicate Form"><em class="icon ni ni-repeat"></em></a>--}}
                                                                        <a href="{{ route('admin.duplicateForm', ['formId' => $item->id, 'driverId' => $driver->id]) }}"  class="bg-white btn btn-sm btn-outline-light btn-icon" data-bs-placement="top" aria-label="Approve" data-bs-original-title="Duplicate Form"><em class="icon ni ni-repeat"></em></a>
                                                                    </li>
                                                                    <li class="nk-tb-action">
                                                                        <a href="{{ route('admin.addDocument', $driver->id) }}" class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" aria-label="Document" data-bs-original-title="Details"><em class="icon ni ni-upload-cloud"></em></a>
                                                                    </li>
                                                                    <li class="nk-tb-action">
                                                                        <a href="{{ route('admin.fetchDriverForm', ['driverId' => $driver->id, 'formId' => $item->id]) }}"  class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" aria-label="Details" data-bs-original-title="Details"><em class="icon ni ni-eye"></em></a>
                                                                    </li>
                                                                    <li class="nk-tb-action">
                                                                        <a href="{{ route('admin.generatePDF', ['formId' => $item->id, 'driverId' => $driver->id]) }}" target="_blank" class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" aria-label="Details" data-bs-original-title="Document"><em class="icon ni ni-file"></em></a>
                                                                    </li>
                                                                    <li class="nk-tb-action">
                                                                        <a href="{{ route('admin.notes', $driver->id) }}" class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" aria-label="Details" data-bs-original-title="Notes"><em class="icon ni ni-edit"></em></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>

                                                        <div class="modal fade" tabindex="-1" id="modalDefault-{{ $item?->id }}"  aria-modal="true" role="dialog">
                                                             <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title">Modal Title</h5>
                                                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <em class="icon ni ni-cross"></em>
                                                            </a>
                                                            </div>
                                                            <div class="modal-body">
                                                            <form action="{{ route('admin.updateStatus') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="form_id" value="{{ $item?->id }}">
                                                                <div class="row">
                                                                    <div class="col-lg-10">
                                                                        <select name="status" class="form-control" id="">
                                                                            <option selected disabled>Select Status</option>
                                                                            <option value="pending">Pending</option>
                                                                            <option value="in-progress">In-Progress</option>
                                                                            <option value="completed">Completed</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-8 mt-3">
                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            </div>
                                                            </div>
                                                            </div>
                                                        </div>


                                                    @endforeach



                                                </div>
                                                <!-- .nk-tb-list -->
                                            </div>

                                        </div>
                                    </div>
                            </div>

                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" id="modalLarge">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Driver Form Details</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">

                <form action="{{ route('admin.copyDriverForm') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                    <input type="hidden" name="form_id" value="{{ $formData }}">

                        <div class="row gy-4">
                            <div class="col-md-3 col-sm-6">
                                <div class="preview-block">
                                    <span class="preview-title overline-title">Hire Date</span>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="duplicateForm" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="customRadio1">Change Hire Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="preview-block">
                                    <span class="preview-title overline-title">Date Extension</span>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="duplicateForm" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio2">Day Out/Day Return Extension</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="preview-block">
                                    <span class="preview-title overline-title">Personal Info</span>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio3" name="duplicateForm" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio3">Change of Personal Details</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="preview-block">
                                    <span class="preview-title overline-title">Address Info</span>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio10" name="duplicateForm" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio10">Change of Address Details</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Repeat for other radio buttons... -->
                            <div class="col-md-3 col-sm-6">
                                <div class="preview-block">
                                    <span class="preview-title overline-title">Payment Date </span>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio4" name="duplicateForm" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio4">Change Payment Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="preview-block">
                                    <span class="preview-title overline-title">Payment Amount </span>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio5" name="duplicateForm" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio5">Change Payment Amount</label>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-3 col-sm-6">
                            <div class="preview-block">
                                <span class="preview-title overline-title">Vehicle Details </span>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio6" name="duplicateForm" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio6">Change of Vehicle</label>
                                </div>
                            </div>
                        </div>
                       <div class="col-md-3 col-sm-6">
                            <div class="preview-block">
                                <span class="preview-title overline-title">Insurance Cover </span>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio7" name="duplicateForm" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio7">Change of Insurance Cover</label>
                                </div>
                            </div>
                        </div>

                        </div>
                        <hr>

                        <div class="form-section" id="hireDateForm">
                             <div class="row mt-4">
                                <div class="form-group col-md-6">
                                    <label for="hire_start_date">Original Hire start Date</label>
                                    <input type="date" class="form-control" id="hire_start_date" readonly
                                           value="{{ $formData->hire['hire_start_date'] ??  '' }}">
                                    <input type="hidden" name="old_hire[hire_start_date]" value="{{ $formData->hire['hire_start_date'] ??  '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="hire_end_date">New Hire Start Date</label>
                                    <input type="date" class="form-control" id="hire_end_date"
                                           name="hire[hire_start_date]" value="{{ old('hire.hire_start_date', $formData->hire['hire_start_date'] ??  '') }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="hire_end_date">Original Hire End Date</label>
                                    <input type="date" class="form-control" id="hire_end_date" readonly
                                           value="{{ old('hire.hire_end_date', $formData->hire['hire_end_date'] ??  '') }}">
                                    <input type="hidden" name="old_hire[hire_end_date]" value="{{ $formData->hire['hire_end_date'] ??  '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="hire_end_date">New Hire End Date</label>
                                    <input type="date" class="form-control" id="hire_end_date"
                                           name="hire[hire_end_date]" value="{{ old('hire.hire_end_date', $formData->hire['hire_end_date'] ??  '') }}">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="hire_end_date">Reason For Change</label>
                                    <textarea name="reason[hire_reason_for_change]" class="form-control" id="" cols="5" rows="5">{{ old('reason.hire_reason_for_change', $formData->reason['hire_reason_for_change'] ??  '' )}}</textarea>
                                </div>

{{--                                <div class="form-group col-md-6">--}}
{{--                                    <label for="hire_end_date">Date/Time Of Change</label>--}}
{{--                                    <input type="datetime-local" class="form-control" id="hire_end_date"--}}
{{--                                           name="reason[hire_date_of_change]" value="{{ old('reason.hire_date_of_change', $formData->reason['hire_date_of_change'] ??  '' )}}">--}}
{{--                                </div>--}}
                            </div>
                        </div>

                        <div class="form-section" id="dateExtensionForm" style="display: none;">
                             <div class="row mt-4">
                                 <div class="form-group col-md-6">
                                    <label for="date_out">Original Date out</label>
                                    <input type="date" class="form-control" id="date_out" readonly
                                           value="{{ $formData->vehicle['date_out'] ?? '' }}">
                                     <input type="hidden" name="old_vehicle_out[date_out]" value="{{ $formData->hire['hire_start_date'] ??  '' }}">
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="date_out">New Date out</label>
                                    <input type="date" class="form-control" id="date_out" name="vehicle[date_out]" value="{{ old('vehicle.date_out', $formData->vehicle['date_out'] ?? '') }}">
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="date_out">Original Return Date </label>
                                    <input type="date" class="form-control" id="date_out" readonly
                                           value="{{ $formData->vehicle['date_due'] ?? '' }}">
                                      <input type="hidden" name="old_vehicle_out[date_due]" value="{{ $formData->hire['hire_start_date'] ??  '' }}">
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="date_out">New Return Date </label>
                                    <input type="date" class="form-control" id="date_out" name="vehicle[date_due]" value="{{ old('vehicle.date_due', $formData->vehicle['date_due'] ?? '') }}">
                                </div>

                                 <div class="form-group col-md-12">
                                    <label for="hire_end_date">Reason For Change</label>
                                     <textarea name="reason[vehicle_reason_for_change]" class="form-control" id="" cols="5" rows="5">{{ old('reason.vehicle_reason_for_change', $formData->reason['vehicle_reason_for_change'] ??  '' )}}</textarea>
                                </div>

                        </div>
                        </div>

                       <div class="form-section" id="personalInfoForm" style="display: none;">
                            <div class="row mt-4">
                                <!-- Original Phone Number -->
                                <div class="form-group col-md-6">
                                    <label for="Phone">Original Phone Number</label>
                                    <input type="text" class="form-control" id="Phone" readonly value="{{ $formData->personal_details['phone'] ?? '' }}">
                                    <!-- Hidden input to capture old phone number -->
                                    <input type="hidden" name="old_personal_details[phone]" value="{{ $formData->personal_details['phone'] ?? '' }}">
                                </div>
                                <!-- New Phone Number -->
                                <div class="form-group col-md-6">
                                    <label for="date_out">New Phone Number</label>
                                    <input type="text" class="form-control" id="date_out" name="personal_details[phone]" value="{{ old('personal_details.phone', $formData->personal_details['phone'] ?? '') }}">
                                </div>
                                <!-- Original Email Address -->
                                <div class="form-group col-md-6">
                                    <label for="date_out">Original Email Address</label>
                                    <input type="email" class="form-control" id="date_out" readonly value="{{ $formData->personal_details['email'] ?? '' }}">
                                    <!-- Hidden input to capture old email address -->
                                    <input type="hidden" name="old_personal_details[email]" value="{{ $formData->personal_details['email'] ?? '' }}">
                                </div>
                                <!-- New Email Address -->
                                <div class="form-group col-md-6">
                                    <label for="date_out">New Email Address</label>
                                    <input type="email" class="form-control" id="date_out" name="personal_details[email]" value="{{ old('personal_details.email', $formData->personal_details['email'] ?? '') }}">
                                </div>
                                <!-- Reason For Change -->
                                <div class="form-group col-md-12">
                                    <label for="hire_end_date">Reason For Change</label>
                                    <textarea name="reason[contact_details]" class="form-control" cols="5" rows="5">{{ old('reason.contact_details', $formData->reason['reason.contact_details'] ?? '') }}</textarea>
                                </div>
                                <!-- Date/Time Of Change -->

                            </div>
                        </div>
                        <div class="form-section" id="changeAddress" style="display: none;">
                            <div class="row mt-4">
                                <div class="form-group col-md-6" id="form-group-address_line">
                                    <label for="address_line">Original Address line</label>
                                    <input type="text" class="form-control" id="address_line" readonly
                                           value="{{ old('address.address_line', $formData->address['address_line'] ?? '') }}">

                                    <input type="hidden" name="old_address[address_line]" value="{{ $formData->address['address_line'] ?? '' }}">
                                </div>
                                 <div class="form-group col-md-6" id="form-group-address_line">
                                    <label for="address_line">New Address line</label>
                                    <input type="text" class="form-control" id="address_line"
                                           name="address[address_line]"
                                           value="{{ old('address.address_line', $formData->address['address_line'] ?? '') }}">
                                </div>

                                <div class="form-group col-md-6" id="form-group-address_line_2">
                                    <label for="address_line_2">Original Address line 2</label>
                                    <input type="text" class="form-control" id="address_line_2" readonly
                                           value="{{ $formData->address['address_line_2'] ?? '' }}">

                                    <input type="hidden" name="old_address[address_line_2]" value="{{ $formData->address['address_line_2'] ?? '' }}">
                                </div>
                                <div class="form-group col-md-6" id="form-group-address_line_2">
                                    <label for="address_line_2">New Address line 2</label>
                                    <input type="text" class="form-control" id="address_line_2"
                                           name="address[address_line_2]"
                                           value="{{ old('address.address_line_2', $formData->address['address_line_2'] ?? '') }}">

                                </div>
                                <div class="form-group col-md-6" id="form-group-country">
                                    <label for="country">Original Country</label>
                                    <select class="form-control" readonly id="country">
                                        @php
                                            $selectedCountry = old('address.country', $selectedForm->address['country'] ?? '');
                                        @endphp

                                        <option value="Afghanistan" {{ $selectedCountry == 'Afghanistan' ? 'selected' : '' }}>Afghanistan</option>
                                        <option value="Albania" {{ $selectedCountry == 'Albania' ? 'selected' : '' }}>Albania</option>
                                        <option value="Algeria" {{ $selectedCountry == 'Algeria' ? 'selected' : '' }}>Algeria</option>
                                        <option value="Andorra" {{ $selectedCountry == 'Andorra' ? 'selected' : '' }}>Andorra</option>
                                        <option value="Angola" {{ $selectedCountry == 'Angola' ? 'selected' : '' }}>Angola</option>
                                        <option value="Antigua and Barbuda" {{ $selectedCountry == 'Antigua and Barbuda' ? 'selected' : '' }}>Antigua and Barbuda</option>
                                        <option value="Argentina" {{ $selectedCountry == 'Argentina' ? 'selected' : '' }}>Argentina</option>
                                        <option value="Armenia" {{ $selectedCountry == 'Armenia' ? 'selected' : '' }}>Armenia</option>
                                        <option value="Australia" {{ $selectedCountry == 'Australia' ? 'selected' : '' }}>Australia</option>
                                        <option value="Austria" {{ $selectedCountry == 'Austria' ? 'selected' : '' }}>Austria</option>
                                        <option value="Azerbaijan" {{ $selectedCountry == 'Azerbaijan' ? 'selected' : '' }}>Azerbaijan</option>
                                        <option value="Bahamas" {{ $selectedCountry == 'Bahamas' ? 'selected' : '' }}>Bahamas</option>
                                        <option value="Bahrain" {{ $selectedCountry == 'Bahrain' ? 'selected' : '' }}>Bahrain</option>
                                        <option value="Bangladesh" {{ $selectedCountry == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                        <option value="Barbados" {{ $selectedCountry == 'Barbados' ? 'selected' : '' }}>Barbados</option>
                                        <option value="Belarus" {{ $selectedCountry == 'Belarus' ? 'selected' : '' }}>Belarus</option>
                                        <option value="Belgium" {{ $selectedCountry == 'Belgium' ? 'selected' : '' }}>Belgium</option>
                                        <option value="Belize" {{ $selectedCountry == 'Belize' ? 'selected' : '' }}>Belize</option>
                                        <option value="Benin" {{ $selectedCountry == 'Benin' ? 'selected' : '' }}>Benin</option>
                                        <option value="Bhutan" {{ $selectedCountry == 'Bhutan' ? 'selected' : '' }}>Bhutan</option>
                                        <option value="Bolivia" {{ $selectedCountry == 'Bolivia' ? 'selected' : '' }}>Bolivia</option>
                                        <option value="Bosnia and Herzegovina" {{ $selectedCountry == 'Bosnia and Herzegovina' ? 'selected' : '' }}>Bosnia and Herzegovina</option>
                                        <option value="Botswana" {{ $selectedCountry == 'Botswana' ? 'selected' : '' }}>Botswana</option>
                                        <option value="Brazil" {{ $selectedCountry == 'Brazil' ? 'selected' : '' }}>Brazil</option>
                                        <option value="Brunei" {{ $selectedCountry == 'Brunei' ? 'selected' : '' }}>Brunei</option>
                                        <option value="Bulgaria" {{ $selectedCountry == 'Bulgaria' ? 'selected' : '' }}>Bulgaria</option>
                                        <option value="Burkina Faso" {{ $selectedCountry == 'Burkina Faso' ? 'selected' : '' }}>Burkina Faso</option>
                                        <option value="Burundi" {{ $selectedCountry == 'Burundi' ? 'selected' : '' }}>Burundi</option>
                                        <option value="Cabo Verde" {{ $selectedCountry == 'Cabo Verde' ? 'selected' : '' }}>Cabo Verde</option>
                                        <option value="Cambodia" {{ $selectedCountry == 'Cambodia' ? 'selected' : '' }}>Cambodia</option>
                                        <option value="Cameroon" {{ $selectedCountry == 'Cameroon' ? 'selected' : '' }}>Cameroon</option>
                                        <option value="Canada" {{ $selectedCountry == 'Canada' ? 'selected' : '' }}>Canada</option>
                                        <option value="Central African Republic" {{ $selectedCountry == 'Central African Republic' ? 'selected' : '' }}>Central African Republic</option>
                                        <option value="Chad" {{ $selectedCountry == 'Chad' ? 'selected' : '' }}>Chad</option>
                                        <option value="Chile" {{ $selectedCountry == 'Chile' ? 'selected' : '' }}>Chile</option>
                                        <option value="China" {{ $selectedCountry == 'China' ? 'selected' : '' }}>China</option>
                                        <option value="Colombia" {{ $selectedCountry == 'Colombia' ? 'selected' : '' }}>Colombia</option>
                                        <option value="Comoros" {{ $selectedCountry == 'Comoros' ? 'selected' : '' }}>Comoros</option>
                                        <option value="Congo, Democratic Republic of the" {{ $selectedCountry == 'Congo, Democratic Republic of the' ? 'selected' : '' }}>Congo, Democratic Republic of the</option>
                                        <option value="Congo, Republic of the" {{ $selectedCountry == 'Congo, Republic of the' ? 'selected' : '' }}>Congo, Republic of the</option>
                                        <option value="Costa Rica" {{ $selectedCountry == 'Costa Rica' ? 'selected' : '' }}>Costa Rica</option>
                                        <option value="Cote d'Ivoire" {{ $selectedCountry == "Cote d'Ivoire" ? 'selected' : '' }}>Cote d'Ivoire</option>
                                        <option value="Croatia" {{ $selectedCountry == 'Croatia' ? 'selected' : '' }}>Croatia</option>
                                        <option value="Cuba" {{ $selectedCountry == 'Cuba' ? 'selected' : '' }}>Cuba</option>
                                        <option value="Cyprus" {{ $selectedCountry == 'Cyprus' ? 'selected' : '' }}>Cyprus</option>
                                        <option value="Czech Republic" {{ $selectedCountry == 'Czech Republic' ? 'selected' : '' }}>Czech Republic</option>
                                        <option value="Denmark" {{ $selectedCountry == 'Denmark' ? 'selected' : '' }}>Denmark</option>
                                        <option value="Djibouti" {{ $selectedCountry == 'Djibouti' ? 'selected' : '' }}>Djibouti</option>
                                        <option value="Dominica" {{ $selectedCountry == 'Dominica' ? 'selected' : '' }}>Dominica</option>
                                        <option value="Dominican Republic" {{ $selectedCountry == 'Dominican Republic' ? 'selected' : '' }}>Dominican Republic</option>
                                        <option value="Ecuador" {{ $selectedCountry == 'Ecuador' ? 'selected' : '' }}>Ecuador</option>
                                        <option value="Egypt" {{ $selectedCountry == 'Egypt' ? 'selected' : '' }}>Egypt</option>
                                        <option value="El Salvador" {{ $selectedCountry == 'El Salvador' ? 'selected' : '' }}>El Salvador</option>
                                        <option value="Equatorial Guinea" {{ $selectedCountry == 'Equatorial Guinea' ? 'selected' : '' }}>Equatorial Guinea</option>
                                        <option value="Eritrea" {{ $selectedCountry == 'Eritrea' ? 'selected' : '' }}>Eritrea</option>
                                        <option value="Estonia" {{ $selectedCountry == 'Estonia' ? 'selected' : '' }}>Estonia</option>
                                        <option value="Eswatini" {{ $selectedCountry == 'Eswatini' ? 'selected' : '' }}>Eswatini</option>
                                        <option value="Ethiopia" {{ $selectedCountry == 'Ethiopia' ? 'selected' : '' }}>Ethiopia</option>
                                        <option value="Fiji" {{ $selectedCountry == 'Fiji' ? 'selected' : '' }}>Fiji</option>
                                        <option value="Finland" {{ $selectedCountry == 'Finland' ? 'selected' : '' }}>Finland</option>
                                        <option value="France" {{ $selectedCountry == 'France' ? 'selected' : '' }}>France</option>
                                        <option value="Gabon" {{ $selectedCountry == 'Gabon' ? 'selected' : '' }}>Gabon</option>
                                        <option value="Gambia" {{ $selectedCountry == 'Gambia' ? 'selected' : '' }}>Gambia</option>
                                        <option value="Georgia" {{ $selectedCountry == 'Georgia' ? 'selected' : '' }}>Georgia</option>
                                        <option value="Germany" {{ $selectedCountry == 'Germany' ? 'selected' : '' }}>Germany</option>
                                        <option value="Ghana" {{ $selectedCountry == 'Ghana' ? 'selected' : '' }}>Ghana</option>
                                        <option value="Greece" {{ $selectedCountry == 'Greece' ? 'selected' : '' }}>Greece</option>
                                        <option value="Grenada" {{ $selectedCountry == 'Grenada' ? 'selected' : '' }}>Grenada</option>
                                        <option value="Guatemala" {{ $selectedCountry == 'Guatemala' ? 'selected' : '' }}>Guatemala</option>
                                        <option value="Guinea" {{ $selectedCountry == 'Guinea' ? 'selected' : '' }}>Guinea</option>
                                        <option value="Guinea-Bissau" {{ $selectedCountry == 'Guinea-Bissau' ? 'selected' : '' }}>Guinea-Bissau</option>
                                        <option value="Guyana" {{ $selectedCountry == 'Guyana' ? 'selected' : '' }}>Guyana</option>
                                        <option value="Haiti" {{ $selectedCountry == 'Haiti' ? 'selected' : '' }}>Haiti</option>
                                        <option value="Honduras" {{ $selectedCountry == 'Honduras' ? 'selected' : '' }}>Honduras</option>
                                        <option value="Hungary" {{ $selectedCountry == 'Hungary' ? 'selected' : '' }}>Hungary</option>
                                        <option value="Iceland" {{ $selectedCountry == 'Iceland' ? 'selected' : '' }}>Iceland</option>
                                        <option value="India" {{ $selectedCountry == 'India' ? 'selected' : '' }}>India</option>
                                        <option value="Indonesia" {{ $selectedCountry == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                                        <option value="Iran" {{ $selectedCountry == 'Iran' ? 'selected' : '' }}>Iran</option>
                                        <option value="Iraq" {{ $selectedCountry == 'Iraq' ? 'selected' : '' }}>Iraq</option>
                                        <option value="Ireland" {{ $selectedCountry == 'Ireland' ? 'selected' : '' }}>Ireland</option>
                                        <option value="Israel" {{ $selectedCountry == 'Israel' ? 'selected' : '' }}>Israel</option>
                                        <option value="Italy" {{ $selectedCountry == 'Italy' ? 'selected' : '' }}>Italy</option>
                                        <option value="Jamaica" {{ $selectedCountry == 'Jamaica' ? 'selected' : '' }}>Jamaica</option>
                                        <option value="Japan" {{ $selectedCountry == 'Japan' ? 'selected' : '' }}>Japan</option>
                                        <option value="Jordan" {{ $selectedCountry == 'Jordan' ? 'selected' : '' }}>Jordan</option>
                                        <option value="Kazakhstan" {{ $selectedCountry == 'Kazakhstan' ? 'selected' : '' }}>Kazakhstan</option>
                                        <option value="Kenya" {{ $selectedCountry == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                                        <option value="Kiribati" {{ $selectedCountry == 'Kiribati' ? 'selected' : '' }}>Kiribati</option>
                                        <option value="Korea, North" {{ $selectedCountry == 'Korea, North' ? 'selected' : '' }}>Korea, North</option>
                                        <option value="Korea, South" {{ $selectedCountry == 'Korea, South' ? 'selected' : '' }}>Korea, South</option>
                                        <option value="Kosovo" {{ $selectedCountry == 'Kosovo' ? 'selected' : '' }}>Kosovo</option>
                                        <option value="Kuwait" {{ $selectedCountry == 'Kuwait' ? 'selected' : '' }}>Kuwait</option>
                                        <option value="Kyrgyzstan" {{ $selectedCountry == 'Kyrgyzstan' ? 'selected' : '' }}>Kyrgyzstan</option>
                                        <option value="Laos" {{ $selectedCountry == 'Laos' ? 'selected' : '' }}>Laos</option>
                                        <option value="Latvia" {{ $selectedCountry == 'Latvia' ? 'selected' : '' }}>Latvia</option>
                                        <option value="Lebanon" {{ $selectedCountry == 'Lebanon' ? 'selected' : '' }}>Lebanon</option>
                                        <option value="Lesotho" {{ $selectedCountry == 'Lesotho' ? 'selected' : '' }}>Lesotho</option>
                                        <option value="Liberia" {{ $selectedCountry == 'Liberia' ? 'selected' : '' }}>Liberia</option>
                                        <option value="Libya" {{ $selectedCountry == 'Libya' ? 'selected' : '' }}>Libya</option>
                                        <option value="Liechtenstein" {{ $selectedCountry == 'Liechtenstein' ? 'selected' : '' }}>Liechtenstein</option>
                                        <option value="Lithuania" {{ $selectedCountry == 'Lithuania' ? 'selected' : '' }}>Lithuania</option>
                                        <option value="Luxembourg" {{ $selectedCountry == 'Luxembourg' ? 'selected' : '' }}>Luxembourg</option>
                                        <option value="Madagascar" {{ $selectedCountry == 'Madagascar' ? 'selected' : '' }}>Madagascar</option>
                                        <option value="Malawi" {{ $selectedCountry == 'Malawi' ? 'selected' : '' }}>Malawi</option>
                                        <option value="Malaysia" {{ $selectedCountry == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                                        <option value="Maldives" {{ $selectedCountry == 'Maldives' ? 'selected' : '' }}>Maldives</option>
                                        <option value="Mali" {{ $selectedCountry == 'Mali' ? 'selected' : '' }}>Mali</option>
                                        <option value="Malta" {{ $selectedCountry == 'Malta' ? 'selected' : '' }}>Malta</option>
                                        <option value="Marshall Islands" {{ $selectedCountry == 'Marshall Islands' ? 'selected' : '' }}>Marshall Islands</option>
                                        <option value="Mauritania" {{ $selectedCountry == 'Mauritania' ? 'selected' : '' }}>Mauritania</option>
                                        <option value="Mauritius" {{ $selectedCountry == 'Mauritius' ? 'selected' : '' }}>Mauritius</option>
                                        <option value="Mexico" {{ $selectedCountry == 'Mexico' ? 'selected' : '' }}>Mexico</option>
                                        <option value="Micronesia" {{ $selectedCountry == 'Micronesia' ? 'selected' : '' }}>Micronesia</option>
                                        <option value="Moldova" {{ $selectedCountry == 'Moldova' ? 'selected' : '' }}>Moldova</option>
                                        <option value="Monaco" {{ $selectedCountry == 'Monaco' ? 'selected' : '' }}>Monaco</option>
                                        <option value="Mongolia" {{ $selectedCountry == 'Mongolia' ? 'selected' : '' }}>Mongolia</option>
                                        <option value="Montenegro" {{ $selectedCountry == 'Montenegro' ? 'selected' : '' }}>Montenegro</option>
                                        <option value="Morocco" {{ $selectedCountry == 'Morocco' ? 'selected' : '' }}>Morocco</option>
                                        <option value="Mozambique" {{ $selectedCountry == 'Mozambique' ? 'selected' : '' }}>Mozambique</option>
                                        <option value="Myanmar" {{ $selectedCountry == 'Myanmar' ? 'selected' : '' }}>Myanmar</option>
                                        <option value="Namibia" {{ $selectedCountry == 'Namibia' ? 'selected' : '' }}>Namibia</option>
                                        <option value="Nauru" {{ $selectedCountry == 'Nauru' ? 'selected' : '' }}>Nauru</option>
                                        <option value="Nepal" {{ $selectedCountry == 'Nepal' ? 'selected' : '' }}>Nepal</option>
                                        <option value="Netherlands" {{ $selectedCountry == 'Netherlands' ? 'selected' : '' }}>Netherlands</option>
                                        <option value="New Zealand" {{ $selectedCountry == 'New Zealand' ? 'selected' : '' }}>New Zealand</option>
                                        <option value="Nicaragua" {{ $selectedCountry == 'Nicaragua' ? 'selected' : '' }}>Nicaragua</option>
                                        <option value="Niger" {{ $selectedCountry == 'Niger' ? 'selected' : '' }}>Niger</option>
                                        <option value="Nigeria" {{ $selectedCountry == 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
                                        <option value="North Macedonia" {{ $selectedCountry == 'North Macedonia' ? 'selected' : '' }}>North Macedonia</option>
                                        <option value="Norway" {{ $selectedCountry == 'Norway' ? 'selected' : '' }}>Norway</option>
                                        <option value="Oman" {{ $selectedCountry == 'Oman' ? 'selected' : '' }}>Oman</option>
                                        <option value="Pakistan" {{ $selectedCountry == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
                                        <option value="Palau" {{ $selectedCountry == 'Palau' ? 'selected' : '' }}>Palau</option>
                                        <option value="Panama" {{ $selectedCountry == 'Panama' ? 'selected' : '' }}>Panama</option>
                                        <option value="Papua New Guinea" {{ $selectedCountry == 'Papua New Guinea' ? 'selected' : '' }}>Papua New Guinea</option>
                                        <option value="Paraguay" {{ $selectedCountry == 'Paraguay' ? 'selected' : '' }}>Paraguay</option>
                                        <option value="Peru" {{ $selectedCountry == 'Peru' ? 'selected' : '' }}>Peru</option>
                                        <option value="Philippines" {{ $selectedCountry == 'Philippines' ? 'selected' : '' }}>Philippines</option>
                                        <option value="Poland" {{ $selectedCountry == 'Poland' ? 'selected' : '' }}>Poland</option>
                                        <option value="Portugal" {{ $selectedCountry == 'Portugal' ? 'selected' : '' }}>Portugal</option>
                                        <option value="Qatar" {{ $selectedCountry == 'Qatar' ? 'selected' : '' }}>Qatar</option>
                                        <option value="Romania" {{ $selectedCountry == 'Romania' ? 'selected' : '' }}>Romania</option>
                                        <option value="Russia" {{ $selectedCountry == 'Russia' ? 'selected' : '' }}>Russia</option>
                                        <option value="Rwanda" {{ $selectedCountry == 'Rwanda' ? 'selected' : '' }}>Rwanda</option>
                                        <option value="Saint Kitts and Nevis" {{ $selectedCountry == 'Saint Kitts and Nevis' ? 'selected' : '' }}>Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia" {{ $selectedCountry == 'Saint Lucia' ? 'selected' : '' }}>Saint Lucia</option>
                                        <option value="Saint Vincent and the Grenadines" {{ $selectedCountry == 'Saint Vincent and the Grenadines' ? 'selected' : '' }}>Saint Vincent and the Grenadines</option>
                                        <option value="Samoa" {{ $selectedCountry == 'Samoa' ? 'selected' : '' }}>Samoa</option>
                                        <option value="San Marino" {{ $selectedCountry == 'San Marino' ? 'selected' : '' }}>San Marino</option>
                                        <option value="Sao Tome and Principe" {{ $selectedCountry == 'Sao Tome and Principe' ? 'selected' : '' }}>Sao Tome and Principe</option>
                                        <option value="Saudi Arabia" {{ $selectedCountry == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
                                        <option value="Senegal" {{ $selectedCountry == 'Senegal' ? 'selected' : '' }}>Senegal</option>
                                        <option value="Serbia" {{ $selectedCountry == 'Serbia' ? 'selected' : '' }}>Serbia</option>
                                        <option value="Seychelles" {{ $selectedCountry == 'Seychelles' ? 'selected' : '' }}>Seychelles</option>
                                        <option value="Sierra Leone" {{ $selectedCountry == 'Sierra Leone' ? 'selected' : '' }}>Sierra Leone</option>
                                        <option value="Singapore" {{ $selectedCountry == 'Singapore' ? 'selected' : '' }}>Singapore</option>
                                        <option value="Slovakia" {{ $selectedCountry == 'Slovakia' ? 'selected' : '' }}>Slovakia</option>
                                        <option value="Slovenia" {{ $selectedCountry == 'Slovenia' ? 'selected' : '' }}>Slovenia</option>
                                        <option value="Solomon Islands" {{ $selectedCountry == 'Solomon Islands' ? 'selected' : '' }}>Solomon Islands</option>
                                        <option value="Somalia" {{ $selectedCountry == 'Somalia' ? 'selected' : '' }}>Somalia</option>
                                        <option value="South Africa" {{ $selectedCountry == 'South Africa' ? 'selected' : '' }}>South Africa</option>
                                        <option value="South Sudan" {{ $selectedCountry == 'South Sudan' ? 'selected' : '' }}>South Sudan</option>
                                        <option value="Spain" {{ $selectedCountry == 'Spain' ? 'selected' : '' }}>Spain</option>
                                        <option value="Sri Lanka" {{ $selectedCountry == 'Sri Lanka' ? 'selected' : '' }}>Sri Lanka</option>
                                        <option value="Sudan" {{ $selectedCountry == 'Sudan' ? 'selected' : '' }}>Sudan</option>
                                        <option value="Suriname" {{ $selectedCountry == 'Suriname' ? 'selected' : '' }}>Suriname</option>
                                        <option value="Sweden" {{ $selectedCountry == 'Sweden' ? 'selected' : '' }}>Sweden</option>
                                        <option value="Switzerland" {{ $selectedCountry == 'Switzerland' ? 'selected' : '' }}>Switzerland</option>
                                        <option value="Syria" {{ $selectedCountry == 'Syria' ? 'selected' : '' }}>Syria</option>
                                        <option value="Taiwan" {{ $selectedCountry == 'Taiwan' ? 'selected' : '' }}>Taiwan</option>
                                        <option value="Tajikistan" {{ $selectedCountry == 'Tajikistan' ? 'selected' : '' }}>Tajikistan</option>
                                        <option value="Tanzania" {{ $selectedCountry == 'Tanzania' ? 'selected' : '' }}>Tanzania</option>
                                        <option value="Thailand" {{ $selectedCountry == 'Thailand' ? 'selected' : '' }}>Thailand</option>
                                        <option value="Timor-Leste" {{ $selectedCountry == 'Timor-Leste' ? 'selected' : '' }}>Timor-Leste</option>
                                        <option value="Togo" {{ $selectedCountry == 'Togo' ? 'selected' : '' }}>Togo</option>
                                        <option value="Tonga" {{ $selectedCountry == 'Tonga' ? 'selected' : '' }}>Tonga</option>
                                        <option value="Trinidad and Tobago" {{ $selectedCountry == 'Trinidad and Tobago' ? 'selected' : '' }}>Trinidad and Tobago</option>
                                        <option value="Tunisia" {{ $selectedCountry == 'Tunisia' ? 'selected' : '' }}>Tunisia</option>
                                        <option value="Turkey" {{ $selectedCountry == 'Turkey' ? 'selected' : '' }}>Turkey</option>
                                        <option value="Turkmenistan" {{ $selectedCountry == 'Turkmenistan' ? 'selected' : '' }}>Turkmenistan</option>
                                        <option value="Tuvalu" {{ $selectedCountry == 'Tuvalu' ? 'selected' : '' }}>Tuvalu</option>
                                        <option value="Uganda" {{ $selectedCountry == 'Uganda' ? 'selected' : '' }}>Uganda</option>
                                        <option value="Ukraine" {{ $selectedCountry == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                                        <option value="United Arab Emirates" {{ $selectedCountry == 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates</option>
                                        <option value="United Kingdom" {{ $selectedCountry == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                        <option value="United States" {{ $selectedCountry == 'United States' ? 'selected' : '' }}>United States</option>
                                        <option value="Uruguay" {{ $selectedCountry == 'Uruguay' ? 'selected' : '' }}>Uruguay</option>
                                        <option value="Uzbekistan" {{ $selectedCountry == 'Uzbekistan' ? 'selected' : '' }}>Uzbekistan</option>
                                        <option value="Vanuatu" {{ $selectedCountry == 'Vanuatu' ? 'selected' : '' }}>Vanuatu</option>
                                        <option value="Vatican City" {{ $selectedCountry == 'Vatican City' ? 'selected' : '' }}>Vatican City</option>
                                        <option value="Venezuela" {{ $selectedCountry == 'Venezuela' ? 'selected' : '' }}>Venezuela</option>
                                        <option value="Vietnam" {{ $selectedCountry == 'Vietnam' ? 'selected' : '' }}>Vietnam</option>
                                        <option value="Yemen" {{ $selectedCountry == 'Yemen' ? 'selected' : '' }}>Yemen</option>
                                        <option value="Zambia" {{ $selectedCountry == 'Zambia' ? 'selected' : '' }}>Zambia</option>
                                        <option value="Zimbabwe" {{ $selectedCountry == 'Zimbabwe' ? 'selected' : '' }}>Zimbabwe</option>
                                    </select>
                                    <input type="hidden" name="old_country[country]" value="{{ $formData->address['country'] ?? '' }}">
                                </div>
                                <div class="form-group col-md-6" id="form-group-country">
                                    <label for="country">New Country</label>
                                    <select class="form-control" id="country" name="address[country]">
                                        @php
                                            $selectedCountry = old('address.country', $selectedForm->address['country'] ?? '');
                                        @endphp

                                        <option value="Afghanistan" {{ $selectedCountry == 'Afghanistan' ? 'selected' : '' }}>Afghanistan</option>
                                        <option value="Albania" {{ $selectedCountry == 'Albania' ? 'selected' : '' }}>Albania</option>
                                        <option value="Algeria" {{ $selectedCountry == 'Algeria' ? 'selected' : '' }}>Algeria</option>
                                        <option value="Andorra" {{ $selectedCountry == 'Andorra' ? 'selected' : '' }}>Andorra</option>
                                        <option value="Angola" {{ $selectedCountry == 'Angola' ? 'selected' : '' }}>Angola</option>
                                        <option value="Antigua and Barbuda" {{ $selectedCountry == 'Antigua and Barbuda' ? 'selected' : '' }}>Antigua and Barbuda</option>
                                        <option value="Argentina" {{ $selectedCountry == 'Argentina' ? 'selected' : '' }}>Argentina</option>
                                        <option value="Armenia" {{ $selectedCountry == 'Armenia' ? 'selected' : '' }}>Armenia</option>
                                        <option value="Australia" {{ $selectedCountry == 'Australia' ? 'selected' : '' }}>Australia</option>
                                        <option value="Austria" {{ $selectedCountry == 'Austria' ? 'selected' : '' }}>Austria</option>
                                        <option value="Azerbaijan" {{ $selectedCountry == 'Azerbaijan' ? 'selected' : '' }}>Azerbaijan</option>
                                        <option value="Bahamas" {{ $selectedCountry == 'Bahamas' ? 'selected' : '' }}>Bahamas</option>
                                        <option value="Bahrain" {{ $selectedCountry == 'Bahrain' ? 'selected' : '' }}>Bahrain</option>
                                        <option value="Bangladesh" {{ $selectedCountry == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                        <option value="Barbados" {{ $selectedCountry == 'Barbados' ? 'selected' : '' }}>Barbados</option>
                                        <option value="Belarus" {{ $selectedCountry == 'Belarus' ? 'selected' : '' }}>Belarus</option>
                                        <option value="Belgium" {{ $selectedCountry == 'Belgium' ? 'selected' : '' }}>Belgium</option>
                                        <option value="Belize" {{ $selectedCountry == 'Belize' ? 'selected' : '' }}>Belize</option>
                                        <option value="Benin" {{ $selectedCountry == 'Benin' ? 'selected' : '' }}>Benin</option>
                                        <option value="Bhutan" {{ $selectedCountry == 'Bhutan' ? 'selected' : '' }}>Bhutan</option>
                                        <option value="Bolivia" {{ $selectedCountry == 'Bolivia' ? 'selected' : '' }}>Bolivia</option>
                                        <option value="Bosnia and Herzegovina" {{ $selectedCountry == 'Bosnia and Herzegovina' ? 'selected' : '' }}>Bosnia and Herzegovina</option>
                                        <option value="Botswana" {{ $selectedCountry == 'Botswana' ? 'selected' : '' }}>Botswana</option>
                                        <option value="Brazil" {{ $selectedCountry == 'Brazil' ? 'selected' : '' }}>Brazil</option>
                                        <option value="Brunei" {{ $selectedCountry == 'Brunei' ? 'selected' : '' }}>Brunei</option>
                                        <option value="Bulgaria" {{ $selectedCountry == 'Bulgaria' ? 'selected' : '' }}>Bulgaria</option>
                                        <option value="Burkina Faso" {{ $selectedCountry == 'Burkina Faso' ? 'selected' : '' }}>Burkina Faso</option>
                                        <option value="Burundi" {{ $selectedCountry == 'Burundi' ? 'selected' : '' }}>Burundi</option>
                                        <option value="Cabo Verde" {{ $selectedCountry == 'Cabo Verde' ? 'selected' : '' }}>Cabo Verde</option>
                                        <option value="Cambodia" {{ $selectedCountry == 'Cambodia' ? 'selected' : '' }}>Cambodia</option>
                                        <option value="Cameroon" {{ $selectedCountry == 'Cameroon' ? 'selected' : '' }}>Cameroon</option>
                                        <option value="Canada" {{ $selectedCountry == 'Canada' ? 'selected' : '' }}>Canada</option>
                                        <option value="Central African Republic" {{ $selectedCountry == 'Central African Republic' ? 'selected' : '' }}>Central African Republic</option>
                                        <option value="Chad" {{ $selectedCountry == 'Chad' ? 'selected' : '' }}>Chad</option>
                                        <option value="Chile" {{ $selectedCountry == 'Chile' ? 'selected' : '' }}>Chile</option>
                                        <option value="China" {{ $selectedCountry == 'China' ? 'selected' : '' }}>China</option>
                                        <option value="Colombia" {{ $selectedCountry == 'Colombia' ? 'selected' : '' }}>Colombia</option>
                                        <option value="Comoros" {{ $selectedCountry == 'Comoros' ? 'selected' : '' }}>Comoros</option>
                                        <option value="Congo, Democratic Republic of the" {{ $selectedCountry == 'Congo, Democratic Republic of the' ? 'selected' : '' }}>Congo, Democratic Republic of the</option>
                                        <option value="Congo, Republic of the" {{ $selectedCountry == 'Congo, Republic of the' ? 'selected' : '' }}>Congo, Republic of the</option>
                                        <option value="Costa Rica" {{ $selectedCountry == 'Costa Rica' ? 'selected' : '' }}>Costa Rica</option>
                                        <option value="Cote d'Ivoire" {{ $selectedCountry == "Cote d'Ivoire" ? 'selected' : '' }}>Cote d'Ivoire</option>
                                        <option value="Croatia" {{ $selectedCountry == 'Croatia' ? 'selected' : '' }}>Croatia</option>
                                        <option value="Cuba" {{ $selectedCountry == 'Cuba' ? 'selected' : '' }}>Cuba</option>
                                        <option value="Cyprus" {{ $selectedCountry == 'Cyprus' ? 'selected' : '' }}>Cyprus</option>
                                        <option value="Czech Republic" {{ $selectedCountry == 'Czech Republic' ? 'selected' : '' }}>Czech Republic</option>
                                        <option value="Denmark" {{ $selectedCountry == 'Denmark' ? 'selected' : '' }}>Denmark</option>
                                        <option value="Djibouti" {{ $selectedCountry == 'Djibouti' ? 'selected' : '' }}>Djibouti</option>
                                        <option value="Dominica" {{ $selectedCountry == 'Dominica' ? 'selected' : '' }}>Dominica</option>
                                        <option value="Dominican Republic" {{ $selectedCountry == 'Dominican Republic' ? 'selected' : '' }}>Dominican Republic</option>
                                        <option value="Ecuador" {{ $selectedCountry == 'Ecuador' ? 'selected' : '' }}>Ecuador</option>
                                        <option value="Egypt" {{ $selectedCountry == 'Egypt' ? 'selected' : '' }}>Egypt</option>
                                        <option value="El Salvador" {{ $selectedCountry == 'El Salvador' ? 'selected' : '' }}>El Salvador</option>
                                        <option value="Equatorial Guinea" {{ $selectedCountry == 'Equatorial Guinea' ? 'selected' : '' }}>Equatorial Guinea</option>
                                        <option value="Eritrea" {{ $selectedCountry == 'Eritrea' ? 'selected' : '' }}>Eritrea</option>
                                        <option value="Estonia" {{ $selectedCountry == 'Estonia' ? 'selected' : '' }}>Estonia</option>
                                        <option value="Eswatini" {{ $selectedCountry == 'Eswatini' ? 'selected' : '' }}>Eswatini</option>
                                        <option value="Ethiopia" {{ $selectedCountry == 'Ethiopia' ? 'selected' : '' }}>Ethiopia</option>
                                        <option value="Fiji" {{ $selectedCountry == 'Fiji' ? 'selected' : '' }}>Fiji</option>
                                        <option value="Finland" {{ $selectedCountry == 'Finland' ? 'selected' : '' }}>Finland</option>
                                        <option value="France" {{ $selectedCountry == 'France' ? 'selected' : '' }}>France</option>
                                        <option value="Gabon" {{ $selectedCountry == 'Gabon' ? 'selected' : '' }}>Gabon</option>
                                        <option value="Gambia" {{ $selectedCountry == 'Gambia' ? 'selected' : '' }}>Gambia</option>
                                        <option value="Georgia" {{ $selectedCountry == 'Georgia' ? 'selected' : '' }}>Georgia</option>
                                        <option value="Germany" {{ $selectedCountry == 'Germany' ? 'selected' : '' }}>Germany</option>
                                        <option value="Ghana" {{ $selectedCountry == 'Ghana' ? 'selected' : '' }}>Ghana</option>
                                        <option value="Greece" {{ $selectedCountry == 'Greece' ? 'selected' : '' }}>Greece</option>
                                        <option value="Grenada" {{ $selectedCountry == 'Grenada' ? 'selected' : '' }}>Grenada</option>
                                        <option value="Guatemala" {{ $selectedCountry == 'Guatemala' ? 'selected' : '' }}>Guatemala</option>
                                        <option value="Guinea" {{ $selectedCountry == 'Guinea' ? 'selected' : '' }}>Guinea</option>
                                        <option value="Guinea-Bissau" {{ $selectedCountry == 'Guinea-Bissau' ? 'selected' : '' }}>Guinea-Bissau</option>
                                        <option value="Guyana" {{ $selectedCountry == 'Guyana' ? 'selected' : '' }}>Guyana</option>
                                        <option value="Haiti" {{ $selectedCountry == 'Haiti' ? 'selected' : '' }}>Haiti</option>
                                        <option value="Honduras" {{ $selectedCountry == 'Honduras' ? 'selected' : '' }}>Honduras</option>
                                        <option value="Hungary" {{ $selectedCountry == 'Hungary' ? 'selected' : '' }}>Hungary</option>
                                        <option value="Iceland" {{ $selectedCountry == 'Iceland' ? 'selected' : '' }}>Iceland</option>
                                        <option value="India" {{ $selectedCountry == 'India' ? 'selected' : '' }}>India</option>
                                        <option value="Indonesia" {{ $selectedCountry == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                                        <option value="Iran" {{ $selectedCountry == 'Iran' ? 'selected' : '' }}>Iran</option>
                                        <option value="Iraq" {{ $selectedCountry == 'Iraq' ? 'selected' : '' }}>Iraq</option>
                                        <option value="Ireland" {{ $selectedCountry == 'Ireland' ? 'selected' : '' }}>Ireland</option>
                                        <option value="Israel" {{ $selectedCountry == 'Israel' ? 'selected' : '' }}>Israel</option>
                                        <option value="Italy" {{ $selectedCountry == 'Italy' ? 'selected' : '' }}>Italy</option>
                                        <option value="Jamaica" {{ $selectedCountry == 'Jamaica' ? 'selected' : '' }}>Jamaica</option>
                                        <option value="Japan" {{ $selectedCountry == 'Japan' ? 'selected' : '' }}>Japan</option>
                                        <option value="Jordan" {{ $selectedCountry == 'Jordan' ? 'selected' : '' }}>Jordan</option>
                                        <option value="Kazakhstan" {{ $selectedCountry == 'Kazakhstan' ? 'selected' : '' }}>Kazakhstan</option>
                                        <option value="Kenya" {{ $selectedCountry == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                                        <option value="Kiribati" {{ $selectedCountry == 'Kiribati' ? 'selected' : '' }}>Kiribati</option>
                                        <option value="Korea, North" {{ $selectedCountry == 'Korea, North' ? 'selected' : '' }}>Korea, North</option>
                                        <option value="Korea, South" {{ $selectedCountry == 'Korea, South' ? 'selected' : '' }}>Korea, South</option>
                                        <option value="Kosovo" {{ $selectedCountry == 'Kosovo' ? 'selected' : '' }}>Kosovo</option>
                                        <option value="Kuwait" {{ $selectedCountry == 'Kuwait' ? 'selected' : '' }}>Kuwait</option>
                                        <option value="Kyrgyzstan" {{ $selectedCountry == 'Kyrgyzstan' ? 'selected' : '' }}>Kyrgyzstan</option>
                                        <option value="Laos" {{ $selectedCountry == 'Laos' ? 'selected' : '' }}>Laos</option>
                                        <option value="Latvia" {{ $selectedCountry == 'Latvia' ? 'selected' : '' }}>Latvia</option>
                                        <option value="Lebanon" {{ $selectedCountry == 'Lebanon' ? 'selected' : '' }}>Lebanon</option>
                                        <option value="Lesotho" {{ $selectedCountry == 'Lesotho' ? 'selected' : '' }}>Lesotho</option>
                                        <option value="Liberia" {{ $selectedCountry == 'Liberia' ? 'selected' : '' }}>Liberia</option>
                                        <option value="Libya" {{ $selectedCountry == 'Libya' ? 'selected' : '' }}>Libya</option>
                                        <option value="Liechtenstein" {{ $selectedCountry == 'Liechtenstein' ? 'selected' : '' }}>Liechtenstein</option>
                                        <option value="Lithuania" {{ $selectedCountry == 'Lithuania' ? 'selected' : '' }}>Lithuania</option>
                                        <option value="Luxembourg" {{ $selectedCountry == 'Luxembourg' ? 'selected' : '' }}>Luxembourg</option>
                                        <option value="Madagascar" {{ $selectedCountry == 'Madagascar' ? 'selected' : '' }}>Madagascar</option>
                                        <option value="Malawi" {{ $selectedCountry == 'Malawi' ? 'selected' : '' }}>Malawi</option>
                                        <option value="Malaysia" {{ $selectedCountry == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                                        <option value="Maldives" {{ $selectedCountry == 'Maldives' ? 'selected' : '' }}>Maldives</option>
                                        <option value="Mali" {{ $selectedCountry == 'Mali' ? 'selected' : '' }}>Mali</option>
                                        <option value="Malta" {{ $selectedCountry == 'Malta' ? 'selected' : '' }}>Malta</option>
                                        <option value="Marshall Islands" {{ $selectedCountry == 'Marshall Islands' ? 'selected' : '' }}>Marshall Islands</option>
                                        <option value="Mauritania" {{ $selectedCountry == 'Mauritania' ? 'selected' : '' }}>Mauritania</option>
                                        <option value="Mauritius" {{ $selectedCountry == 'Mauritius' ? 'selected' : '' }}>Mauritius</option>
                                        <option value="Mexico" {{ $selectedCountry == 'Mexico' ? 'selected' : '' }}>Mexico</option>
                                        <option value="Micronesia" {{ $selectedCountry == 'Micronesia' ? 'selected' : '' }}>Micronesia</option>
                                        <option value="Moldova" {{ $selectedCountry == 'Moldova' ? 'selected' : '' }}>Moldova</option>
                                        <option value="Monaco" {{ $selectedCountry == 'Monaco' ? 'selected' : '' }}>Monaco</option>
                                        <option value="Mongolia" {{ $selectedCountry == 'Mongolia' ? 'selected' : '' }}>Mongolia</option>
                                        <option value="Montenegro" {{ $selectedCountry == 'Montenegro' ? 'selected' : '' }}>Montenegro</option>
                                        <option value="Morocco" {{ $selectedCountry == 'Morocco' ? 'selected' : '' }}>Morocco</option>
                                        <option value="Mozambique" {{ $selectedCountry == 'Mozambique' ? 'selected' : '' }}>Mozambique</option>
                                        <option value="Myanmar" {{ $selectedCountry == 'Myanmar' ? 'selected' : '' }}>Myanmar</option>
                                        <option value="Namibia" {{ $selectedCountry == 'Namibia' ? 'selected' : '' }}>Namibia</option>
                                        <option value="Nauru" {{ $selectedCountry == 'Nauru' ? 'selected' : '' }}>Nauru</option>
                                        <option value="Nepal" {{ $selectedCountry == 'Nepal' ? 'selected' : '' }}>Nepal</option>
                                        <option value="Netherlands" {{ $selectedCountry == 'Netherlands' ? 'selected' : '' }}>Netherlands</option>
                                        <option value="New Zealand" {{ $selectedCountry == 'New Zealand' ? 'selected' : '' }}>New Zealand</option>
                                        <option value="Nicaragua" {{ $selectedCountry == 'Nicaragua' ? 'selected' : '' }}>Nicaragua</option>
                                        <option value="Niger" {{ $selectedCountry == 'Niger' ? 'selected' : '' }}>Niger</option>
                                        <option value="Nigeria" {{ $selectedCountry == 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
                                        <option value="North Macedonia" {{ $selectedCountry == 'North Macedonia' ? 'selected' : '' }}>North Macedonia</option>
                                        <option value="Norway" {{ $selectedCountry == 'Norway' ? 'selected' : '' }}>Norway</option>
                                        <option value="Oman" {{ $selectedCountry == 'Oman' ? 'selected' : '' }}>Oman</option>
                                        <option value="Pakistan" {{ $selectedCountry == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
                                        <option value="Palau" {{ $selectedCountry == 'Palau' ? 'selected' : '' }}>Palau</option>
                                        <option value="Panama" {{ $selectedCountry == 'Panama' ? 'selected' : '' }}>Panama</option>
                                        <option value="Papua New Guinea" {{ $selectedCountry == 'Papua New Guinea' ? 'selected' : '' }}>Papua New Guinea</option>
                                        <option value="Paraguay" {{ $selectedCountry == 'Paraguay' ? 'selected' : '' }}>Paraguay</option>
                                        <option value="Peru" {{ $selectedCountry == 'Peru' ? 'selected' : '' }}>Peru</option>
                                        <option value="Philippines" {{ $selectedCountry == 'Philippines' ? 'selected' : '' }}>Philippines</option>
                                        <option value="Poland" {{ $selectedCountry == 'Poland' ? 'selected' : '' }}>Poland</option>
                                        <option value="Portugal" {{ $selectedCountry == 'Portugal' ? 'selected' : '' }}>Portugal</option>
                                        <option value="Qatar" {{ $selectedCountry == 'Qatar' ? 'selected' : '' }}>Qatar</option>
                                        <option value="Romania" {{ $selectedCountry == 'Romania' ? 'selected' : '' }}>Romania</option>
                                        <option value="Russia" {{ $selectedCountry == 'Russia' ? 'selected' : '' }}>Russia</option>
                                        <option value="Rwanda" {{ $selectedCountry == 'Rwanda' ? 'selected' : '' }}>Rwanda</option>
                                        <option value="Saint Kitts and Nevis" {{ $selectedCountry == 'Saint Kitts and Nevis' ? 'selected' : '' }}>Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia" {{ $selectedCountry == 'Saint Lucia' ? 'selected' : '' }}>Saint Lucia</option>
                                        <option value="Saint Vincent and the Grenadines" {{ $selectedCountry == 'Saint Vincent and the Grenadines' ? 'selected' : '' }}>Saint Vincent and the Grenadines</option>
                                        <option value="Samoa" {{ $selectedCountry == 'Samoa' ? 'selected' : '' }}>Samoa</option>
                                        <option value="San Marino" {{ $selectedCountry == 'San Marino' ? 'selected' : '' }}>San Marino</option>
                                        <option value="Sao Tome and Principe" {{ $selectedCountry == 'Sao Tome and Principe' ? 'selected' : '' }}>Sao Tome and Principe</option>
                                        <option value="Saudi Arabia" {{ $selectedCountry == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
                                        <option value="Senegal" {{ $selectedCountry == 'Senegal' ? 'selected' : '' }}>Senegal</option>
                                        <option value="Serbia" {{ $selectedCountry == 'Serbia' ? 'selected' : '' }}>Serbia</option>
                                        <option value="Seychelles" {{ $selectedCountry == 'Seychelles' ? 'selected' : '' }}>Seychelles</option>
                                        <option value="Sierra Leone" {{ $selectedCountry == 'Sierra Leone' ? 'selected' : '' }}>Sierra Leone</option>
                                        <option value="Singapore" {{ $selectedCountry == 'Singapore' ? 'selected' : '' }}>Singapore</option>
                                        <option value="Slovakia" {{ $selectedCountry == 'Slovakia' ? 'selected' : '' }}>Slovakia</option>
                                        <option value="Slovenia" {{ $selectedCountry == 'Slovenia' ? 'selected' : '' }}>Slovenia</option>
                                        <option value="Solomon Islands" {{ $selectedCountry == 'Solomon Islands' ? 'selected' : '' }}>Solomon Islands</option>
                                        <option value="Somalia" {{ $selectedCountry == 'Somalia' ? 'selected' : '' }}>Somalia</option>
                                        <option value="South Africa" {{ $selectedCountry == 'South Africa' ? 'selected' : '' }}>South Africa</option>
                                        <option value="South Sudan" {{ $selectedCountry == 'South Sudan' ? 'selected' : '' }}>South Sudan</option>
                                        <option value="Spain" {{ $selectedCountry == 'Spain' ? 'selected' : '' }}>Spain</option>
                                        <option value="Sri Lanka" {{ $selectedCountry == 'Sri Lanka' ? 'selected' : '' }}>Sri Lanka</option>
                                        <option value="Sudan" {{ $selectedCountry == 'Sudan' ? 'selected' : '' }}>Sudan</option>
                                        <option value="Suriname" {{ $selectedCountry == 'Suriname' ? 'selected' : '' }}>Suriname</option>
                                        <option value="Sweden" {{ $selectedCountry == 'Sweden' ? 'selected' : '' }}>Sweden</option>
                                        <option value="Switzerland" {{ $selectedCountry == 'Switzerland' ? 'selected' : '' }}>Switzerland</option>
                                        <option value="Syria" {{ $selectedCountry == 'Syria' ? 'selected' : '' }}>Syria</option>
                                        <option value="Taiwan" {{ $selectedCountry == 'Taiwan' ? 'selected' : '' }}>Taiwan</option>
                                        <option value="Tajikistan" {{ $selectedCountry == 'Tajikistan' ? 'selected' : '' }}>Tajikistan</option>
                                        <option value="Tanzania" {{ $selectedCountry == 'Tanzania' ? 'selected' : '' }}>Tanzania</option>
                                        <option value="Thailand" {{ $selectedCountry == 'Thailand' ? 'selected' : '' }}>Thailand</option>
                                        <option value="Timor-Leste" {{ $selectedCountry == 'Timor-Leste' ? 'selected' : '' }}>Timor-Leste</option>
                                        <option value="Togo" {{ $selectedCountry == 'Togo' ? 'selected' : '' }}>Togo</option>
                                        <option value="Tonga" {{ $selectedCountry == 'Tonga' ? 'selected' : '' }}>Tonga</option>
                                        <option value="Trinidad and Tobago" {{ $selectedCountry == 'Trinidad and Tobago' ? 'selected' : '' }}>Trinidad and Tobago</option>
                                        <option value="Tunisia" {{ $selectedCountry == 'Tunisia' ? 'selected' : '' }}>Tunisia</option>
                                        <option value="Turkey" {{ $selectedCountry == 'Turkey' ? 'selected' : '' }}>Turkey</option>
                                        <option value="Turkmenistan" {{ $selectedCountry == 'Turkmenistan' ? 'selected' : '' }}>Turkmenistan</option>
                                        <option value="Tuvalu" {{ $selectedCountry == 'Tuvalu' ? 'selected' : '' }}>Tuvalu</option>
                                        <option value="Uganda" {{ $selectedCountry == 'Uganda' ? 'selected' : '' }}>Uganda</option>
                                        <option value="Ukraine" {{ $selectedCountry == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                                        <option value="United Arab Emirates" {{ $selectedCountry == 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates</option>
                                        <option value="United Kingdom" {{ $selectedCountry == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                        <option value="United States" {{ $selectedCountry == 'United States' ? 'selected' : '' }}>United States</option>
                                        <option value="Uruguay" {{ $selectedCountry == 'Uruguay' ? 'selected' : '' }}>Uruguay</option>
                                        <option value="Uzbekistan" {{ $selectedCountry == 'Uzbekistan' ? 'selected' : '' }}>Uzbekistan</option>
                                        <option value="Vanuatu" {{ $selectedCountry == 'Vanuatu' ? 'selected' : '' }}>Vanuatu</option>
                                        <option value="Vatican City" {{ $selectedCountry == 'Vatican City' ? 'selected' : '' }}>Vatican City</option>
                                        <option value="Venezuela" {{ $selectedCountry == 'Venezuela' ? 'selected' : '' }}>Venezuela</option>
                                        <option value="Vietnam" {{ $selectedCountry == 'Vietnam' ? 'selected' : '' }}>Vietnam</option>
                                        <option value="Yemen" {{ $selectedCountry == 'Yemen' ? 'selected' : '' }}>Yemen</option>
                                        <option value="Zambia" {{ $selectedCountry == 'Zambia' ? 'selected' : '' }}>Zambia</option>
                                        <option value="Zimbabwe" {{ $selectedCountry == 'Zimbabwe' ? 'selected' : '' }}>Zimbabwe</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6" id="form-group-city">
                                    <label for="city">Original City</label>
                                    <input type="text" class="form-control" readonly id="city"
                                           value="{{ old('address.city', $formData->address['city'] ?? '') }}">

                                     <input type="hidden" name="old_address[city]" value="{{ $formData->address['city'] ?? '' }}">
                                </div>
                                <div class="form-group col-md-6" id="form-group-city">
                                    <label for="city">New City</label>
                                    <input type="text" class="form-control" name="address[city]" id="city"
                                           value="{{ old('address.city', $formData->address['city'] ?? '') }}">

                                </div>

                                <div class="form-group col-md-6" id="form-group-postcode">
                                    <label for="postcode">Original Postcode</label>
                                    <input type="text" class="form-control" readonly id="postcode"
                                           value="{{ old('address.postcode', $formData->address['postcode'] ?? '') }}">
                                     <input type="hidden" name="old_address[postcode]" value="{{ $formData->address['postcode'] ?? '' }}">
                                </div>
                                <div class="form-group col-md-6" id="form-group-postcode">
                                    <label for="postcode">New Postcode</label>
                                    <input type="text" class="form-control" id="postcode"
                                           name="address[postcode]"
                                           value="{{ old('address.postcode', $formData->address['postcode'] ?? '') }}">
                                </div>

                                 <div class="form-group col-md-12">
                                    <label for="hire_end_date">Reason For Change</label>
                                     <textarea name="reason[address_reason_for_change]" class="form-control" id="" cols="5" rows="5">{{ old('reason.address_reason_for_change', $formData->reason['address_reason_for_change'] ??  '' )}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-section" id="paymentDate" style="display: none;">
                            <div class="row mt-4">
                                <!-- Original Payment Date -->
                                <div class="form-group col-md-6">
                                    <label for="received_date">Original Payment Date</label>
                                    <input type="date" class="form-control" id="received_date" readonly value="{{ old('payment.received_date', $formData->payment['received_date'] ?? '') }}">
                                    <!-- Hidden input to capture old payment date -->
                                    <input type="hidden" name="old_payment[received_date]" value="{{ $formData->payment['received_date'] ?? '' }}">
                                </div>

                                <!-- New Payment Date -->
                                <div class="form-group col-md-6">
                                    <label for="received_date">New Payment Date</label>
                                    <input type="date" class="form-control" id="received_date" name="payment[received_date]" value="{{ old('payment.received_date', $formData->payment['received_date'] ?? '') }}">
                                </div>

                                <!-- Reason For Change -->
                                <div class="form-group col-md-12">
                                    <label for="hire_end_date">Reason For Change</label>
                                    <textarea name="payment[reason_payment_date]" class="form-control" cols="5" rows="5">{{ old('reason.reason_payment_date', $formData->reason['reason_payment_date'] ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-section" id="paymentAmount" style="display: none;">
                            <div class="row mt-4">
                                 <div class="form-group col-md-6">
                                        <label for="received_date">Original Payment Amount</label>
                                        <input type="text" class="form-control" id="received_date" readonly
                                               value="{{ $formData->payment['received_amount'] ?? '' }}" >
                                      <input type="hidden" name="old_payment_amount[received_date]" value="{{ $formData->payment['received_date'] ?? '' }}">
                                 </div>
                                <div class="form-group col-md-6">
                                        <label for="received_date">New Payment Amount</label>
                                        <input type="text" class="form-control" id="payment_amount" name="payment[received_amount]" value="{{ old('payment.received_amount', $formData->payment['received_amount'] ?? '') }}">
                                 </div>

                                <div class="form-group col-md-12">
                                    <label for="hire_end_date">Reason For Change</label>
                                     <textarea name="reason[reason.payment_amount]" class="form-control" id="" cols="5" rows="5">{{ old('reason.reason_payment_amount', $formData->reason['reason_payment_amount'] ?? '') }}</textarea>
                                </div>

                        </div>
                        </div>
                         <div class="form-section" id="VehicleDetails" style="display: none;">
                            <div class="row mt-4">
                                <div class="form-group col-md-4">
                                <label for="registration_number">Original Registration number</label>
                                    <input type="text" class="form-control" id="registration_number" readonly
                                           value="{{ old('vehicle.registration_number', $formData->vehicle['registration_number'] ?? '') }}">
                                    <input type="hidden" name="old_vehicle[registration_number]" value="{{ $formData->vehicle['registration_number'] ?? '' }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="car_model">Original Car model</label>
                                    <input type="text" class="form-control" id="car_model" readonly
                                           value="{{ old('vehicle.car_model', $formData->vehicle['car_model'] ?? '') }}">
                                     <input type="hidden" name="old_vehicle[car_model]" value="{{ $formData->vehicle['car_model'] ?? '' }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="car_make">Original Car make</label>
                                    <input type="text" class="form-control" id="car_make"  readonly
                                           value="{{ old('vehicle.car_make', $formData->vehicle['car_make'] ?? '') }}">
                                     <input type="hidden" name="old_vehicle[car_make]" value="{{ $formData->vehicle['car_make'] ?? '' }}">
                                </div>

                                <div class="form-group col-md-4">
                                <label for="registration_number">New Registration number</label>
                                    <input type="text" class="form-control" id="registration_number" name="vehicle[registration_number]"
                                           value="{{ old('vehicle.registration_number', $formData->vehicle['registration_number'] ?? '') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="car_model">New Car model</label>
                                    <input type="text" class="form-control" id="car_model" name="vehicle[car_model]"
                                           value="{{ old('vehicle.car_model', $formData->vehicle['car_model'] ?? '') }}">

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="car_make">New Car make</label>
                                    <input type="text" class="form-control" id="car_make" name="vehicle[car_make]"
                                           value="{{ old('vehicle.car_make', $formData->vehicle['car_make'] ?? '') }}">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="hire_end_date">Reason For Change</label>
                                     <textarea name="reason[vehicle_change]" class="form-control" id="" cols="5" rows="5">{{ old('reason.vehicle_change', $formData->reason['vehicle_change'] ?? '') }}</textarea>
                                </div>


                        </div>
                        </div>
                         <div class="form-section" id="InsuranceCover" style="display: none;">
                           <div class="row mt-4">
                                <!-- Original Insurance Cover -->
                                <div class="form-group col-md-6">
                                    <label for="type_of_cover">Original Insurance Cover</label>
                                    <select class="form-control" id="type_of_cover" readonly>
                                        <option value="Fully comprehensive" {{ old('hirer_insurance.type_of_cover', $formData->hirer_insurance['type_of_cover'] ?? $form->hirer_insurance['type_of_cover'] ?? '') == 'Fully comprehensive' ? 'selected' : '' }}>Fully comprehensive</option>
                                        <option value="Third party" {{ old('hirer_insurance.type_of_cover', $formData->hirer_insurance['type_of_cover'] ?? $form->hirer_insurance['type_of_cover'] ?? '') == 'Third party' ? 'selected' : '' }}>Third party</option>
                                        <option value="Third party, fire and theft" {{ old('hirer_insurance.type_of_cover', $formData->hirer_insurance['type_of_cover'] ?? $form->hirer_insurance['type_of_cover'] ?? '') == 'Third party, fire and theft' ? 'selected' : '' }}>Third party, fire and theft</option>
                                    </select>
                                    <!-- Hidden field to store old insurance cover -->
                                    <input type="hidden" name="old_hirer_insurance[type_of_cover]" value="{{ old('hirer_insurance.type_of_cover', $formData->hirer_insurance['type_of_cover'] ?? $form->hirer_insurance['type_of_cover'] ?? '') }}">
                                </div>

                                <!-- New Insurance Cover -->
                                <div class="form-group col-md-6">
                                    <label for="type_of_cover">New Insurance Cover</label>
                                    <select class="form-control" id="type_of_cover" name="hirer_insurance[type_of_cover]">
                                        <option value="Fully comprehensive" {{ old('hirer_insurance.type_of_cover', $formData->hirer_insurance['type_of_cover'] ?? $form->hirer_insurance['type_of_cover'] ?? '') == 'Fully comprehensive' ? 'selected' : '' }}>Fully comprehensive</option>
                                        <option value="Third party" {{ old('hirer_insurance.type_of_cover', $formData->hirer_insurance['type_of_cover'] ?? $form->hirer_insurance['type_of_cover'] ?? '') == 'Third party' ? 'selected' : '' }}>Third party</option>
                                        <option value="Third party, fire and theft" {{ old('hirer_insurance.type_of_cover', $formData->hirer_insurance['type_of_cover'] ?? $form->hirer_insurance['type_of_cover'] ?? '') == 'Third party, fire and theft' ? 'selected' : '' }}>Third party, fire and theft</option>
                                    </select>
                                </div>

                                <!-- Insurance Company -->
                                <div class="form-group col-md-12">
                                    <label for="insurance_company">Issuer (if Applicable)</label>
                                    <input type="text" class="form-control" id="insurance_company" name="hirer_insurance[insurance_company]" value="{{ old('hirer_insurance.insurance_company', $formData->hirer_insurance['insurance_company'] ?? $form->hirer_insurance['insurance_company'] ?? '') }}">
                                    <!-- Hidden field to store old insurance company -->
                                    <input type="hidden" name="old_hirer_insurance[insurance_company]" value="{{ old('hirer_insurance.insurance_company', $formData->hirer_insurance['insurance_company'] ?? $form->hirer_insurance['insurance_company'] ?? '') }}">
                                </div>

                                <!-- Reason For Change -->
                                <div class="form-group col-md-12">
                                    <label for="hire_end_date">Reason For Change</label>
                                    <textarea name="reason[reason_hirer_insurance]" class="form-control" cols="5" rows="5">{{ old('reason.reason_hirer_insurance', $formData->reason['reason_hirer_insurance'] ?? '') }}</textarea>
                                    <!-- Hidden field to store old reason for change -->
                                    <input type="hidden" name="old_reason[reason_hirer_insurance]" value="{{ old('reason.reason_hirer_insurance', $formData->reason['reason_hirer_insurance'] ?? '') }}">
                                </div>

                                <!-- Date/Time Of Change -->
{{--                                <div class="form-group col-md-6">--}}
{{--                                    <label for="hire_end_date">Date/Time Of Change</label>--}}
{{--                                    <input type="datetime-local" class="form-control" id="hire_end_date" name="reason[date_hirer_insurance]" value="{{ old('reason.date_hirer_insurance', $formData->reason['date_hirer_insurance'] ?? '') }}">--}}
{{--                                    <!-- Hidden field to store old date/time of change -->--}}
{{--                                    <input type="hidden" name="old_reason[date_hirer_insurance]" value="{{ old('reason.date_hirer_insurance', $formData->reason['date_hirer_insurance'] ?? '') }}">--}}
{{--                                </div>--}}
                            </div>

                        </div>

                        <!-- Repeat for other forms... -->

                        <div class="form-group col-md-6 mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Select all radio inputs with name "duplicateForm"
        const radios = document.querySelectorAll('input[name="duplicateForm"]');
        const forms = {
            customRadio1: 'hireDateForm',
            customRadio2: 'dateExtensionForm',
            customRadio3: 'personalInfoForm',
            customRadio4: 'paymentDate',
            customRadio5: 'paymentAmount',
            customRadio6: 'VehicleDetails',
            customRadio7: 'InsuranceCover',
            customRadio10: 'changeAddress',
            // Add other radio ids and form ids here...
        };

        radios.forEach(radio => {
            radio.addEventListener('change', function () {
                // Hide all forms
                document.querySelectorAll('.form-section').forEach(section => section.style.display = 'none');
                // Show the selected form
                const selectedFormId = forms[this.id];
                if (selectedFormId) {
                    document.getElementById(selectedFormId).style.display = 'block';
                }
            });
        });

        // Trigger change event on page load to show the appropriate form
        document.querySelector('input[name="duplicateForm"]:checked').dispatchEvent(new Event('change'));
    });
</script>
@endsection
