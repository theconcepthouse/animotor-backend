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
                                <p class="text-heading">Your car rental booking</p>

                                <p class="">
                                    <a href="{{ route('voucher',['id' => $booking->id]) }}">
                                        <img src="/assets/img/icons/document.png" />
                                        Access your voucher
                                    </a>
                                </p>

                            </div>
                            <div class="mt-3">
                                <p>
                                    You're all set! We've sent your confirmation email to
                                    <strong>{{ $booking?->customer?->email }}</strong>
                                </p>
                            </div>

                            <div class="row">
                                <div class="bg-primary col-md-3 col-12 p-3  mt-3 border-radius-10">
                                    <p>Booking number</p>
                                    <div class="d-flex mt-4">
                                        <img src="/assets/img/icons/copy.png" /><p class="mx-3">{{ $booking->booking_number }}</p>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="carferrari__item mb__30 car_item d-flex-  bgwhite p-3">

                        <div style="border-bottom: 0" class="row d-flex p__10 align-items-center car_section">
                            <a href="#0" class="thumb col-sm-12 col-md-5">
                                <img src="{{ $booking?->car?->image }}" alt="cars" />
                            </a>
                            <div class="carferrari__content col-md-6 col-sm-12">
                                <div class="d-flex- carferari__box justify-content-between">

                                    <div class="row">
                                        <div class="col-12">
                                            <p><span class="text-title">{{ $booking->car->title }} </span>or similar car</p>
                                        </div>

                                        <div class="col-6 mt-2">
                                            <p><img src="/assets/img/icons/profile.png" />
                                                {{ $booking->car->seats }} Seats </p>
                                        </div>

                                        <div class="col-6 mt-2">
                                            <p><img src="/assets/img/icons/gear.png" />
                                                {{ $booking->car->gear }}</p>
                                        </div>

                                        <div class="col-6 mt-2">
                                            <p><img src="/assets/img/icons/bag.png" />
                                                {{ $booking->car->bags ?? '1 large bag' }}</p>
                                        </div>

                                        <div class="col-6 mt-2">
                                            <p><img src="/assets/img/icons/signpost.png" />
                                                {{ $booking->car->mileage }} miles per rental</p>
                                        </div>

                                        <div class="col-6 mt-3">
                                            <p class="text-primary">{{ $booking->car?->pick_up_location ?? 'Pick-up Not set' }}</p>
                                            <p class="mt-2">{{ $booking->car?->type }}</p>
                                        </div>


                                        <div class="col-6 mt-3">
                                            <p>Price for {{ $booking->days }}days</p>
                                            <p class="mt-2 text-title">{{ amt($booking->fee) }}</p>
                                        </div>

                                        <div style="height: 50px"></div>


                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>


                    <div class="car__driverdetails mb__40">
                        <div class="p-3">
                            <div class="d-flex justify-content-between">
                                <p class="text-heading">What you need at pick-up</p>
                            </div>
                            <div class="mt-3">

                                @foreach($booking->car->requirements() as $i)
                                    <p class="text-capitalize">
                                        {{ $i }}
                                    </p>
                                @endforeach

                            </div>


                        </div>

                    </div>
                    <div class="car__driverdetails mb__40">
                        <div class="p-3">
                            <div class="d-flex justify-content-between">
                                <p class="text-heading">Your car rental booking</p>
                            </div>
                            <div class="mt-3">
                                <p>
                                    <strong>This is vital:</strong> If you don't have everything you need,
                                    the counter staff will not be able to give you the car. Don't get caught out
                                </p>
                            </div>


                        </div>

                    </div>
                    <div class="car__driverdetails mb__40">
                        <div class="p-3">

                            <div class="d-flex justify-content-between">
                                <p class="text-heading">Your car rental instruction</p>
                            </div>

                                <div style="gap: 20px 35px;" class=" flex-wrap mt-5 d-flex align-items-center-">

{{--                                    <img style="height: 100%" src="/assets/img/icons/dot_v.png">--}}
                                    <div class="carferrari__content">
                                        <p class="m2">{{ $booking->pick_up_date.', '.$booking->pick_up_time }}</p>
                                        <p class="mt-1">{{ $booking->pick_location }}</p>
                                        <p class="mt-2"><a href="#" data-bs-toggle="modal" data-bs-target="#pickup_instructions">View pick-up instructions</a> </p>

                                        <p class="mt-2">{{ $booking->drop_off_date.', '.$booking->drop_off_time }}</p>
                                        <p class="mt-1">{{ $booking->drop_off_location }}</p>
                                        <p class="mt-2"><a href="#" data-bs-toggle="modal" data-bs-target="#dropoff_instructions">View Drop-off instructions</a> </p>
                                    </div>
                                </div>

                        </div>

                    </div>

                    <div class="car__driverdetails mb__40">
                        <div class="p-3">
                            <div class="d-flex justify-content-between">
                                <p class="text-heading">Driver details</p>
{{--                                <p><a href="">Edit details</a></p>--}}
                            </div>
                            <div class="mt-3">
                                <p>Main Driver</p>
                                <p class="mt-3 mb-3 text-capitalize">
                                    <img class="mx-3" src="{{ $booking?->customer?->avatar }}" height="30" width="30">
                                    <strong>{{ $booking?->customer?->name }}</strong>
                                </p>
                                <p>{{ $booking?->customer?->email }}</p>
                            </div>


                        </div>

                    </div>

                    <div class="car__driverdetails mb__40">
                        <div class="p-3">
                            <div class="d-flex justify-content-between">
                                <p class="text-heading">Term and Conditions</p>
                                <p><a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">View {{ settings('site_name') }} rental terms</a></p>

                            </div>
                            <div class="mt-3">
                                <p>
                                    Your car doesn't come with any additional protection. Why not check out our insurance package?
                                </p>
                            </div>


                        </div>

                    </div>


                    <div class="car__driverdetails mb__40">
                        <div class="d-flex justify-content-between">
                            <p class="text-heading">Most Popular</p>
                            <p><a href="/terms">See all frequently questions</a></p>
                        </div>

                        <div class="accordion mt-5" id="accordionExample">


                            <!--Accordion items-->
                            <div class="accordion-item wow fadeInUp" data-wow-duration="0.9s" style="visibility: visible; animation-duration: 0.9s; animation-name: fadeInUp;">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button text-capitalize" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        The Car’s excess
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                        <p>

                                            {{ $booking?->car?->damage_excess }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--Accordion items-->
                            <div class="accordion-item wow fadeInUp" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Security Deposit Information
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                        <p>
                                            {!! $booking?->car?->security_deposit !!}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item wow fadeInUp" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
                                <h2 class="accordion-header" id="heading3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapseTwo">
                                        Mileage Information
                                    </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                        <p>
                                            {!! $booking?->car?->mileage_text !!}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>





                    {{--    </form>--}}




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
                    <div class="hotel__confirm__invocie bg-primary mt-4 car__confirmdetails__right">
                        <p class="text-heading">Manage booking</p>
                        <div class="carferrari__item flex-wrap mt-2 align-items-center-">
                            <div class="carferrari__content">
                                <p class="mt-2"><img class="me-3" src="/assets/img/icons/card.svg" />Request proof of purchase</p>
                                <p class="mt-2"><img class="me-3" src="/assets/img/icons/card-edit.png" />Amend Booking</p>
                                <p class="mt-2"><img class="me-3" src="/assets/img/icons/cancel.png" />Cancel Booking</p>


                            </div>
                        </div>

                    </div>
                    <div class="hotel__confirm__invocie bg-primary mt-4 car__confirmdetails__right">
                        <p class="text-heading">Need some help?</p>
                        <div class="carferrari__item flex-wrap mt-2 align-items-center-">
                            <div class="carferrari__content">
                                <p class="mt-2"><img class="me-3" src="/assets/img/icons/message.png" />Help Centre</p>
                                <p class="mt-2">Useful answers to common questions</p>
                                <p class="mt-2">Find an answer</p>


                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>


        @include('frontpage.partials.terms_modal')


        <div class="modal fade" id="pickup_instructions">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Pick-up instruction</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Accordion -->
                        <p>
                            {!! $booking?->car?->pickup_instruction !!}
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="dropoff_instructions">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Drop-off instruction</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Accordion -->
                        <p>
                            {!! $booking?->car?->drop_off_instruction !!}
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


    </section>


    @if(!is_app())
        @include('frontpage.components.subscribe')
    @endif


@endsection
