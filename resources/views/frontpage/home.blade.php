@extends('frontpage.layout')

@section('content')

    <!--cars booking Categoris Here -->
    <div class="hotelbokking__categoris">
        <div class="container">
            <div class="hotelbooking__categoris__wrap">
                <div class="dating__body">
                    <h5 class="hoteltitle">
                        Book Car Rental Worldwide
                    </h5>
                    <div class="dating__body">
                        <div class="dating__body__box justify-content-center">
                            <div class="dating__item dating__hidden">
                                <input type="text" placeholder="Enter City">
                                <span class="calendaricon">
                        <i class="material-symbols-outlined">
                           location_on
                        </i>
                     </span>
                            </div>
                            <div class="dating__item select__border">
                                <select name="room">
                                    <option value="1">
                                        Time
                                    </option>
                                    <option value="2">
                                        8:30 pm
                                    </option>
                                    <option value="3">
                                        8:10 am
                                    </option>
                                </select>
                            </div>
                            <div class="dating__item dating__hidden">
                                <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                                    <input class="form-control" type="text" placeholder="Pick-up Date" readonly>
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
                                    <input class="form-control" type="text" placeholder="Drop-off date" readonly>
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
                    </div>
                    <div class="boock__check mt__30">
                        <input class="form-check-input" type="checkbox" value="" id="bcheckbok">
                        <label class="form-check-label" for="bcheckbok">
                            Driver aged 25 - 70
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--cars booking Categoris end -->

    <!--cars facilities here -->
    <section class="hotel__facilities pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-7 col-lg-7 wow fadeInDown">
                    <div class="section__header section__center pb__60">
                        <h2>
                            Car Facilities
                        </h2>
                        <p class="max-636">
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some
                        </p>
                    </div>
                </div>
            </div>
            <div class="flight__facilites__wrap bus__facilities__wrap">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-5">
                        <div class="car__facilitiesthumb">
                            <img src="assets/img/cars/carapp.png" alt="img">
                        </div>
                    </div>
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-6">
                        <div class="car__facilities__wrap gy-3 row">
                            <div class="col-lg-6">
                                <div class="hotel__facilities__item wow fadeInDown" data-wow-duration="1.2s">
                                    <div class="head__wrap">
                                        <img src="assets/img/room/seats.png" alt="img">
                                        <h5>
                                            <a href="car-grid.html">
                                                Comfortable setas
                                            </a>
                                        </h5>
                                    </div>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered...
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="hotel__facilities__item wow fadeInDown" data-wow-duration="1.4s">
                                    <div class="head__wrap">
                                        <img src="assets/img/room/hotcoffee.png" alt="img">
                                        <h5>
                                            <a href="car-grid.html">
                                                Hot Coffee
                                            </a>
                                        </h5>
                                    </div>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered...
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="hotel__facilities__item wow fadeInDown" data-wow-duration="1.6s">
                                    <div class="head__wrap">
                                        <img src="assets/img/room/wifi.png" alt="img">
                                        <h5>
                                            <a href="car-grid.html">
                                                Unlimited WIFI
                                            </a>
                                        </h5>
                                    </div>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered...
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="hotel__facilities__item wow fadeInDown" data-wow-duration="1.4s">
                                    <div class="head__wrap">
                                        <img src="assets/img/room/supports.png" alt="img">
                                        <h5>
                                            <a href="car-grid.html">
                                                Unlimited Support
                                            </a>
                                        </h5>
                                    </div>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered...
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carshape">
            <img src="assets/img/cars/carshapeapp.png" alt="img">
        </div>
    </section>
    <!--cars facilities End -->

    <!-- cars ticket here -->
    <section class="cars__ticket bgsection pt-120 pb-120">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="train__ticket__content car__ticket__content">
                        <div class="section__header mb__30 wow fadeInDown">
                            <h2>
                                We provide car rental services worldwide
                            </h2>
                            <p>
                                There are many variations of passages of Lorem Ipsum available, but the  have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use...
                            </p>
                        </div>
                        <ul class="offer__list pb__40 wow fadeInUp">
                            <li>
                     <span class="thumb">
                        <img src="assets/img/bus/b3.png" alt="img">
                     </span>
                                <span class="text">
                        Unlimited Offers
                     </span>
                            </li>
                            <li>
                     <span class="thumb">
                        <img src="assets/img/bus/b2.png" alt="img">
                     </span>
                                <span class="text">
                        24X7 Support
                     </span>
                            </li>
                            <li>
                     <span class="thumb">
                        <img src="assets/img/bus/b6.png" alt="img">
                     </span>
                                <span class="text">
                        Cheapest Price
                     </span>
                            </li>
                            <li>
                     <span class="thumb">
                        <img src="assets/img/bus/b4.png" alt="img">
                     </span>
                                <span class="text">
                        100% Trust pay
                     </span>
                            </li>
                        </ul>
                        <a href="car-list.html" class="cmn__btn wow fadeInDown">
                  <span>
                     Explore deals
                  </span>
                        </a>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-5">
                    <div class="worldwide__tumb__wrapper">
                        <div class="thumb__innner">
                            <div class="tumb wow fadeInDown" data-wow-duration="1.2s">
                                <img src="assets/img/cars/car1.jpg" alt="img">
                            </div>
                            <div class="tumb wow fadeInUp" data-wow-duration="1.2s">
                                <img src="assets/img/cars/car2.jpg" alt="img">
                            </div>
                        </div>
                        <div class="thumb__innner">
                            <div class="tumb wow fadeInUp" data-wow-duration="1.2s">
                                <img src="assets/img/cars/carman1.jpg" alt="img">
                            </div>
                            <div class="tumb wow fadeInDown" data-wow-duration="1.2s">
                                <img src="assets/img/cars/carman2.jpg" alt="img">
                            </div>
                        </div>
                        <div class="car__rount">
                            <img src="assets/img/cars/carround.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cars ticket end -->

    <!--cars facilities here -->
    <section class="hotel__facilities  pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-7 col-lg-7 wow fadeInDown">
                    <div class="section__header section__center pb__60">
                        <h2>
                            Car Information Service
                        </h2>
                        <p class="max-636">
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form
                        </p>
                    </div>
                </div>
            </div>
            <div class="flight__facilites__wrap bus__facilities__wrap">
                <div class="row flex-row-reverse justify-content-between align-items-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="car__facilities__wrap gy-3 row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="hotel__facilities__item wow fadeInDown" data-wow-duration="1.2s">
                                    <div class="head__wrap">
                                        <img src="assets/img/cars/location.png" alt="img">
                                        <h5>
                                            <a href="car-list.html">
                                                Over 50,000 locations
                                            </a>
                                        </h5>
                                    </div>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available...
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="hotel__facilities__item wow fadeInDown" data-wow-duration="1.4s">
                                    <div class="head__wrap">
                                        <img src="assets/img/cars/bookiing.png" alt="img">
                                        <h5>
                                            <a href="car-list.html">
                                                No booking fees
                                            </a>
                                        </h5>
                                    </div>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available...
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="hotel__facilities__item wow fadeInDown" data-wow-duration="1.6s">
                                    <div class="head__wrap">
                                        <img src="assets/img/cars/rental.png" alt="img">
                                        <h5>
                                            <a href="car-list.html">
                                                Low rental rates
                                            </a>
                                        </h5>
                                    </div>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available...
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="hotel__facilities__item wow fadeInDown" data-wow-duration="1.4s">
                                    <div class="head__wrap">
                                        <img src="assets/img/cars/customer.png" alt="img">
                                        <h5>
                                            <a href="car-list.html">
                                                24/7 customer service
                                            </a>
                                        </h5>
                                    </div>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available...
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="car__facilitiesthumb2">
                            <img src="assets/img/cars/car-ingo.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--cars facilities End -->

    <!-- cars client here -->
    <section class="cars__testimonial__section bgsection pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center justify-content-between">
                <div class="col-xxl-5 col-xl-6 col-lg-6">
                    <div class="carss__testimonial owl-theme owl-carousel">
                        <div class="flight__client__item">
                            <div class="header">
                                <img src="assets/img/testimonial/commonquote.png" alt="img">
                                <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                </p>
                            </div>
                            <div class="lastcommon">
                                <img src="assets/img/testimonial/devid.png" alt="img">
                                <ul class="ratting">
                                    <li>
                                        <img src="assets/img/testimonial/star.png" alt="img">
                                    </li>
                                    <li>
                                        <img src="assets/img/testimonial/star.png" alt="img">
                                    </li>
                                    <li>
                                        <img src="assets/img/testimonial/star.png" alt="img">
                                    </li>
                                    <li>
                                        <img src="assets/img/testimonial/wihtstar.png" alt="img">
                                    </li>
                                    <li>
                                        <img src="assets/img/testimonial/wihtstar.png" alt="img">
                                    </li>
                                </ul>
                                <h5>
                                    Devid Warner
                                </h5>
                                <span class="degisnation">
                        Customer
                     </span>
                            </div>
                        </div>
                        <div class="flight__client__item">
                            <div class="header">
                                <img src="assets/img/testimonial/commonquote.png" alt="img">
                                <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                </p>
                            </div>
                            <div class="lastcommon">
                                <img src="assets/img/testimonial/wilsond.png" alt="img">
                                <ul class="ratting">
                                    <li>
                                        <img src="assets/img/testimonial/star.png" alt="img">
                                    </li>
                                    <li>
                                        <img src="assets/img/testimonial/star.png" alt="img">
                                    </li>
                                    <li>
                                        <img src="assets/img/testimonial/star.png" alt="img">
                                    </li>
                                    <li>
                                        <img src="assets/img/testimonial/wihtstar.png" alt="img">
                                    </li>
                                    <li>
                                        <img src="assets/img/testimonial/wihtstar.png" alt="img">
                                    </li>
                                </ul>
                                <h5>
                                    Jenny Wilson
                                </h5>
                                <span class="degisnation">
                        Marketing Coordinator
                     </span>
                            </div>
                        </div>
                        <div class="flight__client__item">
                            <div class="header">
                                <img src="assets/img/testimonial/commonquote.png" alt="img">
                                <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                </p>
                            </div>
                            <div class="lastcommon">
                                <img src="assets/img/testimonial/cody.png" alt="img">
                                <ul class="ratting">
                                    <li>
                                        <img src="assets/img/testimonial/star.png" alt="img">
                                    </li>
                                    <li>
                                        <img src="assets/img/testimonial/star.png" alt="img">
                                    </li>
                                    <li>
                                        <img src="assets/img/testimonial/star.png" alt="img">
                                    </li>
                                    <li>
                                        <img src="assets/img/testimonial/wihtstar.png" alt="img">
                                    </li>
                                    <li>
                                        <img src="assets/img/testimonial/wihtstar.png" alt="img">
                                    </li>
                                </ul>
                                <h5>
                                    Cody Fisher
                                </h5>
                                <span class="degisnation">
                        Medical Assistant
                     </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 wow fadeInDown">
                    <div class="section__header">
                        <h2>
                            What do clients tell us?
                        </h2>
                        <p class="pb__40">
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators...
                        </p>
                        <a href="car-grid.html" class="cmn__btn">
                  <span>
                     Explore deals
                  </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="car__quote">
            <img src="assets/img/cars/quote.png" alt="img">
        </div>
    </section>
    <!-- cars client End -->

    <!--cars two qustions start-->
    <section class="question__section pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center wow fadeInDown">
                <div class="col-lg-6">
                    <div class="section__header section__center pb__40">
                        <h2>
                            If you got questions we have answer
                        </h2>
                        <p>
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="qustion__content">
                        <div class="accordion__wrap">
                            <div class="accordion" id="accordionExample">
                                <!--Accordion items-->
                                <div class="accordion-item wow fadeInUp" data-wow-duration="0.9s">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            What is e recharge?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--Accordion items-->
                                <div class="accordion-item wow fadeInUp" data-wow-duration="1s">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            What is recharge credit?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--Accordion items-->
                                <div class="accordion-item wow fadeInUp" data-wow-duration="1.4s">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            How reliable is recharge com?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--Accordion items-->
                                <div class="accordion-item wow fadeInUp" data-wow-duration="1.6s">
                                    <h2 class="accordion-header" id="headingThreem">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreem" aria-expanded="false" aria-controls="collapseThreem">
                                            What is recharge application?
                                        </button>
                                    </h2>
                                    <div id="collapseThreem" class="accordion-collapse collapse" aria-labelledby="headingThreem" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--Accordion items-->
                                <div class="accordion-item wow fadeInUp" data-wow-duration="1.8s">
                                    <h2 class="accordion-header" id="headingThreemm">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreemm" aria-expanded="false" aria-controls="collapseThreemm">
                                            How do I recharge a phone number?
                                        </button>
                                    </h2>
                                    <div id="collapseThreemm" class="accordion-collapse collapse" aria-labelledby="headingThreemm" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--Accordion items-->
                                <div class="accordion-item wow fadeInUp" data-wow-duration="1.9s">
                                    <h2 class="accordion-header" id="headingThreemmm">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreemmm" aria-expanded="false" aria-controls="collapseThreemmm">
                                            What is the primary function of the recharge payment application?
                                        </button>
                                    </h2>
                                    <div id="collapseThreemmm" class="accordion-collapse collapse" aria-labelledby="headingThreemmm" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--Accordion items-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--cars two qustions start-->

@endsection
