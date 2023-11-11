@extends('frontpage.print_layout')


@section('content')

    <section class="voucher_page_banner">
        <div class="container pt-5">
        <h2 class="text-white mt-3">Rental Voucher</h2>
        </div>
    </section>

    <!-- hotel list here -->
    <section class="flight__onewaysection pb__60 pt__60-" style="padding-top: 10px">

        <div class="container">


            <div class="row g-4 justify-content-center mt-3">


                <div class="col-xxl-7 col-xl-7 col-lg-7">


                    <div class="car__driverdetails- mb__40">
                        <div class="p-2">
                            <div class="d-flex justify-content-between ">
                                <p>Booking No: <span class="heading  text-bold">{{ $booking->booking_number }}</span></p>
                                <p>Date : {{ $booking->created_at->format('Y/m/d') }}</p>
                            </div>


                            <div class="mt-5">
                                <div class="voucher_title d-inline-block">
                                    <p>To the  {{ settings('site_name') }} Rental Desk</p>
                                </div>

                                <div class="d-flex justify-content-between mt-3">
                                    <p class="text-bold">Main Driver</p>
                                    <p>{{ $booking?->customer?->name }}</p>
                                </div>

{{--                                <div class="d-flex justify-content-between mt-3">--}}
{{--                                    <p class="text-bold">Rate code</p>--}}
{{--                                    <p>{{ $booking?->customer?->name }}</p>--}}
{{--                                </div>--}}


                                <div class="d-flex justify-content-between mt-3">
                                    <p class="text-bold">Account ID</p>
                                    <p>{{ $booking?->customer?->email }}</p>
                                </div>

                                <div class="d-flex justify-content-between mt-3">
                                    <p class="text-bold">Confirmation number</p>
                                    <p>{{ $booking?->booking_number }}</p>
                                </div>


                            </div>

                            <div class="mt-5">
                                <div class="voucher_title d-inline-block">
                                    <p>Important Information</p>
                                </div>


                                <div class="d-flex justify-content-between mt-3">
                                    <p>Grand total</p>
                                    <p>
                                        {{ amt($booking->grand_total) }}
                                    </p>
                                </div>

                                <div class="d-flex- justify-content-between- mt-3">
                                    <p class="heading text-bold">Mileage / Kilometres</p>
                                    <p>
                                        {!! $booking?->car?->mileage_text !!}
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>


                </div>


                <div class="col-xl-5 col-lg-5">


                    <div class="car__driverdetails- mb__40">
                        <div class="p-2">
                            <div class="mt-5">
                                <div class="voucher_title d-inline-block">
                                    <p>Trip Details</p>
                                </div>

                                <div class="d-flex justify-content-between mt-3">
                                    <div>
                                        <p class="text-bold">Pick-up</p>
                                        <p class="mt-4">{{ $booking?->pick_up_date }}  {{ $booking->pick_up_time ?? ' at '.$booking->pick_up_time }}</p>

                                        <p class="mt-4">{{ $booking?->pick_location }} </p>
                                    </div>

                                    <div>
                                        <p class="text-bold">Drop-off</p>
                                        <p class="mt-4">{{ $booking?->drop_off_date }}  {{ $booking->drop_off_time ?? ' at '.$booking->drop_off_time }}</p>

                                        <p class="mt-4">{{ $booking?->drop_off_location }} </p>
                                    </div>

                                </div>



                            </div>

                            <div class="mt-5">
                                <div class="voucher_title d-inline-block">
                                    <p>Car Hire Company</p>
                                </div>


                                <div class="d-flex-justify-content-between mt-3">
                                    <p class="text-bold heading">Name </p>
                                    <p>{{ $booking?->car?->company?->name }}</p>
                                </div>
                                <div class="d-flex- -justify-content-between mt-3">
                                    <p class="text-bold heading">Address</p>
                                    <p>{{ $booking?->car?->company?->address }}</p>
                                </div>
                                <div class="d-flex-justify-content-between mt-3">
                                    <p class="text-bold heading">Tel</p>
                                    <p>{{ $booking?->car?->company?->contact_phone }}</p>
                                </div>
                                <div class="mt-5">
                                    <p class="text-bold heading">Pick-up instructions</p>
                                    <p>
                                        {!! $booking?->car?->pickup_instruction !!}
                                    </p>
                                </div>

                                <div class="mt-3">
                                    <p class="text-bold heading">Drop-off Instructions</p>
                                    <p>The procedure for returning the vehicle will be explained to you at the rental counter.</p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="col-12">
                    <div class="d-block" style="">
                        <div class="d-inline-block voucher_title">
                            <p>Vehicle Information</p>
                        </div>


                        <div class="">
                            <p class="heading text-bold text-capitalize">{{ $booking?->car?->title }}</p>

                            <p>{{ $booking?->car?->seat }} Seats</p>
                            <p>{{ $booking?->car?->door }} Doors</p>
                            <p>{{ $booking?->car->gear }} Transmission</p>

                        </div>

                        <div class="d-flex- justify-content-between- mt-3">
                            <p class="heading text-bold">Insurance information All rental cars must have Collision Damage Waiver (CDW) and Theft Protection (TP). Each policy will be either:</p>
                            <p class="ms-4">included or</p>
                            <p class="ms-4">purchasable from the rental company, or</p>
                            <p class="ms-4">provided by your credit card company.</p>

                            <p class="mt-4">If the car’s bodywork gets damaged, the most you’ll pay towards repairs
                                covered by the Collision Damage Waiver is the damage excess.
                                This cover is only valid if you stick to the terms of the rental agreement.
                                It doesn’t cover other parts of the car (e.g. glass, wheels, interior, roof or undercarriage),
                                or charges (e.g. for towing or off-road time),
                                or anything in the car (e.g. child seats, GPS devices or personal belongings).</p>

                            <p class="mt-4">
                                If the car is stolen, the most you’ll pay towards replacement costs covered by the policy is the theft excess.
                                This cover is only valid if you stick to the terms of the rental agreement.
                            </p>
                            <p class="mt-4">
                                Covers the driver’s liability for any injuries and property damage that are included in the policy. It does not cover injuries to the driver or damage to the rental car.
                                This cover is only valid if you stick to the terms of the rental agreement.
                            </p>
                            <p class="mt-4">
                                If the car is stolen, or seriously damaged, or damaged in an incident involving someone else, please contact the rental company and the police immediately. If you can't provide the necessary documents from the police, you'll be liable for the full cost of replacing/repairing the car. If the car gets slightly damaged,
                                and no-one else is involved, please contact the rental company immediately.
                            </p>
                            <p class="mt-4">
                                The rental company is not liable for the loss of / theft of /
                                damage to any belongings in the car, during or after the rental.
                            </p>
                            <p class="mt-4">
                                Damage to the car will be charged for by the car hire company after it is dropped off - and will incur a Damage Administration fee on top of the amount deducted from the excess.
                            </p>
                        </div>

                        <div class="d-inline-block voucher_title mt-5">
                            <p>What you need at Pick-up</p>
                        </div>

                        <div>
                            <p class="heading text-bold">License</p>
                            <p>The main driver and any additional drivers will need to provide a full driving licence in their name.
                                It is each driver’s responsibility to find out what paperwork they need before driving in another country.
                                For example, you may need a visa and/or International Driving Permit as well as your driving licence.
                                Each driver will need to provide a valid driving licence. If it is written in non-Latin characters, they'll also need to provide a valid International Driving Permit or a certified translation. Any driver with a driving
                                licence from outside Europe is advised to have an International Driving Permit as well.</p>
                        </div>
                        <div class="mt-5">
                            <p class="heading text-bold">Identification</p>
                            <p>At the counter, you'll need to provide:</p>
                            <p>Each driver's full, valid driving licence</p>
                            <p>Your rental voucher</p>
                        </div>


                        <div class="d-inline-block voucher_title mt-5">
                            <p>Help on the road</p>
                        </div>

                        <div>

                            <p>
                                If you are having any problems with your hire car, please call Greenmotion on +441612600420. <br/>
                                If you need any other support during your rental, please call us on 0161 602 5400.
                            </p>
                        </div>
                        <div>
                            <p class="heading text-bold mt-5">Excess Information</p>
                            <p> The car has a damage excess of £ 1,205.00 including tax.</p>
                            <p> The car has a theft excess of £ 1,205.00 including tax.</p>

                            <p class="mt-5">
                                This Rental Voucher contains the most important information about your booking.
                                For further details please refer to the confirmation email
                                sent to your registered email address or login to your account at {{ settings('site_name') }}
                            </p>
                        </div>


                    </div>

                </div>

            </div>
        </div>

    </section>

    <div class="voucher_page_footer_bg">

    </div>

@endsection
