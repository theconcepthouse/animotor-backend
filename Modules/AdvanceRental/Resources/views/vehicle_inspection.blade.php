@extends('frontpage.layout')


@section('content')

    @if(!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif


    @php
        $form = [
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


                <div class="col-12 justify-content-center d-flex mb-3">
                    <h3 class="vehicle_name mt-3 text-center">Inspection</h3>
                </div>


                <div class="col-md-12">

                    <form method="post" action="{{ route('vehicle_inspection.store') }}" class="signup__form password__box pt__40">

                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ formatArrayError($error,'inspections.') }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        <div class="row g-4">

                            <input type="hidden" name="car_id" value="{{ $booking->car_id }}">
                            <input type="hidden" name="booking_id" value="{{ $booking->id }}">


                            @foreach($form as $item)
                                @if($item == 'your_adometer_or_mileage_picture')
                                    @include('admin.partials.image-upload',['field' => "inspections[$item]",'id' => "inspections_$item", 'colSize' => 'col-md-12', 'title' => 'Please upload '.convertToWord($item)])
                                @else
                                    @include('frontpage.components.form.text', ['type' => in_array($item,['inspection_date','last_inspection_date','last_service_date'])  ? 'date' : 'number', 'colSize' => 'col-md-6', 'fieldName' => "inspections[$item]",'title' => convertToWord($item)])
                                @endif
                            @endforeach


                            <div class="col-lg-12">
                                <div class="input__grp mt-3">
                                    <button type="submit" class="cmn__btn">
                               <span>
                                  Submit inspection
                               </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    @include('advancerental::partials.upload')
@endsection
