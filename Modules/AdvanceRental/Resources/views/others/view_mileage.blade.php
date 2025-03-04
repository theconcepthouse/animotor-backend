@extends('admin.layout.app')
@section('content')

     <style>
        .nk-sidebar{
            display: none;
        }
        .nk-header {
            display: none;
        }
    </style>

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
                                     <a href="{{ route('booking.view', $booking->id) }}" wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                    <a href="{{ route('booking.view', $booking->id) }}" wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>

                                </div>
                            </div>
                            <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">

                                            <form action="{{ route('storeMileage') }}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif

                                                <input type="hidden" name="car_id" value="{{ $booking->car_id }}">
                                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">


                                                <div class="container mt-4 ">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Initial Mileage Details</h4>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                        <label for="last_recorded_mileage">Initial mileage</label>
                                                        <input style="background-color: #eae7e7" type="text" class="form-control" id="last_recorded_mileage"
                                                               value="{{ $form['charges']['milage_limit_value'] ?? '' }}" readonly>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="submitted_by">Submitted by</label>
                                                        <input style="background-color: #eae7e7" type="text" class="form-control" id="submitted_by"
                                                               value="ANI-Motor"  readonly>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="submission_date">Submission date</label>
                                                        <input style="background-color: #eae7e7" type="text" class="form-control" id="submission_date"
                                                               value="{{  $form?->updated_at->format('d-M-Y') ?? '' }}" readonly>
                                                    </div>
                                                    </div>
                                                    <br>

                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Customer Recorded Mileage Details</h4>
                                                    </div>

                                                    <div class="row">
                                                        <div class="row">
                                                      <div class="form-group col-md-4">
                                                        <label for="last_recorded_mileage">Last recorded mileage (Total Mileage:
{{--                                                            <span class="text-danger">{{ $form['charges']['milage_limit_value'] + $sum_mileage }}</span>)</label>--}}
                                                        <input type="text" class="form-control" id="last_recorded_mileage"
                                                               name="mileage[last_recorded_mileage]"
                                                               value="{{ old('mileage.mileage', $mileage->mileage['mileage'] ?? '') }}" readonly>
                                                            <small class="text-info">This field will auto-fill</small>
                                                     </div>
{{--                                                      <input type="hidden" name="mileage[total_mileage]" value="{{ optional($form['charges']['milage_limit_value'] + $sum_mileage)?? '' }}">--}}
                                                    <div class="form-group col-md-4">
                                                        <label for="submitted_by">Submitted by</label>
                                                        <input type="text" class="form-control" id="submitted_by"
                                                               name="mileage[submitted_by]"
                                                               value="{{ $booking?->customer->fullname() ?? '' }}"  readonly>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="submission_date">Submission date</label>
                                                        <input type="text" class="form-control" id="submission_date"
                                                               value="{{ $mileage?->created_at->format('d-M-Y') ?? 'Not Set' }}" readonly>
                                                        <small class="text-info">This field will auto-fill</small>
                                                    </div>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="enter_mileage">Enter Current Mileage</label>
                                                        <input type="text" class="form-control" id="enter_mileage"
                                                               name="mileage[mileage]" required>
                                                    </div>
                                                    <div class="col-md-5 col-sm-6">
                                                        @include('admin.partials.image-upload', [
                                                            'field' => 'mileage[image]',
                                                            'image' => $mileage->mileage['image'] ?? '',
                                                            'id' => 'file' . Str::uuid(),
                                                            'title' => 'Upload Image',
                                                            'colSize' => 'col-md-8 col-sm-6',
                                                            ])
                                                    </div>
                                                </div>

                                                </div>

                                                <div class="form-group mt-4 text-center">
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
