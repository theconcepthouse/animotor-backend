@extends('frontpage.layout')


@section('content')

    @if(!is_app())
        @include('frontpage.partials.layout.header')
    @endif


    <!-- hotel list here -->
    <section class="flight__onewaysection pb__60 pt__60 ">

        @if(!is_app())
            @include('frontpage.components.home_booking')
        @endif


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
                                        <div class="d-md-flex d-sm-block justify-content-between">
                                        <p class="text-heading">Insurance for peace of mind</p>
                                            <div class="justify-content-end align-items-end">
                                                <p class="">{{ $car->cancellation_fee > 0 ? 'Cancellation Fee : '.amt($car->cancellation_fee) : 'Free cancellation' }}</p>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <p>{!! $car->security_deposit !!}</p>
                                        </div>

                                        <div class="d-flex justify-content-between mt-4 row">
                                            <div class="col-md-4 mt-2 col-6">
                                                <p class="text-heading- text-center ">What is <br/>covered</p>
                                            </div>
                                            <div class="col-md-4  mt-2 col-6">
                                                <p class="text-center">No additional <br/>protection</p>
                                            </div>
                                            <div class="col-md-4 mt-2 col-6">
                                                <p class="text-center">Full Protection <br/>Total cover price
                                                    <br/>
                                                    {{ amt($car->insurance_fee) }}
                                                </p>
                                            </div>





                                            <!-- Insurance Comparison Table -->
                                            <div class="row border-bottom py-3">
                                                <div class="col-4">
                                                    <h5>What's covered</h5>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <h5>No protection</h5>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <h5 class="text-success">Collision Damage Protection</h5>
                                                </div>
                                            </div>

                                            <!-- Row headings for the categories -->
                                            @php
                                                $categories = ['Damage to car', 'Theft of car', 'Drivers'];
                                                $insurance_data = $car->insurance_coverage ?? [];
                                            @endphp

                                            @foreach($insurance_data as $index => $coverage)
                                                <div class="row border-bottom py-4">
                                                    <div class="col-4">
                                                        <h6>{{ $categories[$index] ?? '' }}</h6>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <div class="text-center">
                                                            <span class="text-muted">✕</span>
                                                            <p>{{ $index < 2 ? 'Not covered' : 'Doesn\'t cover anyone' }}</p>
                                                            @if($index < 2)
                                                                <p class="small bg-light rounded-1 d-inline-block px-3 py-1">We don't reimburse you</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <div class="text-center">
                                                            <span class="text-success">✓</span>
                                                            <p><strong>{{ $coverage['title'] }}</strong></p>
                                                            <p>{{ $coverage['value'] }}</p>
                                                            @if($index < 2)
                                                                <p>We reimburse you</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <!-- Price -->
                                            <div class="row py-4">
                                                <div class="col-4"></div>
                                                <div class="col-4 text-center">
                                                    <p>No protection price</p>
                                                    <h6>{{ amt(0) }}</h6>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <p>Total protection price</p>
                                                    <h6 class="text-success">{{ amt($car->insurance_fee) }}</h6>
                                                </div>
                                            </div>



                                        </div>

                                    </div>

                                    <!--Accordion items-->
                                    <div class="accordion-item wow fadeInUp" data-wow-duration="0.9s" style="visibility: visible; animation-duration: 0.9s; animation-name: fadeInUp;">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                The Car’s Excess
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
                                                Security Deposit Information
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                                            <div class="accordion-body">
                                                <p>
                                                    {!! $car->security_deposit !!}
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
                                                    {!! $car->mileage_text !!}
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


    @if(!is_app())
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
    @endif

@endsection
