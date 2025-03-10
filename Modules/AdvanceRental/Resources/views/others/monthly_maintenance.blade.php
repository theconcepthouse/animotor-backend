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
                                    <h4 class="title nk-block-title">Monthly Maintenance</h4>
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

                                             <form action="{{ route('storeMonthlyMaintenance') }}" method="POST" enctype="multipart/form-data">
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



                                                <div class="container mt-4">
{{--                                                    <div class="mb-4">--}}
{{--                                                        <h4 class="title nk-block-title">Monthly Maintenance</h4>--}}
{{--                                                    </div>--}}

                                                   <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="inspection_mileage">Inspection mileage</label>
                                                        <input type="text" class="form-control" id="inspection_mileage"
                                                               name="inspection[inspection_mileage]" value="">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inspection_date">Inspection date</label>
                                                        <input type="date" class="form-control" id="inspection_date"
                                                               name="inspection[inspection_date]" value="">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="last_inspection_mileage">Last inspection mileage</label>
                                                        <input type="text" class="form-control" id="last_inspection_mileage"
                                                               name="inspection[last_inspection_mileage]" value="">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="last_inspection_date">Last inspection date</label>
                                                        <input type="date" class="form-control" id="last_inspection_date"
                                                               name="inspection[last_inspection_date]" value="">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="last_service_mileage">Last service mileage</label>
                                                        <input type="text" class="form-control" id="last_service_mileage"
                                                               name="inspection[last_service_mileage]" value="">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="last_service_date">Last service date</label>
                                                        <input type="date" class="form-control" id="last_service_date"
                                                               name="inspection[last_service_date]" >
                                                    </div>
                                                    <div class="col-md-5 col-sm-6">
                                                        @include('admin.partials.image-upload', [
                                                            'field' => 'inspection[odometer_picture]',
                                                            'image' => '',
                                                            'id' => 'file' . Str::uuid(),
                                                            'title' => 'Odometer picture',
                                                            'colSize' => 'col-md-10 col-sm-6',
                                                        ])
                                                    </div>
                                                </div>

                                                    <div class="form-group text-center mt-3">
                                                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                                    </div>
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
