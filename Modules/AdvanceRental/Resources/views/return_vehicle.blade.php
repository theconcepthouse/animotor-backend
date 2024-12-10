@extends('frontpage.layout')


@section('content')

    @if(!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif


    <section class="pt-120 pb-120 booking_view ">
        <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 mx-auto">
                <form method="post" action="{{ route('vehicle_return.store') }}">

                    @csrf



                    <input name="booking_id" type="hidden" value="{{ $booking->id }}" />
                    <input name="car_id" type="hidden" value="{{ $booking->car_id }}" />

                    <div class="row">

{{--                        <div class="col-12 d-flex justify-content-center mb-3">--}}
{{--                            <div class="vehicle p-3 d-flex align-items-center justify-content-center">--}}
{{--                                 <a style="margin-left: 40px" href="javascript:history.back()" class="text-dark text-decoration-none">--}}
{{--                                    <i class="fas fa-arrow-circle-left fs-4"></i>--}}
{{--                                </a>--}}
{{--                                <div class="registration-container me-2">--}}
{{--                                    <span class="registration-number">--}}
{{--                                        {{ $booking?->car?->registration_number }}--}}
{{--                                    </span>--}}
{{--                                </div>--}}
{{--                                <h6 class="vehicle_name">{{ $booking?->car?->title }}</h6>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-12 d-flex justify-content-between align-items-center mb-3">
                        <div class="vehicle w-100 p-3 d-flex align-items-center  rounded">
                            <!-- Back Arrow -->
                            <a href="javascript:history.back()" class="text-dark text-decoration-none me-3">
                                <i class="fas fa-arrow-circle-left fs-5"></i>
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


                        <div class="col-12 justify-content-center mt-5 text-center">
                            <h4>Choose return date and time</h4>

                            <p class="{{ $booking?->completed ? 'btn btn-success' : 'btn-warning btn' }} mt-3">{{ $return?->status ?? '' }}</p>
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

                        @include('frontpage.components.form.text', ['attributes' => 'required', 'type' => 'datetime-local',  'value' => $return?->return_date_time, 'colSize' => 'col-md-12 mt-4', 'fieldName' => 'return_date_time','title' => 'Return date & time'])
                        @include('frontpage.components.form.textarea', ['attributes' => 'required', 'value' => $return?->reason, 'colSize' => 'col-md-12 mt-4', 'fieldName' => 'reason','title' => 'Return Reason'])

                        <div class="col-lg-12">
                            <div class="d-flex justify-content-center">
                                <div class="input__grp input_btn mt-3">
                                    <button type="submit" class="cmn__btn btn_rounded">
                               <span>
                                 Next
                               </span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

            </div>

        </div>
        </div>
    </section>


@endsection
