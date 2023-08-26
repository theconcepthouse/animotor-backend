@extends('frontpage.layout')

@section('content')

    @if(!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif


    <!-- cars ticket here -->
    <section class="cars__ticket bgsection pt-120 pb__10">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="train__ticket__content car__ticket__content">
                        <div class="section__header mb__30 wow fadeInDown">
                            <h5>
                                Book your ride to anywhere with Swiftbookings
                            </h5>
                            <p>
                                There are many variations of passages of Lorem Ipsum available, but the  have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use...
                            </p>
                        </div>
                        <ul class="offer__list pb__40 wow fadeInUp">
                            <li>
                     <span class="thumb">
                        <img src="/assets/img/bus/b3.png" alt="img">
                     </span>
                                <span class="text">
                        Unlimited Offers
                     </span>
                            </li>
                            <li>
                     <span class="thumb">
                        <img src="/assets/img/bus/b2.png" alt="img">
                     </span>
                                <span class="text">
                        24X7 Support
                     </span>
                            </li>
                            <li>
                     <span class="thumb">
                        <img src="/assets/img/bus/b6.png" alt="img">
                     </span>
                                <span class="text">
                        Cheapest Price
                     </span>
                            </li>
                            <li>
                     <span class="thumb">
                        <img src="/assets/img/bus/b4.png" alt="img">
                     </span>
                                <span class="text">
                        100% Trust pay
                     </span>
                            </li>
                        </ul>
                        <a href="car-list.html" class="cmn__btn wow fadeInDown">
                  <span>
                     Get started with swiftbooking app
                  </span>
                        </a>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-5">
                    <div class="worldwide__tumb__wrapper">
                        <div class="thumb__innner">
                            <div class="tumb wow fadeInDown" data-wow-duration="1.2s">
                                <img src="/assets/img/cars/car1.jpg" alt="img">
                            </div>
                            <div class="tumb wow fadeInUp" data-wow-duration="1.2s">
                                <img src="/assets/img/cars/car2.jpg" alt="img">
                            </div>
                        </div>
                        <div class="thumb__innner">
                            <div class="tumb wow fadeInUp" data-wow-duration="1.2s">
                                <img src="/assets/img/cars/carman1.jpg" alt="img">
                            </div>
                            <div class="tumb wow fadeInDown" data-wow-duration="1.2s">
                                <img src="/assets/img/cars/carman2.jpg" alt="img">
                            </div>
                        </div>
                        <div class="car__rount">
                            <img src="/assets/img/cars/carround.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cars ticket end -->

    <section class="hotel__facilities pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-7 col-lg-7 wow fadeInDown" style="visibility: visible; animation-name: fadeInDown;">
                    <div class="section__header section__center pb__60">
                        <h4>
                            Hotel Facilities
                        </h4>
                        <p>
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form
                        </p>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="1.2s" style="visibility: visible; animation-duration: 1.2s; animation-name: fadeInUp;">
                    <div class="hotel__facilities__item">
                        <div class="head__wrap">
                            <img src="/assets/img/room/pickdrop.png" alt="img">
                            <h5>
                                <a href="hotel-list.html">
                                    Pick up &amp; drop
                                </a>
                            </h5>
                        </div>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                        </p>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="1.6s" style="visibility: visible; animation-duration: 1.6s; animation-name: fadeInUp;">
                    <div class="hotel__facilities__item">
                        <div class="head__wrap">
                            <img src="/assets/img/room/prking.png" alt="img">
                            <h5>
                                <a href="hotel-list.html">
                                    Parking Space
                                </a>
                            </h5>
                        </div>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                        </p>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="1.9s" style="visibility: visible; animation-duration: 1.9s; animation-name: fadeInUp;">
                    <div class="hotel__facilities__item">
                        <div class="head__wrap">
                            <img src="/assets/img/room/roomservice.png" alt="img">
                            <h5>
                                <a href="hotel-list.html">
                                    Rooom Service
                                </a>
                            </h5>
                        </div>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                        </p>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="2.1s" style="visibility: visible; animation-duration: 2.1s; animation-name: fadeInUp;">
                    <div class="hotel__facilities__item">
                        <div class="head__wrap">
                            <img src="/assets/img/room/swimming.png" alt="img">
                            <h5>
                                <a href="hotel-list.html">
                                    Swimming Pool
                                </a>
                            </h5>
                        </div>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                        </p>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="2.2s" style="visibility: visible; animation-duration: 2.2s; animation-name: fadeInUp;">
                    <div class="hotel__facilities__item">
                        <div class="head__wrap">
                            <img src="/assets/img/room/internetfibra.png" alt="img">
                            <h5>
                                <a href="hotel-list.html">
                                    Fibra Internet
                                </a>
                            </h5>
                        </div>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                        </p>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="2.3s" style="visibility: visible; animation-duration: 2.3s; animation-name: fadeInUp;">
                    <div class="hotel__facilities__item">
                        <div class="head__wrap">
                            <img src="/assets/img/room/hotbrekfast.png" alt="img">
                            <h5>
                                <a href="hotel-list.html">
                                    Beakfast
                                </a>
                            </h5>
                        </div>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('hotel::components.explore_nigeria')
    @include('hotel::components.popular_hotels')
@endsection
