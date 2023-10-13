@extends('frontpage.layout')

@section('style')
    <style>
        .is_app_top .flight__onewaysection {
            padding-top: 20px!important;
        }
    </style>
@endsection

@section('content')

    @if(!is_app())
        @include('frontpage.partials.layout.header')
    @endif


    <!-- hotel list here -->
    <section class="flight__onewaysection pb__60 pt__60-" style="padding-top: 90px">

        <div class="container">


            <div class="row g-4 justify-content-center mt-3">


                <div class="col-xxl-8 col-xl-8 col-lg-8">


                    <div class="car__driverdetails mb__40">
                        <div class="p-2">

                            <div class="d-flex justify-content-between">
                                <p class="text-heading">Your car rental booking payment</p>


                            </div>
                            <div class="mt-3">
                                <p>
                                    You're all set! proceed with payment
                                </p>
                            </div>

                            <div class="row">
                                @foreach(payment_methods() as $item)
                                    <a href="{{ route('payment.process') }}?payment_method={{ $item }}&&booking_id={{ $booking->id }}">
                                        <div class="bg-primary col-md-3 col-12 p-3  mt-3 border-radius-10">
                                            <p class="text-capitalize">{{ $item }} payment</p>
                                            <div class="d-flex mt-4">
                                                <img width="100%" src="{{ payment_method_icon($item) }}" /><p class="mx-3"></p>
                                            </div>
                                        </div>
                                    </a>

                                @endforeach

                            </div>

                        </div>

                    </div>








                </div>


                <div class="col-xl-4 col-lg-4">
                    <div class="hotel__confirm__invocie bg-primary mt-4- car__confirmdetails__right">
                        <p class="text-heading">Car price breakdown</p>
                        <div class="carferrari__item flex-wrap mt-3 align-items-center-">
                            <div class="carferrari__content">
                                <div class="d-flex justify-content-between">
                                    <p class="m2">Booking fee</p>
                                    <p class="">{{ amt($booking->fee) }}</p>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <p class="m2">Tax</p>
                                    <p class="">{{ amt($booking->tax) }}</p>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <p class="m2">Insurance fee</p>
                                    <p class="">{{ amt($booking->insurance_fee) }}</p>
                                </div>

                                <div class="d-flex mt-2 justify-content-between">
                                    <p class="m2">Grand total</p>
                                    <p class="text-heading">{{ amt($booking->grand_total) }}</p>
                                </div>


                                <div class="d-flex mt-2 justify-content-between">
                                    <p class="m2">Payment status</p>
                                    <p class="text-heading">{{ $booking->payment_status }}</p>
                                </div>


                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>



    </section>



@endsection
