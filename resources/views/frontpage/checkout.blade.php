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

            <div class="row">

                <div class="d-flex booking_stage align-items-center justify-content-between">
                    <div class=" d-none d-md-block">
                        <a href="javascript:void(0)" class="btn-white">
                            <img src="/assets/img/icons/check.png"><span class="mx-3">Your deal</span>
                        </a>
                    </div>
                    <div class=" d-none d-md-block">
                        <img src="/assets/img/icons/dot.png" />
                    </div>

                    <div class=" d-none d-md-block">
                        <a href="javascript:void(0)" class="btn-white">
                            <img src="/assets/img/icons/shield.png"><span class="mx-3">Protection option</span>
                        </a>
                    </div>
                    <div class=" d-none d-md-block">
                        <img src="/assets/img/icons/dot.png" />
                    </div>

                    <div>
                        <a href="javascript:void(0)" class="cmn__btn">
                            <img src="/assets/img/icons/cart.png"><span class="mx-3">Checkout</span>
                        </a>
                    </div>

                </div>
            </div>

            <div class="row g-4 justify-content-center mt-3">

                <livewire:checkout />

                @include('frontpage.partials.car_booking.checkout_right')

            </div>
        </div>



            @include('frontpage.partials.terms_modal')



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
