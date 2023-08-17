@extends('frontpage.layout')


@section('content')

    @if(!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif


    <!-- hotel list here -->
    <section class="flight__onewaysection pb__60 pt__60">

        @include('frontpage.components.home_booking')


        <div class="container">

            <div class="row ">

                <div class="d-flex booking_stage align-items-center justify-content-between">
                    <div>
                        <a href="javascript:void(0)" class="cmn__btn">
                            <img src="/assets/img/icons/deal.png"><span class="mx-3">Your deal</span>
                        </a>
                    </div>
                    <div>
                        <img src="/assets/img/icons/dot.png" />
                    </div>

                    <div>
                        <a href="javascript:void(0)" class="btn-white">
                            <img src="/assets/img/icons/shield.png"><span class="mx-3">Protection option</span>
                        </a>
                    </div>
                    <div>
                        <img src="/assets/img/icons/dot.png" />
                    </div>

                    <div>
                        <a href="javascript:void(0)" class="btn-white">
                            <img src="/assets/img/icons/cart.png"><span class="mx-3">Checkout</span>
                        </a>
                    </div>

                </div>
            </div>

            <div class="row g-4 justify-content-center mt-3">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="alert alert-success alert-dismissible mb-4">
                        <p>Free Cancellation up to 48 hours before pick-up</p>
                    </div>

                    <div class="carferrari__item mb__30 car_item d-flex-  bgwhite p-3">
                        <div class="row- d-flex p__10 align-items-center car_section">
                            <a href="#0" class="thumb">
                                <img src="assets/img/cars/big_car.png" alt="cars">
                            </a>
                            <div class="carferrari__content">
                                <div class="d-flex- carferari__box justify-content-between">

                                    <div class="row">
                                        <div class="col-12">
                                            <p><span class="text-title">Fiat 500 </span>or similar car</p>
                                        </div>

                                        <div class="col-6 mt-2">
                                            <p><img src="/assets/img/icons/profile.png" />
                                                4 seats </p>
                                        </div>

                                        <div class="col-6 mt-2">
                                            <p><img src="/assets/img/icons/gear.png" />
                                                Manual</p>
                                        </div>

                                        <div class="col-6 mt-2">
                                            <p><img src="/assets/img/icons/bag.png" />
                                                1 large bag</p>
                                        </div>

                                        <div class="col-6 mt-2">
                                            <p><img src="/assets/img/icons/signpost.png" />
                                                300 miles per rental</p>
                                        </div>

                                        <div class="col-6 mt-3">
                                            <p class="text-primary">Heathrow Airport</p>
                                            <p class="mt-2">Shuttle Bus</p>
                                        </div>


                                        <div class="col-6 mt-3">
                                            <p>Price for {{ request()->query('booking_day') }}days</p>
                                            <p class="mt-2 text-title">{{ amt(request()->query('booking_day') * $car->price_per_day) }}</p>
                                        </div>

                                        <div style="height: 50px"></div>


                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <div class="">
                                <div class="d-flex align-items-center justify-content-center">
                                    <img src="assets/img/icons/compony.png" alt="cars">
                                    <div class="review_count">
                                        7.7
                                    </div>
                                    <div class="review_text">
                                        <p>Good</p>
                                        <p>30 reviews</p>
                                    </div>
                                </div>
                            </div>


                            <div class="">
                                <div class="d-flex align-items-center justify-content-center">
                                    <img src="assets/img/icons/info.png" class="mx-3" alt="cars">
                                    <p class="text-primary">Important info</p>
                                </div>
                            </div>
                        </div>

                        <div class="row- car_info mt-2">
                            <div class="col-12 mt-4 mb-3">
                                <p class="text-heading">Great choice</p>
                            </div>

                            <div class="row">
                                @foreach($car->why as $i)
                                <div class="col-6 d-flex mt-1">
                                    <img src="/assets/img/icons/star.png" />
                                    <p>{{ $i }}</p>
                                </div>
                                @endforeach
                            </div>

                            <div class="col-12 mt-4 mb-3">
                                <p class="text-heading">Included in the price</p>
                            </div>

                            <div class="row">
                                @foreach($car->includes as $i)
                                <div class="col-12 d-flex mt-1">
                                    <img src="/assets/img/icons/star.png" />
                                    <p>{{ $i }}</p>
                                </div>
                                @endforeach
                            </div>

                        </div>

                    </div>


                    <div class="justify-content-end">
                        <a href="{{ url('protection_option') }}?{{ http_build_query( request()->query()) }}" class="cmn__btn">
                                               <span>
                                                 Continue to book
                                               </span>
                        </a>
                    </div>



                </div>
                @include('frontpage.partials.car_booking.checkout_right')
            </div>
        </div>

    </section>


    <section class="flight__onewaysection">
        <div class="container p-5">
        <div class="hotelbooking__categoris__wra">

            <div class="dating__body text-center">
                <p class="text-title">save time, save money!</p>
                <p class="text-center my-4">sign up and we'll send the best deals to you</p>
                <div class="row">
                    <div class="col"></div>
                    <div class="col text-center ps-5 "> <div class="input">
                            <p class="px-3 text-center">exampls@gmail.com <span> <button class=" ms-5 btn btn_style">Subscribe</button></span></p>
                        </div></div>
                    <div class="col"></div>
                </div>

            </div>
        </div>
    </div>
    </section>


@endsection
