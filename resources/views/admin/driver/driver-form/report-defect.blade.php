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
                                    <h4 class="title nk-block-title">Report Vehicle Defect</h4>
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
                                                    <div class="row mb-4">
                                                        <div class="form-group col-md-4">
                                                            <label for="return_date">Return date</label>

                                                            <input type="date" class="form-control" id="return_date"
                                                                   name="return_vehicle[return_date]"
                                                                   value="{{ old('return_vehicle.return_date', $selectedForm->return_vehicle['return_date'] ?? $form->return_vehicle['return_date'] ?? '') }}" >
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="return_time">Return time</label>

                                                            <input type="time" class="form-control" id="return_time"
                                                                   name="return_vehicle[return_time]"
                                                                   value="{{ old('return_vehicle.return_time', $selectedForm->return_vehicle['return_time'] ?? $form->return_vehicle['return_time'] ?? '') }}" >
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="return_reason">Return reason</label>

                                                            <textarea class="form-control" name="return_vehicle[return_reason]"
                                                                      cols="10" rows="5">
                                                                {{ old('return_vehicle.return_reason', $selectedForm->return_vehicle['return_reason'] ?? $form->return_vehicle['return_reason'] ?? '') }}
                                                                </textarea>
                                                        </div>
                                                    </div>



                                                   <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="location_of_vehicle">Location of Vehicle</label>
                                                            <input type="text" class="form-control" id="location_of_vehicle" name="report_vehicle[location_of_vehicle]"
                                                                   value="{{ old('report_vehicle.location_of_vehicle', $selectedForm->report_vehicle['location_of_vehicle'] ?? $form->report_vehicle['location_of_vehicle'] ?? '') }}" required>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="post_code">Post Code</label>
                                                            <input type="text" class="form-control" id="post_code" name="report_vehicle[post_code]"
                                                                   value="{{ old('report_vehicle.post_code', $selectedForm->report_vehicle['post_code'] ?? $form->report_vehicle['post_code'] ?? '') }}" required>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="description_of_defect">Description of Defect</label>
                                                            <textarea class="form-control" id="description_of_defect" name="report_vehicle[description_of_defect]" cols="10" rows="5">{{ old('report_vehicle.description_of_defect', $selectedForm->report_vehicle['description_of_defect'] ?? $form->report_vehicle['description_of_defect'] ?? '') }}</textarea>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="location_of_defect">Location of Defect</label>
                                                            <textarea class="form-control" id="location_of_defect" name="report_vehicle[location_of_defect]" cols="10" rows="5">{{ old('report_vehicle.location_of_defect', $selectedForm->report_vehicle['location_of_defect'] ?? $form->report_vehicle['location_of_defect'] ?? '') }}</textarea>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="severity">Severity</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="report_vehicle[severity]" id="severity_Low" value="Low"
                                                                       {{ old('report_vehicle.severity', $selectedForm->report_vehicle['severity'] ?? $form->report_vehicle['severity'] ?? '') == 'Low' ? 'checked' : '' }} required>
                                                                <label class="form-check-label" for="severity_Low">Low</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="report_vehicle[severity]" id="severity_Medium" value="Medium"
                                                                       {{ old('report_vehicle.severity', $selectedForm->report_vehicle['severity'] ?? $form->report_vehicle['severity'] ?? '') == 'Medium' ? 'checked' : '' }} required>
                                                                <label class="form-check-label" for="severity_Medium">Medium</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="report_vehicle[severity]" id="severity_High" value="High"
                                                                       {{ old('report_vehicle.severity', $selectedForm->report_vehicle['severity'] ?? $form->report_vehicle['severity'] ?? '') == 'High' ? 'checked' : '' }} required>
                                                                <label class="form-check-label" for="severity_High">High</label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="impact_on_vehicle_operation">Impact on Vehicle Operation</label>
                                                            <textarea class="form-control" id="impact_on_vehicle_operation" name="report_vehicle[impact_on_vehicle_operation]" cols="10" rows="5">{{ old('report_vehicle.impact_on_vehicle_operation', $selectedForm->report_vehicle['impact_on_vehicle_operation'] ?? $form->report_vehicle['impact_on_vehicle_operation'] ?? '') }}</textarea>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="actions_taken">Actions Taken</label>
                                                            <textarea class="form-control" id="actions_taken" name="report_vehicle[actions_taken]" cols="10" rows="5">{{ old('report_vehicle.actions_taken', $selectedForm->report_vehicle['actions_taken'] ?? $form->report_vehicle['actions_taken'] ?? '') }}</textarea>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="recommendation">Recommendation</label>
                                                            <textarea class="form-control" id="recommendation" name="report_vehicle[recommendation]" cols="10" rows="5">{{ old('report_vehicle.recommendation', $selectedForm->report_vehicle['recommendation'] ?? $form->report_vehicle['recommendation'] ?? '') }}</textarea>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="witnesses">Witnesses</label>
                                                            <textarea class="form-control" id="witnesses" name="report_vehicle[witnesses]" cols="10" rows="5">{{ old('report_vehicle.witnesses', $selectedForm->report_vehicle['witnesses'] ?? $form->report_vehicle['witnesses'] ?? '') }}</textarea>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="container mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Reporter Information</h4>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="name">Name</label>
                                                            <input type="text" class="form-control" id="name" name="report_vehicle[name]"
                                                                   value="{{ old('report_vehicle.name', $selectedForm->report_vehicle['name'] ?? $form->report_vehicle['name'] ?? '') }}">
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="contact_number">Contact Number</label>
                                                            <input type="text" class="form-control" id="contact_number" name="report_vehicle[contact_number]"
                                                                   value="{{ old('report_vehicle.contact_number', $selectedForm->report_vehicle['contact_number'] ?? $form->report_vehicle['contact_number'] ?? '') }}">
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="email">Email</label>
                                                            <input type="text" class="form-control" id="email" name="report_vehicle[email]"
                                                                   value="{{ old('report_vehicle.email', $selectedForm->report_vehicle['email'] ?? $form->report_vehicle['email'] ?? '') }}">
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
