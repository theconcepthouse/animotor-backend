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
                                There are many variations of passages of Lorem Ipsum available, but the have suffered
                                alteration in some form, by injected humour, or randomised words which don't look even
                                slightly believable. If you are going to use...
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
                <div class="col-xxl-6 col-xl-7 col-lg-7 wow fadeInDown"
                     style="visibility: visible; animation-name: fadeInDown;">
                    <div class="section__header section__center pb__60">
                        <h4>
                            Hotel Facilities
                        </h4>
                        <p>
                            There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form
                        </p>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="1.2s"
                     style="visibility: visible; animation-duration: 1.2s; animation-name: fadeInUp;">
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
                            It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout.
                        </p>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="1.6s"
                     style="visibility: visible; animation-duration: 1.6s; animation-name: fadeInUp;">
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
                            It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout.
                        </p>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="1.9s"
                     style="visibility: visible; animation-duration: 1.9s; animation-name: fadeInUp;">
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
                            It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout.
                        </p>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="2.1s"
                     style="visibility: visible; animation-duration: 2.1s; animation-name: fadeInUp;">
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
                            It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout.
                        </p>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="2.2s"
                     style="visibility: visible; animation-duration: 2.2s; animation-name: fadeInUp;">
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
                            It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout.
                        </p>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="2.3s"
                     style="visibility: visible; animation-duration: 2.3s; animation-name: fadeInUp;">
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
                            It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="booking__landing__one_ pt-120 services mb-5">

        <div class="container">
            <div class="booking__landing__wrap1 trans50y">
                <div class="booking__landing__head pb__40">
                    <ul class="nav nav-tabs fasilities__inner fasilities__innertwo" id="myTab2" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#0" class="nav-link active" id="home-tabb1" data-bs-toggle="tab"
                               data-bs-target="#homeb1" role="tab" aria-controls="homeb1" aria-selected="true">
                        <span class="fasilities__item align-items-center d-flex">
                           <span class="icon">
                              <img src="/assets/img/banner/three/hotel.png" alt="icon">
                           </span>
                           <span class="fz-18 pratext d-block">
                              Hotels
                           </span>
                        </span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="/flight" class="nav-link" role="tab" tabindex="-1">
                        <span class="fasilities__item align-items-center d-flex">
                           <span class="icon">
                              <img src="/assets/img/banner/three/flight.png" alt="icon">
                           </span>
                           <span class="fz-18 pratext d-block">
                              Flights
                           </span>
                        </span>
                            </a>
                        </li>



                        <li class="nav-item" role="presentation">
                            <a href="/flight" class="nav-link" role="tab" tabindex="-1">
                                <span class="fasilities__item align-items-center d-flex">
                                    <span class="icon">
                                        <img src="/assets/img/svg/gas.svg" alt="icon">
                                    </span>
                                    <span class="fz-18 pratext d-block">
                                        Gas Delivery
                                    </span>
                                </span>
                            </a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a target="_blank" href="https://payswift.ng" class="nav-link" role="tab" tabindex="-1">
                                <span class="fasilities__item align-items-center d-flex">
                                    <span class="icon">
                                        <img src="/assets/img/svg/eletricity.svg" alt="icon">
                                    </span>
                                    <span class="fz-18 pratext d-block">
                                        Utility & Bill
                                    </span>
                                </span>
                            </a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a target="_blank" href="https://skillerman.ng" class="nav-link" role="tab" tabindex="-1">
                                <span class="fasilities__item align-items-center d-flex">
                                    <span class="icon">
                                        <img src="/assets/img/svg/card.svg" alt="icon">
                                    </span>
                                    <span class="fz-18 pratext d-block">
                                        Artisan
                                    </span>
                                </span>
                            </a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a target="_blank" href="https://ebeanomarket.com/" class="nav-link" role="tab" tabindex="-1">
                                <span class="fasilities__item align-items-center d-flex">
                                    <span class="icon">
                                        <img src="/assets/img/svg/broadband.svg" alt="icon">
                                    </span>
                                    <span class="fz-18 pratext d-block">
                                        Market Place
                                    </span>
                                </span>
                            </a>
                        </li>


                    </ul>
                </div>
                <div class="booking__landing__body">
                    <div class="tab-content" id="myTabContentbookin1">
                        <div class="tab-pane fade active show" id="homeb1" role="tabpanel" aria-labelledby="home-tabb1">
                            <div class="dating__body">
                                <div class="dating__body__box mb__30">
                                    <div class="dating__item dating__hidden">
                                        <input type="text" placeholder="Enter Locality City">
                                    </div>
                                    <div class="dating__item dating__hidden">
                                        <div id="datepicker10" class="input-group date" data-date-format="dd-mm-yyyy">
                                            <input class="form-control" type="text" placeholder="Check in" readonly="">
                                            <span class="calendaricon">
                                    <i class="material-symbols-outlined">
                                       calendar_month
                                    </i>
                                 </span>
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="dating__item dating__hidden">
                                        <div id="datepicker211" class="input-group date" data-date-format="dd-mm-yyyy">
                                            <input class="form-control" type="text" placeholder="Check Out" readonly="">
                                            <span class="calendaricon">
                                    <i class="material-symbols-outlined">
                                       calendar_month
                                    </i>
                                 </span>
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="dating__item dating__inetial select__border">
                                        <select name="room" style="display: none;">
                                            <option value="1">
                                                Room
                                            </option>
                                            <option value="2">
                                                Single Room
                                            </option>
                                            <option value="3">
                                                Dobble Room
                                            </option>
                                        </select>
                                        <div class="nice-select" tabindex="0"><span class="current">
                                            Room
                                        </span>
                                            <ul class="list">
                                                <li data-value="1" class="option selected">
                                                    Room
                                                </li>
                                                <li data-value="2" class="option">
                                                    Single Room
                                                </li>
                                                <li data-value="3" class="option">
                                                    Dobble Room
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dating__item">
                                        <button type="submit" class="cmn__btn">
                                 <span>
                                    Search Hotels
                                 </span>
                                        </button>
                                    </div>
                                </div>
                                <div class="boock__check">
                                    <input class="form-check-input" type="checkbox" value="" id="bcheckboky">
                                    <label class="form-check-label" for="bcheckboky">
                                        I Agree support terms &amp; condition
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="contactb111" role="tabpanel" aria-labelledby="contact-tabb111">
                            <div class="dating__body">
                                <div class="dating__body__box  mb__30">
                                    <div class="dating__item dating__hidden">
                                        <input type="text" placeholder="From">
                                        <span class="calendaricon">
                                 <i class="material-symbols-outlined">
                                    location_on
                                 </i>
                              </span>
                                    </div>
                                    <div class="dating__item select__border">
                                        <select name="room" style="display: none;">
                                            <option value="1">
                                                Time
                                            </option>
                                            <option value="2">
                                                in Time 8:10 am
                                            </option>
                                            <option value="3">
                                                in Time 9:10 am
                                            </option>
                                        </select>
                                        <div class="nice-select" tabindex="0"><span class="current">
                                            Time
                                        </span>
                                            <ul class="list">
                                                <li data-value="1" class="option selected">
                                                    Time
                                                </li>
                                                <li data-value="2" class="option">
                                                    in Time 8:10 am
                                                </li>
                                                <li data-value="3" class="option">
                                                    in Time 9:10 am
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dating__item dating__hidden">
                                        <div id="datepicker18" class="input-group date" data-date-format="dd-mm-yyyy">
                                            <input class="form-control" type="text" placeholder="Pick-up Date"
                                                   readonly="">
                                            <span class="calendaricon">
                                    <i class="material-symbols-outlined">
                                       calendar_month
                                    </i>
                                 </span>
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="dating__item dating__hidden">
                                        <div id="datepicker219" class="input-group date" data-date-format="dd-mm-yyyy">
                                            <input class="form-control" type="text" placeholder="Drop-off date"
                                                   readonly="">
                                            <span class="calendaricon">
                                    <i class="material-symbols-outlined">
                                       calendar_month
                                    </i>
                                 </span>
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="dating__item">
                                        <button type="submit" class="cmn__btn">
                                 <span>
                                    Search Cars
                                 </span>
                                        </button>
                                    </div>
                                </div>
                                <div class="boock__check">
                                    <input class="form-check-input" type="checkbox" value="" id="bcheckboktttu">
                                    <label class="form-check-label" for="bcheckboktttu">
                                        Driver aged 25 - 70
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('hotel::components.explore_nigeria')
    @include('hotel::components.popular_hotels')
@endsection
