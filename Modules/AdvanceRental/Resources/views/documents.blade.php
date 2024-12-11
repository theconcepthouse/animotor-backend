@extends('frontpage.layout')


@section('content')

    @if(!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif


    @php
        $inspection_keys = [
        'inspection_mileage',
        'inspection_date',
        'last_inspection_mileage',
        'last_inspection_date',
        'last_service_mileage',
        'last_service_date',
        'your_adometer_or_mileage_picture',
        ];

    @endphp


    <section class="signup__section bluar__shape__ form_border_10">
        <div class="container ">
            <div class="row align-items-center justify-content-between">


                <div class="col-12 d-flex justify-content-between align-items-center mb-3">
                    <div style="height: 60px" class="vehicle w-100 p-3 d-flex align-items-center  rounded">
                        <!-- Back Arrow -->
                        <a href="javascript:history.back()" class="text-dark text-decoration-none me-3">
                            <i class="far fa-arrow-alt-circle-left fs-5"></i>
                        </a>

                        <!-- Centered Content -->
                        <div class="d-flex justify-content-center w-100">
                            <div class="registration-container me-2">
                                <span class="registration-number bg-warning text-dark fs-6 fw-bold px-3 py-1 rounded">
                                    {{ $booking?->car?->registration_number }}
                                </span>
                            </div>
                            <h6 class="vehicle_name mb-0 fw-bold">
                                {{ $booking?->car?->title }}
                            </h6>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 mt-5">
                    <h5>Inspections</h5>

                    <div class="row">
                        @if(count($inspections) > 0)
                            @foreach($inspections as $item)
                            <div class="col-6 inspection_item shadow p-3">
                                <div class="d-flex justify-content-between">
                                    <p>Status</p>
                                    <p class="btn btn-round {{ $item->status == 'completed' ? 'btn-success' : 'btn-warning' }}">{{ $item->status }}</p>
                                </div>
                                @foreach($item->inspections as $value => $key)
                                <div class="d-flex justify-content-between mt-2">
                                    <p>{{ convertToWord($value) }}</p>
                                    @if($value == 'your_adometer_or_mileage_picture')
                                        <img src="{{ $key }}" height="30px" />
                                    @else
                                        <p>{{ $key }}</p>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        @else
                            <p class="mt-5">No submitted inspection for this booking</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    @include('advancerental::partials.upload')
@endsection
