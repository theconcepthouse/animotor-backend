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
                                    <h4 class="title nk-block-title">Return Vehicle Form</h4>
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


                                                <div class="container mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Bodywork Detail</h4>
                                                    </div>

                                                    <div class="row">
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
