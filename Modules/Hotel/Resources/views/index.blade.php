@extends('hotel::layouts.master')
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
                <h4 class="bread__title">
                    Hotel listing
                </h4>
                <ul class="breadcumnd__link">
                    <li>
                        <a href="/">
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

                </ul>
            </div>
        </div>
        <!--Container-->

        <div class="hotel__list__section pt-80">
            <div class="container">
                <div class="hotelbooking__categoris__wrap">
                    <div class="dating__body">
                        <div class="dating__body__box">
                            <div class="dating__item dating__hidden">
                                <input type="text" placeholder="Enter Locality City">
                            </div>
                            <div class="dating__item dating__hidden">
                                <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                                    <input class="form-control" type="text" placeholder="Check in" readonly>
                                    <span class="calendaricon">
                           <i class="material-symbols-outlined">
                              calendar_month
                           </i>
                        </span>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                            <div class="dating__item dating__hidden">
                                <div id="datepicker2" class="input-group date" data-date-format="dd-mm-yyyy">
                                    <input class="form-control" type="text" placeholder="Check Out" readonly>
                                    <span class="calendaricon">
                           <i class="material-symbols-outlined">
                              calendar_month
                           </i>
                        </span>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                            <div class="dating__item dating__inetial select__border">
                                <select name="room">
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
                            </div>
                            <div class="dating__item">
                                <button type="submit" class="cmn__btn">
                        <span>
                           Search Hotels
                        </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcumnd banner End -->

    <!-- hotel list here -->
    <section class="hotel__list__common pt-120 pb__60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="common__filter__wrapper">
                        <h3 class="filltertext borderb text-start pb__20 mb__20">
                            Filter
                        </h3>
                        <div class="search__item borderb pb__10 mb__20">
                            <div class="common__sidebar__head">
                                <button class="w-100 fw-400 lato dtext fz-24 d-flex align-items-center justify-content-between">
                                    Hotel Name
                                    <img src="/assets/img/svg/dropdown.svg" alt="svg">
                                </button>
                            </div>
                            <div class="common__sidebar__content">
                                <form action="#" class="d-flex align-items-center justify-content-between">
                                    <input type="text" placeholder="Search by hotel name">
                                    <button class="search">
                                        <i class="material-symbols-outlined">
                                            search
                                        </i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="search__item borderb pb__10 mb__20">
                            <div class="common__sidebar__head">
                                <button class="w-100 fw-400 lato dtext fz-24 d-flex align-items-center justify-content-between">
                                    Pricing scale
                                    <img src="/assets/img/svg/dropdown.svg" alt="svg">
                                </button>
                            </div>
                            <div class="common__sidebar__content">
                                <div class="range__barcustom">
                                    <div class="slider">
                                        <div class="progress"></div>
                                    </div>
                                    <div class="range-input mb__10">
                                        <input type="range" class="range-min" min="0" max="10000" value="2500" step="100">
                                        <input type="range" class="range-max" min="0" max="10000" value="7500" step="100">
                                    </div>
                                    <div class="price-input">
                                        <div class="field">
                                            <span>$</span>
                                            <input type="number" class="input-min" value="2500">
                                        </div>
                                        <div class="separator">-</div>
                                        <div class="field">
                                            <span>$</span>
                                            <input type="number" class="input-max" value="7500">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="search__item borderb pb__10 mb__20">
                            <div class="common__sidebar__head">
                                <button class="w-100 fw-400 lato dtext fz-24 d-flex align-items-center justify-content-between">
                                    Type of property
                                    <img src="/assets/img/svg/dropdown.svg" alt="svg">
                                </button>
                            </div>
                            <div class="common__sidebar__content">
                                <div class="common__typeproperty">
                                    <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                        <div class="radio__left d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="checkbox" id="proper1" checked>
                                            <label class="form-check-label" for="proper1">
                              <span class="fz-16 lato fw-400 dtext">
                                 Hotel
                              </span>
                                            </label>
                                        </div>
                                        <span class="radio__right fz-16 fw-400 dtext lato">
                           500
                        </span>
                                    </div>
                                    <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                        <div class="radio__left d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="checkbox" id="proper2">
                                            <label class="form-check-label" for="proper2">
                              <span class="fz-16 lato fw-400 dtext">
                                 Motel
                              </span>
                                            </label>
                                        </div>
                                        <span class="radio__right fz-16 fw-400 dtext lato">
                           200
                        </span>
                                    </div>
                                    <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                        <div class="radio__left d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="checkbox" id="proper3">
                                            <label class="form-check-label" for="proper3">
                              <span class="fz-16 lato fw-400 dtext">
                                 Villa
                              </span>
                                            </label>
                                        </div>
                                        <span class="radio__right fz-16 fw-400 dtext lato">
                           111
                        </span>
                                    </div>
                                    <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                        <div class="radio__left d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="checkbox" id="proper4">
                                            <label class="form-check-label" for="proper4">
                              <span class="fz-16 lato fw-400 dtext">
                                 Farm House
                              </span>
                                            </label>
                                        </div>
                                        <span class="radio__right fz-16 fw-400 dtext lato">
                           66
                        </span>
                                    </div>
                                    <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                        <div class="radio__left d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="checkbox" id="proper5">
                                            <label class="form-check-label" for="proper5">
                              <span class="fz-16 lato fw-400 dtext">
                                 Resort
                              </span>
                                            </label>
                                        </div>
                                        <span class="radio__right fz-16 fw-400 dtext lato">
                           720
                        </span>
                                    </div>
                                    <div class="type__radio d-flex align-items-center justify-content-between">
                                        <div class="radio__left d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="checkbox" id="proper6">
                                            <label class="form-check-label" for="proper6">
                              <span class="fz-16 lato fw-400 dtext">
                                 Serviced Apartments
                              </span>
                                            </label>
                                        </div>
                                        <span class="radio__right fz-16 fw-400 dtext lato">
                           54
                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="search__item borderb pb__10 mb__20">
                            <div class="common__sidebar__head">
                                <button class="w-100 fw-400 lato dtext fz-24 d-flex align-items-center justify-content-between">
                                    Star Category
                                    <img src="/assets/img/svg/dropdown.svg" alt="svg">
                                </button>
                            </div>
                            <div class="common__sidebar__content">
                                <div class="common__typeproperty">
                                    <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                        <div class="radio__left d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="checkbox" id="proper1s1" checked>
                                            <label class="form-check-label" for="proper1s1">
                              <span class="star">
                                 <img src="/assets/img/svg/star.svg" alt="svg">
                              </span>
                                                <span class="fz-16 lato fw-400 dtext">
                                 5 Star
                              </span>
                                            </label>
                                        </div>
                                        <span class="radio__right fz-16 fw-400 dtext lato">
                           701
                        </span>
                                    </div>
                                    <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                        <div class="radio__left d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="checkbox" id="proper2s">
                                            <label class="form-check-label" for="proper2s">
                              <span class="star">
                                 <img src="/assets/img/svg/star.svg" alt="svg">
                              </span>
                                                <span class="fz-16 lato fw-400 dtext">
                                 4 Star
                              </span>
                                            </label>
                                        </div>
                                        <span class="radio__right fz-16 fw-400 dtext lato">
                           621
                        </span>
                                    </div>
                                    <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                        <div class="radio__left d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="checkbox" id="proper3s">
                                            <label class="form-check-label" for="proper3s">
                              <span class="star">
                                 <img src="/assets/img/svg/star.svg" alt="svg">
                              </span>
                                                <span class="fz-16 lato fw-400 dtext">
                                 3 Star
                              </span>
                                            </label>
                                        </div>
                                        <span class="radio__right fz-16 fw-400 dtext lato">
                           221
                        </span>
                                    </div>
                                    <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                        <div class="radio__left d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="checkbox" id="proper4s">
                                            <label class="form-check-label" for="proper4s">
                              <span class="star">
                                 <img src="/assets/img/svg/star.svg" alt="svg">
                              </span>
                                                <span class="fz-16 lato fw-400 dtext">
                                 2 Star
                              </span>
                                            </label>
                                        </div>
                                        <span class="radio__right fz-16 fw-400 dtext lato">
                          145
                        </span>
                                    </div>
                                    <div class="type__radio d-flex align-items-center justify-content-between">
                                        <div class="radio__left d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="checkbox" id="proper5s">
                                            <label class="form-check-label" for="proper5s">
                              <span class="star">
                                 <img src="/assets/img/svg/star.svg" alt="svg">
                              </span>
                                                <span class="fz-16 lato fw-400 dtext">
                                 1 Star
                              </span>
                                            </label>
                                        </div>
                                        <span class="radio__right fz-16 fw-400 dtext lato">
                           65
                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="search__item">
                            <div class="common__sidebar__head">
                                <button class="w-100 fw-400 lato dtext fz-24 d-flex align-items-center justify-content-between">
                                    Amenities
                                    <img src="/assets/img/svg/dropdown.svg" alt="svg">
                                </button>
                            </div>
                            <div class="common__sidebar__content">
                                <div class="common__typeproperty">
                                    <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                        <div class="radio__left d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="checkbox" id="proper1s2" checked>
                                            <label class="form-check-label" for="proper1s2">
                              <span class="star">
                                 <img src="/assets/img/svg/coffee.svg" alt="svg">
                              </span>
                                                <span class="fz-16 lato fw-400 dtext">
                                 Restaurant
                              </span>
                                            </label>
                                        </div>
                                        <span class="radio__right fz-16 fw-400 dtext lato">
                           500
                        </span>
                                    </div>
                                    <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                        <div class="radio__left d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="checkbox" id="proper2sa">
                                            <label class="form-check-label" for="proper2sa">
                              <span class="star">
                                 <img src="/assets/img/svg/swing.svg" alt="svg">
                              </span>
                                                <span class="fz-16 lato fw-400 dtext">
                                 Swimming Pool
                              </span>
                                            </label>
                                        </div>
                                        <span class="radio__right fz-16 fw-400 dtext lato">
                           725
                        </span>
                                    </div>
                                    <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                        <div class="radio__left d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="checkbox" id="proper3sa">
                                            <label class="form-check-label" for="proper3sa">
                              <span class="star">
                                 <img src="/assets/img/svg/facilities-bussen.svg" alt="svg">
                              </span>
                                                <span class="fz-16 lato fw-400 dtext">
                                 Business Facilitiies
                              </span>
                                            </label>
                                        </div>
                                        <span class="radio__right fz-16 fw-400 dtext lato">
                           77
                        </span>
                                    </div>
                                    <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                        <div class="radio__left d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="checkbox" id="proper4sa">
                                            <label class="form-check-label" for="proper4sa">
                              <span class="star">
                                 <img src="/assets/img/svg/bedss.svg" alt="svg">
                              </span>
                                                <span class="fz-16 lato fw-400 dtext">
                                 Spa/Wellness
                              </span>
                                            </label>
                                        </div>
                                        <span class="radio__right fz-16 fw-400 dtext lato">
                          336
                        </span>
                                    </div>
                                    <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                        <div class="radio__left d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="checkbox" id="proper5sa">
                                            <label class="form-check-label" for="proper5sa">
                              <span class="star">
                                 <img src="/assets/img/svg/wifis.svg" alt="svg">
                              </span>
                                                <span class="fz-16 lato fw-400 dtext">
                                 Internet/Wi-Fi
                              </span>
                                            </label>
                                        </div>
                                        <span class="radio__right fz-16 fw-400 dtext lato">
                           500
                        </span>
                                    </div>
                                    <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                        <div class="radio__left d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="checkbox" id="proper4sas">
                                            <label class="form-check-label" for="proper4sas">
                              <span class="star">
                                 <img src="/assets/img/svg/gum.svg" alt="svg">
                              </span>
                                                <span class="fz-16 lato fw-400 dtext">
                                 Gym
                              </span>
                                            </label>
                                        </div>
                                        <span class="radio__right fz-16 fw-400 dtext lato">
                          265
                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="hotel__list__box">
                        @if(count($hotels) > 0)
                        <div class="row g-4">
                            @foreach($hotels as $item)
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                <div class="bits__hotel d-grid hotel_listing align-items-center gap-3">
                                    <div class="thumb thumb2">
                                        <a href="{{ route('hotel.show', $item->id) }}">
                                            <img src="{{ $item->featured_image_thumb }}" class="w-100 hotel_image" alt="img">
                                        </a>
                                    </div>
                                    <div class="content content__space">
                                        <div class="title gap-3 d-flex justify-content-between mb__10">
                                            <h5>
                                               {{ $item->title }}
                                            </h5>
                                            <span class="rating fz-16 fw-400 lato dtext d-flex align-items-center gap-2">
                                 <img src="/assets/img/svg/star.svg" alt="img">
                                 4.6
                              </span>
                                        </div>
                                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-1">
                              <span class="dubay mb__15 gap-2 d-flex align-items-center fz-16 fw-400 lato dtext">
                                 <img src="/assets/img/svg/mlocation.svg" alt="svg">
                                {{ $item?->region?->name }}
                              </span>
                                            <ul class="bitast__icon mb__15 d-flex align-items-center gap-2">
                                                <li>
                                                    <img src="/assets/img/svg/coffee.svg" alt="img">
                                                </li>
                                                <li>
                                                    <img src="/assets/img/svg/swing.svg" alt="img">
                                                </li>
                                                <li>
                                                    <img src="/assets/img/svg/facilities-bussen.svg" alt="img">
                                                </li>
                                                <li>
                                                    <img src="/assets/img/svg/wifis.svg" alt="img">
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="pagination justify-content-center pt__40">
                            {!! $hotels->links() !!}
                        </div>
                        @else
                            <div class="d-flex justify-content-center pt-120">
                                <h5>No hotel found for your specific search</h5>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- hotel list End -->

@endsection
