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
                                    <h4 class="title nk-block-title">Submit Mileage</h4>
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
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Mileage Details</h4>
                                                    </div>

                                                    <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="last_recorded_mileage">Last recorded mileage</label>
                                                        <input type="text" class="form-control" id="last_recorded_mileage"
                                                               name="mileage[last_recorded_mileage]"
                                                               value="{{ old('mileage.last_recorded_mileage', $selectedForm->mileage['last_recorded_mileage'] ?? $form->mileage['last_recorded_mileage'] ?? '') }}" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="submitted_by">Submitted by</label>
                                                        <input type="text" class="form-control" id="submitted_by"
                                                               name="mileage[submitted_by]"
                                                               value="{{ old('mileage.submitted_by', $selectedForm->mileage['submitted_by'] ?? $form->mileage['submitted_by'] ?? '') }}" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="submission_date">Submission date</label>
                                                        <input type="date" class="form-control" id="submission_date"
                                                               name="mileage[submission_date]"
                                                               value="{{ old('mileage.submission_date', $selectedForm->mileage['submission_date'] ?? $form->mileage['submission_date'] ?? '') }}" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="enter_mileage">Enter mileage</label>
                                                        <input type="text" class="form-control" id="enter_mileage"
                                                               name="mileage[enter_mileage]"
                                                               value="{{ old('mileage.enter_mileage', $selectedForm->mileage['enter_mileage'] ?? $form->mileage['enter_mileage'] ?? '') }}" >
                                                    </div>
                                                    <div class="col-md-5 col-sm-6">
                                                        @include('admin.partials.image-upload', [
                                                            'field' => 'mileage[image]',
                                                            'image' => $selectedForm->mileage['image'] ?? '',
                                                            'id' => 'file' . Str::uuid(),
                                                            'title' => 'Upload Image',
                                                            'colSize' => 'col-md-8 col-sm-6',
                                                            ])
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
