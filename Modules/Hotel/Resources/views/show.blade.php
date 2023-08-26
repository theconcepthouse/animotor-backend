@extends('frontpage.layout')


@section('content')

    @if(!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif


    <!-- breadcumnd banner Here -->
    <section class="breadcumnd__banner">
        <!--Container-->
        <div class="container">
            <div class="breadcumnd__wrapper">
                <h2 class="bread__title">
                    Hotel Details
                </h2>
                <ul class="breadcumnd__link">
                    <li>
                        <a href="index.html">
                            Home
                        </a>
                    </li>
                    <li>
                        <i class="material-symbols-outlined">
                            chevron_right
                        </i>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            Booking
                        </a>
                    </li>
                    <li>
                        <i class="material-symbols-outlined">
                            chevron_right
                        </i>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            Hotel
                        </a>
                    </li>
                    <li>
                        <i class="material-symbols-outlined">
                            chevron_right
                        </i>
                    </li>
                    <li>
                        Hotel Details
                    </li>
                </ul>
            </div>
        </div>
        <!--Container-->
    </section>
    <!-- breadcumnd banner End -->

    <!-- hotel details here -->
    <section class="hotel__details overflow-hidden pt__60">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-8 col-lg-8">

                    <div class="hotel__details__wrapleft">
                        <div class="details__bookslider owl-theme owl-carousel">
                            @foreach($hotel->images as $item)
                                <div class="item" data-hash="{{ $loop->index }}_item">
                                    <img src="{{ $item }}" alt="img">
                                </div>
                            @endforeach

                        </div>
                        <div class="details__smallthumb d-flex align-items-center gap-2">
                            @foreach($hotel->images as $item)
                                <a class="button secondary url" href="#{{ $loop->index }}_item">
                                    <img src="{{ $item }}" alt="img">
                                </a>
                            @endforeach
                        </div>
                        <div class="text__box pt__60 pb__40">
                            <h3 class="mb__20 dtext xs-32 text-capitalize">
                                {{ $hotel->title }}
                            </h3>
                            <p class="mb__20 xs-16">
                                {!! $hotel->description !!}
                            </p>

                        </div>
                        <div class="house__rules pb__30">
                            <h4 class="mb__20 dtext">
                                Amenities
                            </h4>
                            <ul class="house__list d-flex align-items-center flex-wrap">
                                @foreach($hotel->facilities as $item)
                                <li>
                                    {{ $item }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="house__rules mb__30">
                            <h4 class="mb__20 dtext">
                                House Rules
                            </h4>
                            <ul class="house__list d-flex align-items-center flex-wrap">
                                <li>
                                    Check-in: 12:00 pm - 10:00 am
                                </li>
                                <li>
                                    No smokin
                                </li>
                                <li>
                                    No pets allowed
                                </li>
                                <li>
                                    Checkout: 09:00 am
                                </li>
                                <li>
                                    Drug addiction not allowed
                                </li>
                                <li>
                                    No parties or events
                                </li>
                            </ul>
                        </div>
                        <div class="cancellation text-start pb__40 nlfbottom">
                            <h4 class="dtext mb__20">
                                Cancellation
                            </h4>
                            <p class="fz-16 fw-400 lato dtext">
                                There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour, or randomised words which don't
                                look even slightly believable. If you are going to use a passage of Lorem Ipsum, you
                                need to be sure there isn't anything embarrassing hidden in the middle of text.
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="main__right__detaislbar">
                        <div class="hotel__details__checkoungwrapper">
                            <div class="cheakout__rightbar__box">
                                <h5 class="base mb__20 text-center">
                                    Cheakout
                                </h5>
                                <div class="dating__body check__hoteldetaislbody">
                                    <div class="dating__body__box">
                                        <div class="dating__item dating__hidden">
                                            <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                                                <input class="form-control" type="text" placeholder="Check in" readonly>
                                                <span class="calendaricon">
                                    <i class="material-symbols-outlined">
                                       calendar_month
                                    </i>
                                 </span>
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                        </div>
                                        <div class="dating__item dating__hidden">
                                            <div id="datepicker2" class="input-group date"
                                                 data-date-format="dd-mm-yyyy">
                                                <input class="form-control" type="text" placeholder="Check Out"
                                                       readonly>
                                                <span class="calendaricon">
                                    <i class="material-symbols-outlined">
                                       calendar_month
                                    </i>
                                 </span>
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                        </div>
                                        <div class="dating__item dating__inetial select__border">
                                            <select name="room">
                                                <option value="1">
                                                    Adults
                                                </option>
                                                <option value="2">
                                                    Adults one
                                                </option>
                                                <option value="3">
                                                    Adults two
                                                </option>
                                            </select>
                                        </div>
                                        <div class="dating__item dating__inetial select__border">
                                            <select name="room">
                                                <option value="1">
                                                    Children
                                                </option>
                                                <option value="2">
                                                    Children one
                                                </option>
                                                <option value="3">
                                                    Children two
                                                </option>
                                            </select>
                                        </div>
                                        <div class="dating__inetial roomtype select__border">
                                            <select name="room">
                                                <option value="1">
                                                    Room type
                                                </option>
                                                <option value="2">
                                                    luxury
                                                </option>
                                                <option value="3">
                                                    single
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="extra__service__item mt__30">
                        <span class=" lato fz-18 borderb text-start d-block fw-600 pb__15 mb__15 extra-title">
                           Extra Service
                        </span>
                                    <div class="common__typeproperty">
                                        <div
                                            class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                            <div class="radio__left d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="proper1" checked>
                                                <label class="form-check-label" for="proper1">
                                    <span class="fz-16 lato fw-400 dtext">
                                       Vat
                                    </span>
                                                </label>
                                            </div>
                                            <span class="radio__right fz-16 fw-400 dtext lato">
                                 $8 / per night
                              </span>
                                        </div>
                                        <div
                                            class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                            <div class="radio__left d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="proper2">
                                                <label class="form-check-label" for="proper2">
                                    <span class="fz-16 lato fw-400 dtext">
                                       Cleaning Fee
                                    </span>
                                                </label>
                                            </div>
                                            <span class="radio__right fz-16 fw-400 dtext lato">
                                 $11
                              </span>
                                        </div>
                                        <div
                                            class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                            <div class="radio__left d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="proper3">
                                                <label class="form-check-label" for="proper3">
                                    <span class="fz-16 lato fw-400 dtext">
                                       Airport Pickup
                                    </span>
                                                </label>
                                            </div>
                                            <span class="radio__right fz-16 fw-400 dtext lato">
                                 $17
                              </span>
                                        </div>
                                        <div
                                            class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                            <div class="radio__left d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="proper4">
                                                <label class="form-check-label" for="proper4">
                                    <span class="fz-16 lato fw-400 dtext">
                                       Wine & Dine
                                    </span>
                                                </label>
                                            </div>
                                            <span class="radio__right fz-16 fw-400 dtext lato">
                                 $40 / per person
                              </span>
                                        </div>
                                        <div
                                            class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                            <div class="radio__left d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="proper5">
                                                <label class="form-check-label" for="proper5">
                                    <span class="fz-16 lato fw-400 dtext">
                                       Parking
                                    </span>
                                                </label>
                                            </div>
                                            <span class="radio__right fz-16 fw-400 dtext lato">
                                 free
                              </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="extra__service__item mt__30">
                        <span class=" lato fz-18 borderb d-block text-start fw-600 pb__15 mb__15 extra-title">
                           Your price
                        </span>
                                    <span class="fz-16 mb__30 d-flex gap-2 fw-400 lato dtext">
                           <span class="tactive">
                              $ 65
                           </span>
                           / per room
                        </span>
                                    <div class="d-flex justify-content-center mb__30">
                                        <a href="hotel-details-confirm.html" class="cmn__btn">
                              <span>
                                 Book Now
                              </span>
                                        </a>
                                    </div>
                                    <div class="payment__cards d-flex align-items-center gap-2">
                                        <a href="javacript:void(0)">
                                            <img src="assets/img/payment/paypals.png" alt="payment-card">
                                        </a>
                                        <a href="javacript:void(0)">
                                            <img src="assets/img/payment/visas.png" alt="payment-card">
                                        </a>
                                        <a href="javacript:void(0)">
                                            <img src="assets/img/payment/fastpay.png" alt="payment-card">
                                        </a>
                                        <a href="javacript:void(0)">
                                            <img src="assets/img/payment/payoneer.png" alt="payment-card">
                                        </a>
                                        <a href="javacript:void(0)" class="master">
                                            <img src="assets/img/payment/mastercard.png" alt="payment-card">
                                        </a>
                                    </div>
                                    <span class="fz-16 fw-400 lato mb__30 text-center d-block booking-time pt__20">
                           NB : Booking at 12:00 pm to 10:00 am
                        </span>
                                    <div class="comment__chatboxright d-flex align-items-center gap-3">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <img src="assets/img/svg/comments.svg" alt="img">
                                        </div>
                                        <div class="content">
                              <span class="dtext fz-24 fw-700 mb-1">
                                 Chat box
                              </span>
                                            <p class="dtext lato fz-16 fw-400">
                                                Chat with us if you need any help
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="current__weather mt__30">
                            <h5 class="mb__30 text-center">
                                Current Weather
                            </h5>
                            <div class="d-flex weather__wrapping align-items-end">
                                <div class="could__left">
                                    <div
                                        class="could__icon d-flex mb__10 align-items-center justify-content-center mb__10">
                                        <img src="assets/img/svg/coludleft.svg" alt="svg">
                                    </div>
                                    <span class="fz-24 gratext lato fw-400 mb__10">
                           23°C
                        </span>
                                    <span class="fz-16 d-block mb-1 fw-400 lato dtext">
                           Humindity: 91%
                        </span>
                                    <span class="fz-16 fw-400 lato dtext">
                           Humindity: 91%
                        </span>
                                </div>
                                <div class="firday">
                                    <img src="assets/img/details/friday-icon.png" alt="img">
                                </div>
                                <div class="sun__degree">
                                    <div class="d-flex align-items-center gap-3">
                           <span class="fz-16 d-block dtext lato">
                              Sun
                           </span>
                                        <img src="assets/img/svg/colud1.svg" class="d-block" alt="img">
                                        <span class="fz-16 d-block dtext lato">
                              22°C
                           </span>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                           <span class="fz-16 d-block dtext lato">
                              Mon
                           </span>
                                        <img src="assets/img/svg/colud1.svg" class="d-block" alt="img">
                                        <span class="fz-16 d-block dtext lato">
                              25°C
                           </span>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                           <span class="fz-16 d-block dtext lato">
                              Tue
                           </span>
                                        <img src="assets/img/svg/colud1.svg" class="d-block" alt="img">
                                        <span class="fz-16 d-block dtext lato">
                              23°C
                           </span>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                           <span class="fz-16 d-block dtext lato">
                              Wed
                           </span>
                                        <img src="assets/img/svg/colud1.svg" class="d-block" alt="img">
                                        <span class="fz-16 d-block dtext lato">
                              24°C
                           </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- hotel details End -->

    <!-- blog Related Here -->
    <section class="hotel__related__section pt-120 pb-90">
        <div class="container">
            <div class="blog__related__head pb__40">
                <h3>
                    More Related News
                </h3>
            </div>
            <div class="blog__grid__leftwrapper">
                <div class="blog__related__wrapper owl-theme owl-carousel">
                    <div class="bits__hotel d-grid align-items-center gap-3">
                        <div class="thumb thumb2">
                            <a href="hotel-details-confirm.html">
                                <img src="assets/img/details/more1.jpg" class="w-100" alt="img">
                            </a>
                        </div>
                        <div class="content content__space">
                            <div class="title gap-3 d-flex justify-content-between mb__10">
                                <h5>
                                    Bitast Hotel
                                </h5>
                                <span class="rating fz-16 fw-400 lato dtext d-flex align-items-center gap-2">
                        <img src="assets/img/svg/star.svg" alt="img">
                        4.6
                     </span>
                            </div>
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-1">
                     <span class="dubay mb__15 gap-2 d-flex align-items-center fz-16 fw-400 lato dtext">
                        <img src="assets/img/svg/mlocation.svg" alt="svg">
                        New City, Dubai
                     </span>
                                <ul class="bitast__icon mb__15 d-flex align-items-center gap-2">
                                    <li class="p__5">
                                        <img src="assets/img/svg/coffee.svg" alt="img">
                                    </li>
                                    <li class="p__5">
                                        <img src="assets/img/svg/swing.svg" alt="img">
                                    </li>
                                    <li class="p__5">
                                        <img src="assets/img/svg/facilities-bussen.svg" alt="img">
                                    </li>
                                    <li class="p__5">
                                        <img src="assets/img/svg/wifis.svg" alt="img">
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex justify-content-between flex-wrap align-items-center gap-1">
                                <div class="price__off mb__10 d-flex gap-3">
                                    <span class="fz-18 fw-500 lato dtext">$312</span>
                                    <span class="linetrogh fz-16 mt-1 fw-500 lato">$332</span>
                                    <span class="fz-16 fw-500 lato base d-block">20% OFF</span>
                                </div>
                                <span class="fz-18 d-block fw400 mb__20 lato textfive">1 Room/night</span>
                            </div>
                            <div class="d-grid justify-content-center">
                                <a href="hotel-details-confirm.html" class="cmn__btn">
                     <span>
                        Book Now
                     </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="bits__hotel d-grid align-items-center gap-3">
                        <div class="thumb thumb2">
                            <a href="hotel-details-confirm.html">
                                <img src="assets/img/details/more2.jpg" class="w-100" alt="img">
                            </a>
                        </div>
                        <div class="content content__space">
                            <div class="title gap-3 d-flex justify-content-between mb__10">
                                <h5>
                                    Skyp Hotel
                                </h5>
                                <span class="rating fz-16 fw-400 lato dtext d-flex align-items-center gap-2">
                        <img src="assets/img/svg/star.svg" alt="img">
                        4.7
                     </span>
                            </div>
                            <div class="d-flex align-items-center flex-wrap justify-content-between gap-1">
                     <span class="dubay mb__15 gap-2 d-flex align-items-center fz-16 fw-400 lato dtext">
                        <img src="assets/img/svg/mlocation.svg" alt="svg">
                        Paris, France
                     </span>
                                <ul class="bitast__icon mb__15 d-flex align-items-center gap-2">
                                    <li class="p__5">
                                        <img src="assets/img/svg/coffee.svg" alt="img">
                                    </li>
                                    <li class="p__5">
                                        <img src="assets/img/svg/swing.svg" alt="img">
                                    </li>
                                    <li class="p__5">
                                        <img src="assets/img/svg/facilities-bussen.svg" alt="img">
                                    </li>
                                    <li class="p__5">
                                        <img src="assets/img/svg/wifis.svg" alt="img">
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-1">
                                <div class="price__off mb__10 d-flex gap-3">
                                    <span class="fz-18 fw-500 lato dtext">$442</span>
                                    <span class="linetrogh fz-16 mt-1 fw-500 lato">$532</span>
                                    <span class="fz-16 fw-500 lato base d-block">20% OFF</span>
                                </div>
                                <span class="fz-18 d-block fw400 mb__20 lato textfive">1 Room/night</span>
                            </div>
                            <div class="d-grid justify-content-center">
                                <a href="hotel-details-confirm.html" class="cmn__btn">
                     <span>
                        Book Now
                     </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="bits__hotel d-grid align-items-center gap-3">
                        <div class="thumb thumb2">
                            <a href="hotel-details-confirm.html">
                                <img src="assets/img/details/more3.jpg" class="w-100" alt="img">
                            </a>
                        </div>
                        <div class="content content__space">
                            <div class="title gap-3 d-flex justify-content-between mb__10">
                                <h5>
                                    East West Hotel
                                </h5>
                                <span class="rating fz-16 fw-400 lato dtext d-flex align-items-center gap-2">
                        <img src="assets/img/svg/star.svg" alt="img">
                        4.9
                     </span>
                            </div>
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-1">
                     <span class="dubay mb__15 gap-2 d-flex align-items-center fz-16 fw-400 lato dtext">
                        <img src="assets/img/svg/mlocation.svg" alt="svg">
                        Prime city, Abu Dhabi
                     </span>
                                <ul class="bitast__icon mb__15 d-flex align-items-center gap-2">
                                    <li class="p__5">
                                        <img src="assets/img/svg/coffee.svg" alt="img">
                                    </li>
                                    <li class="p__5">
                                        <img src="assets/img/svg/swing.svg" alt="img">
                                    </li>
                                    <li class="p__5">
                                        <img src="assets/img/svg/facilities-bussen.svg" alt="img">
                                    </li>
                                    <li class="p__5">
                                        <img src="assets/img/svg/wifis.svg" alt="img">
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-1">
                                <div class="price__off mb__10 d-flex gap-3">
                                    <span class="fz-18 fw-500 lato dtext">$712</span>
                                    <span class="linetrogh fz-16 mt-1 fw-500 lato">$932</span>
                                    <span class="fz-16 fw-500 lato base d-block">20% OFF</span>
                                </div>
                                <span class="fz-18 d-block fw400 mb__20 lato textfive">1 Room/night</span>
                            </div>
                            <div class="d-grid justify-content-center">
                                <a href="hotel-details-confirm.html" class="cmn__btn">
                     <span>
                        Book Now
                     </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="bits__hotel d-grid align-items-center gap-3">
                        <div class="thumb thumb2">
                            <a href="hotel-details-confirm.html">
                                <img src="assets/img/details/more1.jpg" class="w-100" alt="img">
                            </a>
                        </div>
                        <div class="content content__space">
                            <div class="title gap-3 d-flex justify-content-between mb__10">
                                <h5>
                                    North South Hotel
                                </h5>
                                <span class="rating fz-16 fw-400 lato dtext d-flex align-items-center gap-2">
                        <img src="assets/img/svg/star.svg" alt="img">
                        5
                     </span>
                            </div>
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-1">
                     <span class="dubay mb__15 gap-2 d-flex align-items-center fz-16 fw-400 lato dtext">
                        <img src="assets/img/svg/mlocation.svg" alt="svg">
                        New york, US
                     </span>
                                <ul class="bitast__icon mb__15 d-flex align-items-center gap-2">
                                    <li class="p__5">
                                        <img src="assets/img/svg/coffee.svg" alt="img">
                                    </li>
                                    <li class="p__5">
                                        <img src="assets/img/svg/swing.svg" alt="img">
                                    </li>
                                    <li class="p__5">
                                        <img src="assets/img/svg/facilities-bussen.svg" alt="img">
                                    </li>
                                    <li class="p__5">
                                        <img src="assets/img/svg/wifis.svg" alt="img">
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-1">
                                <div class="price__off mb__10 d-flex gap-3">
                                    <span class="fz-18 fw-500 lato dtext">$912</span>
                                    <span class="linetrogh fz-16 mt-1 fw-500 lato">$1032</span>
                                    <span class="fz-16 fw-500 lato base d-block">20% OFF</span>
                                </div>
                                <span class="fz-18 d-block fw400 mb__20 lato textfive">1 Room/night</span>
                            </div>
                            <div class="d-grid justify-content-center">
                                <a href="hotel-details-confirm.html" class="cmn__btn">
                     <span>
                        Book Now
                     </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="bits__hotel d-grid align-items-center gap-3">
                        <div class="thumb thumb2">
                            <a href="hotel-details-confirm.html">
                                <img src="assets/img/details/more2.jpg" class="w-100" alt="img">
                            </a>
                        </div>
                        <div class="content content__space">
                            <div class="title gap-3 d-flex justify-content-between mb__10">
                                <h5>
                                    Jack Luxury Hotel
                                </h5>
                                <span class="rating fz-16 fw-400 lato dtext d-flex align-items-center gap-2">
                        <img src="assets/img/svg/star.svg" alt="img">
                        4.7
                     </span>
                            </div>
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-1">
                     <span class="dubay mb__15 gap-2 d-flex align-items-center fz-16 fw-400 lato dtext">
                        <img src="assets/img/svg/mlocation.svg" alt="svg">
                        Mumbai, india
                     </span>
                                <ul class="bitast__icon mb__15 d-flex align-items-center gap-2">
                                    <li class="p__5">
                                        <img src="assets/img/svg/coffee.svg" alt="img">
                                    </li>
                                    <li class="p__5">
                                        <img src="assets/img/svg/swing.svg" alt="img">
                                    </li>
                                    <li class="p__5">
                                        <img src="assets/img/svg/facilities-bussen.svg" alt="img">
                                    </li>
                                    <li class="p__5">
                                        <img src="assets/img/svg/wifis.svg" alt="img">
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-1">
                                <div class="price__off mb__10 d-flex gap-3">
                                    <span class="fz-18 fw-500 lato dtext">$742</span>
                                    <span class="linetrogh fz-16 mt-1 fw-500 lato">$932</span>
                                    <span class="fz-16 fw-500 lato base d-block">20% OFF</span>
                                </div>
                                <span class="fz-18 d-block fw400 mb__20 lato textfive">1 Room/night</span>
                            </div>
                            <div class="d-grid justify-content-center">
                                <a href="hotel-details-confirm.html" class="cmn__btn">
                     <span>
                        Book Now
                     </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="bits__hotel d-grid align-items-center gap-3">
                        <div class="thumb thumb2">
                            <a href="hotel-details-confirm.html">
                                <img src="assets/img/details/more3.jpg" class="w-100" alt="img">
                            </a>
                        </div>
                        <div class="content content__space">
                            <div class="title gap-3 d-flex justify-content-between mb__10">
                                <h5>
                                    Sea Life Hotel
                                </h5>
                                <span class="rating fz-16 fw-400 lato dtext d-flex align-items-center gap-2">
                        <img src="assets/img/svg/star.svg" alt="img">
                        5
                     </span>
                            </div>
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-1">
                     <span class="dubay mb__15 gap-2 d-flex align-items-center fz-16 fw-400 lato dtext">
                        <img src="assets/img/svg/mlocation.svg" alt="svg">
                        Dhaka, bangladesh
                     </span>
                                <ul class="bitast__icon mb__15 d-flex align-items-center gap-2">
                                    <li class="p__5">
                                        <img src="assets/img/svg/coffee.svg" alt="img">
                                    </li>
                                    <li class="p__5">
                                        <img src="assets/img/svg/swing.svg" alt="img">
                                    </li>
                                    <li class="p__5">
                                        <img src="assets/img/svg/facilities-bussen.svg" alt="img">
                                    </li>
                                    <li class="p__5">
                                        <img src="assets/img/svg/wifis.svg" alt="img">
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-1">
                                <div class="price__off mb__10 d-flex gap-3">
                                    <span class="fz-18 fw-500 lato dtext">$912</span>
                                    <span class="linetrogh fz-16 mt-1 fw-500 lato">$732</span>
                                    <span class="fz-16 fw-500 lato base d-block">20% OFF</span>
                                </div>
                                <span class="fz-18 d-block fw400 mb__20 lato textfive">1 Room/night</span>
                            </div>
                            <div class="d-grid justify-content-center">
                                <a href="hotel-details-confirm.html" class="cmn__btn">
                     <span>
                        Book Now
                     </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog Related End -->

@endsection
