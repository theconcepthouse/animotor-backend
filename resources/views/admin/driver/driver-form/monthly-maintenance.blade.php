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
                                    <h4 class="title nk-block-title">Monthly Maintenance</h4>
                                </div>
                                <div class="nk-block-head-content">
                                     <a href="{{ route('admin.driverForm', ['driverId' => $driver->id, 'formId' => $form->id]) }}" wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                    <a href="{{ route('admin.driverForm', ['driverId' => $driver->id, 'formId' => $form->id]) }}" wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>

                                </div>
                            </div>
                            <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">

                                             <form action="{{ route('admin.submitDriverForm', $form->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                                                <input type="hidden" name="form_id" value="{{ $form->id }}">


                                                <div class="container mt-4">
{{--                                                    <div class="mb-4">--}}
{{--                                                        <h4 class="title nk-block-title">Monthly Maintenance</h4>--}}
{{--                                                    </div>--}}

                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="inspection_mileage">Inspection mileage</label>
                                                            <input type="text" class="form-control" id="inspection_mileage"
                                                                   name="monthly_maintenance[inspection_mileage]"
                                                                   value="{{ old('monthly_maintenance.inspection_mileage', $selectedForm->monthly_maintenance['inspection_mileage'] ?? $form->monthly_maintenance['inspection_mileage'] ?? '') }}" required>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inspection_date">Inspection date</label>
                                                            <input type="date" class="form-control" id="inspection_date"
                                                                   name="monthly_maintenance[inspection_date]"
                                                                   value="{{ old('monthly_maintenance.inspection_date', $selectedForm->monthly_maintenance['inspection_date'] ?? $form->monthly_maintenance['inspection_date'] ?? '') }}" required>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="last_inspection_mileage">Last inspection mileage</label>
                                                            <input type="text" class="form-control" id="last_inspection_mileage"
                                                                   name="monthly_maintenance[last_inspection_mileage]"
                                                                   value="{{ old('monthly_maintenance.last_inspection_mileage', $selectedForm->monthly_maintenance['last_inspection_mileage'] ?? $form->monthly_maintenance['last_inspection_mileage'] ?? '') }}" required>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="last_inspection_date">Last inspection date</label>
                                                            <input type="date" class="form-control" id="last_inspection_date"
                                                                   name="monthly_maintenance[last_inspection_date]"
                                                                   value="{{ old('monthly_maintenance.last_inspection_date', $selectedForm->monthly_maintenance['last_inspection_date'] ?? $form->monthly_maintenance['last_inspection_date'] ?? '') }}" required>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="last_service_mileage">Last service mileage</label>
                                                            <input type="text" class="form-control" id="last_service_mileage"
                                                                   name="monthly_maintenance[last_service_mileage]"
                                                                   value="{{ old('monthly_maintenance.last_service_mileage', $selectedForm->monthly_maintenance['last_service_mileage'] ?? $form->monthly_maintenance['last_service_mileage'] ?? '') }}" required>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="last_service_date">Last service date</label>
                                                            <input type="date" class="form-control" id="last_service_date"
                                                                   name="monthly_maintenance[last_service_date]"
                                                                   value="{{ old('monthly_maintenance.last_service_date', $selectedForm->monthly_maintenance['last_service_date'] ?? $form->monthly_maintenance['last_service_date'] ?? '') }}" required>
                                                        </div>
                                                        <div class="col-md-5 col-sm-6">
                                                            @include('admin.partials.image-upload', [
                                                                'field' => 'monthly_maintenance[odometer_picture]',
                                                                'image' => $selectedForm->monthly_maintenance['odometer_picture'] ?? '',
                                                                'id' => 'file' . Str::uuid(),
                                                                'title' => 'Odometer picture',
                                                                'colSize' => 'col-md-10 col-sm-6',
                                                                ])
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="container mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Issues/Repairs Information</h4>
                                                    </div>

                                                   <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="repair_date">Repair date</label>
                                                        <input type="date" class="form-control" id="repair_date"
                                                               name="monthly_maintenance[repair_date]"
                                                               value="{{ old('monthly_maintenance.repair_date', $selectedForm->monthly_maintenance['repair_date'] ?? $form->monthly_maintenance['repair_date'] ?? '') }}" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="garage_name">Garage name</label>
                                                        <input type="text" class="form-control" id="garage_name"
                                                               name="monthly_maintenance[garage_name]"
                                                               value="{{ old('monthly_maintenance.garage_name', $selectedForm->monthly_maintenance['garage_name'] ?? $form->monthly_maintenance['garage_name'] ?? '') }}" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="cost">Cost</label>
                                                        <input type="text" class="form-control" id="cost"
                                                               name="monthly_maintenance[cost]"
                                                               value="{{ old('monthly_maintenance.cost', $selectedForm->monthly_maintenance['cost'] ?? $form->monthly_maintenance['cost'] ?? '') }}" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="garage_details">Garage details</label>
                                                        <textarea class="form-control" id="garage_details"
                                                                  name="monthly_maintenance[garage_details]"
                                                                  cols="10" rows="5">{{ old('monthly_maintenance.garage_details', $selectedForm->monthly_maintenance['garage_details'] ?? $form->monthly_maintenance['garage_details'] ?? '') }}</textarea>
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
