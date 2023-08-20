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
                    <div class=" d-none d-md-block">
                        <a href="javascript:void(0)" class="btn-white">
                            <img src="/assets/img/icons/check.png"><span class="mx-3">Your deal</span>
                        </a>
                    </div>
                    <div class=" d-none d-md-block">
                        <img src="/assets/img/icons/dot.png" />
                    </div>

                    <div class="">
                        <a href="javascript:void(0)" class="cmn__btn">
                            <img class="text-white" src="/assets/img/icons/shield.png"><span class="mx-3">Protection option</span>
                        </a>
                    </div>
                    <div class=" d-none d-md-block">
                        <img src="/assets/img/icons/dot.png" />
                    </div>

                    <div class=" d-none d-md-block">
                        <a href="javascript:void(0)" class="btn-white">
                            <img src="/assets/img/icons/cart.png"><span class="mx-3">Checkout</span>
                        </a>
                    </div>

                </div>
            </div>

            <div class="row g-4 justify-content-center mt-3">
                <div class="col-xxl-8 col-xl-8 col-lg-8">

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Please note:</strong>  Your own car insurance is unlikely to cover hire cars.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class="carferrari__item mb__30 car_item d-flex-  bgwhite p-3">
                        <div class="qustion__content">

                            <div class="accordion__wrap">
                                <div class="accordion" id="accordionExample">

                                    <div class="p-3">
                                        <div class="d-flex justify-content-between">
                                        <p class="text-heading">Insurance for peace of mind</p>
                                            <p>Free cancellation</p>
                                        </div>
                                        <div class="mt-3">
                                            {!! $car->security_deposit !!}
                                        </div>

                                        <div class="d-flex justify-content-between mt-4">
                                            <p class="text-heading- ">What is covered</p>
                                            <p class="text-center">No additional <br/>protection</p>
                                            <p class="text-center">Full Protection <br/>Total cover price

                                            <br/>
                                                {{ amt($car->insurance_fee) }}
                                            </p>
                                        </div>

                                    </div>

                                    <!--Accordion items-->
                                    <div class="accordion-item wow fadeInUp" data-wow-duration="0.9s" style="visibility: visible; animation-duration: 0.9s; animation-name: fadeInUp;">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                The Car’s excess
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                            <div class="accordion-body">
                                                {{ $car->damage_excess }}
                                            </div>
                                        </div>
                                    </div>
                                    <!--Accordion items-->
                                    <div class="accordion-item wow fadeInUp" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Windows, mirrors, wheels & tyres
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                                            <div class="accordion-body">
                                                <p>
                                                    .....
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item wow fadeInUp" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
                                        <h2 class="accordion-header" id="heading3">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapseTwo">
                                                Administration and breakdown charges
                                            </button>
                                        </h2>
                                        <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample" style="">
                                            <div class="accordion-body">
                                                <p>
                                                    .....
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="justify-content-end d-flex gap-4 text-center">
                        <div>
                            <p>Without <br/>Full Protection</p>
                            <a href="{{ url('checkout') }}?{{ http_build_query(['book_type' => 'without_full_protection'] + request()->query()) }}" class="cmn_btn_white">
                                               <span>
                                                 Go to book
                                               </span>
                            </a>
                        </div>
                        <div>
                           <p>With <br/>Full Protection</p>
                            <a href="{{ url('checkout') }}?{{ http_build_query(['book_type' => 'with_full_protection'] + request()->query()) }}" class="cmn__btn">
                                               <span>
                                                 Go to book
                                               </span>
                            </a>
                        </div>

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
