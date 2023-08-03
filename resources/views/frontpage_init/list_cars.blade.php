@extends('frontpage.layout')

@section('style')
    <link rel="stylesheet" href="assets/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
@endsection
@section('content')

    @if(settings('nav_style') == 'nav_inline')
    <section class="banner-section">

        <div class="container">
            <div class="home-banner">
                @include('frontpage.partials.inline_menu')
            </div>
        </div>
    </section>
    @endif


    <div class="section-search mt-5">



        <div class="container">

            <div class="search-box-banner">
            <div class="row booking-info">
                <div class="col-md-4 col-sm-6 pickup-address">
                    <h5>Pickup</h5>
                    <p>45, 4th Avanue Mark Street USA</p>
                    <span>Date &amp; time : 11 Jan 2023</span>
                </div>
                <div class="col-md-4 col-sm-6 drop-address">
                    <h5>Drop Off</h5>
                    <p>78, 10th street Laplace USA</p>
                    <span>Date &amp; time : 11 Jan 2023</span>
                </div>

                <div class="col-md-4 col-sm-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-primary btn-lg"><span><i class="feather-edit-3"></i></span> Edit</a>
                </div>
            </div>
            </div>

            <div class="search-box-banner mt-3">
                <h4 class="title"><strong>Edit Search</strong></h4>

                <form action="/list" class="mt-4">
                    <ul class="align-items-center">
                        <li class="column-group-main-2 mb-3">
                            <div class="form-group">
                                <label>Pickup Location</label>
                                <div class="group-img">
                                    <input type="text" class="form-control" placeholder="Enter City, Airport, or Address">
                                    <span><i class="feather-map-pin"></i></span>
                                </div>
                            </div>
                        </li>
                        <li class="column-group-main-2 mb-3">
                            <div class="form-group">
                                <label>Drop-off Location</label>
                                <div class="group-img">
                                    <input type="text" class="form-control" placeholder="Enter City, Airport, or Address">
                                    <span><i class="feather-map-pin"></i></span>
                                </div>
                            </div>
                        </li>


                        <li class="column-group-main ">
                            <div class="form-group">
                                <label>Pickup Date</label>
                            </div>
                            <div class="form-group-wrapp">
                                <div class="form-group date-widget">
                                    <div class="group-img">
                                        <input type="text" class="form-control datetimepicker" placeholder="04/11/2023">
                                        <span><i class="feather-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="form-group time-widge">
                                    <div class="group-img">
                                        <input type="text" class="form-control timepicker" placeholder="11:00 AM">
                                        <span><i class="feather-clock"></i></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="column-group-main">
                            <div class="form-group">
                                <label>Return Date</label>
                            </div>
                            <div class="form-group-wrapp">
                                <div class="form-group date-widge">
                                    <div class="group-img">
                                        <input type="text" class="form-control datetimepicker" placeholder="04/11/2023">
                                        <span><i class="feather-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="form-group time-widge">
                                    <div class="group-img">
                                        <input type="text" class="form-control timepicker" placeholder="11:00 AM">
                                        <span><i class="feather-clock"></i></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="column-group-last">
                            <div class="form-group">
                                <div class="search-btn">
                                    <button class="btn search-button" type="submit"> <i class="fa fa-search" aria-hidden="true"></i>Search</button>
                                </div>
                            </div>
                        </li>


                    </ul>
                </form>
            </div>
        </div>
    </div>


    <section class="section car-listing">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 theiaStickySidebar sidebar-section">
                    <form action="#" autocomplete="off" class="sidebar-form">

                        <div class="sidebar-heading">
                            <h3>Filter</h3>
                        </div>
                        <hr />

                        <div class="accordion" id="location">
                            <div class="card-header-new" id="locationHeading">
                                <h6 class="filter-title">
                                    <a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse" data-bs-target="#locationItem" aria-expanded="true" aria-controls="locationItem">
                                        Location (London Heathrow Airport)
{{--                                        <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>--}}
                                    </a>
                                </h6>
                            </div>
                            <div id="locationItem" class="collapse show" aria-labelledby="locationHeading" data-bs-parent="#locationHeading">
                                <div class="card-body-chat">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="">
                                                <div class="selectBox-cont">
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Airport (in terminal)
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Airport (meet & greet)
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Airport (Shuttle)
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion" id="price">
                            <div class="card-header-new" id="priceHeading">
                                <h6 class="filter-title">
                                    <a href="javascript:void(0);" class="w-100 collapse" data-bs-toggle="collapse" data-bs-target="#priceItem" aria-expanded="true" aria-controls="priceItem">
                                        Price per day
                                    </a>
                                </h6>
                            </div>
                            <div id="priceItem" class="collapse show" aria-labelledby="priceHeading" data-bs-parent="#priceSection">
                                <div class="card-body-chat">
                                    <div class="filter-range">
                                        <input type="text" class="input-range">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion" id="carSpecs">
                            <div class="card-header-new" id="carSpecsHeading">
                                <h6 class="filter-title">
                                    <a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse" data-bs-target="#carSpecsItem" aria-expanded="true" aria-controls="carSpecsItem">
                                        Car Specs
                                        {{--                                        <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>--}}
                                    </a>
                                </h6>
                            </div>
                            <div id="carSpecsItem" class="collapse show" aria-labelledby="carSpecsHeading" data-bs-parent="#carSpecsHeading">
                                <div class="card-body-chat">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="">
                                                <div class="selectBox-cont">
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Air conditioning
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> 4+ door
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion" id="electric">
                            <div class="card-header-new" id="electricHeading">
                                <h6 class="filter-title">
                                    <a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse" data-bs-target="#electricItem" aria-expanded="true" aria-controls="electricItem">
                                        Electric cars
                                        {{--                                        <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>--}}
                                    </a>
                                </h6>
                            </div>
                            <div id="electricItem" class="collapse show" aria-labelledby="electricItem" data-bs-parent="#electricHeading">
                                <div class="card-body-chat">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="">
                                                <div class="selectBox-cont">
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Fully electricity
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Hybrid
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Plug-in hybrid
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion" id="mileage">
                            <div class="card-header-new" id="mileageHeading">
                                <h6 class="filter-title">
                                    <a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse" data-bs-target="#mileageItem" aria-expanded="true" aria-controls="mileageItem">
                                        Mileage / Kilometres
                                    </a>
                                </h6>
                            </div>
                            <div id="mileageItem" class="collapse show" aria-labelledby="mileageItem" data-bs-parent="#mileageHeading">
                                <div class="card-body-chat">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="">
                                                <div class="selectBox-cont">
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Limited
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Unlimited
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion" id="transmission">
                            <div class="card-header-new" id="transmissionHeading">
                                <h6 class="filter-title">
                                    <a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse" data-bs-target="#transmissionItem" aria-expanded="true" aria-controls="transmissionItem">
                                        Transmission
                                    </a>
                                </h6>
                            </div>
                            <div id="transmissionItem" class="collapse show" aria-labelledby="transmissionItem" data-bs-parent="#transmissionHeading">
                                <div class="card-body-chat">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="">
                                                <div class="selectBox-cont">
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Automatic
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Manual
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion" id="category">
                            <div class="card-header-new" id="categoryHeading">
                                <h6 class="filter-title">
                                    <a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse" data-bs-target="#categoryItem" aria-expanded="true" aria-controls="categoryItem">
                                        Transmission
                                    </a>
                                </h6>
                            </div>
                            <div id="categoryItem" class="collapse show" aria-labelledby="categoryItem" data-bs-parent="#categoryHeading">
                                <div class="card-body-chat">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="">
                                                <div class="selectBox-cont">
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Small
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Medium
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Large
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Estate
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Premium
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> People carriers
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> SUVs
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion" id="fuel">
                            <div class="card-header-new" id="fuelHeading">
                                <h6 class="filter-title">
                                    <a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse" data-bs-target="#transmissionItem" aria-expanded="true" aria-controls="transmissionItem">
                                        Fuel
                                    </a>
                                </h6>
                            </div>
                            <div id="fuelItem" class="collapse show" aria-labelledby="fuelItem" data-bs-parent="#fuelHeading">
                                <div class="card-body-chat">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="">
                                                <div class="selectBox-cont">
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Like for like
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion" id="category">
                            <div class="card-header-new" id="supplierHeading">
                                <h6 class="filter-title">
                                    <a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse" data-bs-target="#supplierItem" aria-expanded="true" aria-controls="supplierItem">
                                        Supplier
                                    </a>
                                </h6>
                            </div>
                            <div id="supplierItem" class="collapse show" aria-labelledby="supplierItem" data-bs-parent="#supplierHeading">
                                <div class="card-body-chat">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="">
                                                <div class="selectBox-cont">
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Drivalia
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Green Motion
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Sixt
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Surprice
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <button type="submit" class="d-inline-flex align-items-center justify-content-center btn w-100 btn-primary filter-btn">
                            <span><i class="feather-filter me-2"></i></span>Filter results
                        </button>
                        <a href class="reset-filter">Reset Filter</a>
                    </form>
                </div>
                <div class="col-xl-9 col-sm-12 col-12">
                    <div class="row">

                        <div class="mb-3">
                            <h4>45, 4th Avanue Mark Street USA : 12 cars available</h4>

                            <div class="alert alert-primary mt-4">
                                <span><i class="feather-info"></i></span>
                                In the last 24hours, over 20 customers have booked a car in this location
                            </div>
                        </div>


                        <div class="row">
                            <div class="popular-slider-group">
                                <div class="owl-carousel popular-cartype-slider owl-theme">

                                    <div class="listing-owl-item">
                                        <div class="listing-owl-group">
                                            <div class="listing-owl-img">
                                                <img src="assets/img/cars/mp-vehicle-01.png" class="img-fluid" alt="Popular Cartypes">
                                            </div>
                                            <h6>Crossover</h6>
                                            <p>35 Cars</p>
                                        </div>
                                    </div>


                                    <div class="listing-owl-item">
                                        <div class="listing-owl-group">
                                            <div class="listing-owl-img">
                                                <img src="assets/img/cars/mp-vehicle-02.png" class="img-fluid" alt="Popular Cartypes">
                                            </div>
                                            <h6>Sports Coupe</h6>
                                            <p>45 Cars</p>
                                        </div>
                                    </div>


                                    <div class="listing-owl-item">
                                        <div class="listing-owl-group">
                                            <div class="listing-owl-img">
                                                <img src="assets/img/cars/mp-vehicle-03.png" class="img-fluid" alt="Popular Cartypes">
                                            </div>
                                            <h6>Sedan</h6>
                                            <p>15 Cars</p>
                                        </div>
                                    </div>


                                    <div class="listing-owl-item">
                                        <div class="listing-owl-group">
                                            <div class="listing-owl-img">
                                                <img src="assets/img/cars/mp-vehicle-04.png" class="img-fluid" alt="Popular Cartypes">
                                            </div>
                                            <h6>Pickup</h6>
                                            <p>17 Cars</p>
                                        </div>
                                    </div>


                                    <div class="listing-owl-item">
                                        <div class="listing-owl-group">
                                            <div class="listing-owl-img">
                                                <img src="assets/img/cars/mp-vehicle-05.png" class="img-fluid" alt="Popular Cartypes">
                                            </div>
                                            <h6>Family MPV</h6>
                                            <p>24 Cars</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>



                    @foreach([[],[],[],[],[],[]] as $item)
                        <div class="listview-car">
                            <div class="card">
                                <div class="blog-widget d-flex">
                                    <div class="blog-img">
                                        <a href="listing-details.html">
                                            <img src="assets/img/car-list-2.jpg" class="img-fluid" alt="blog-img">
                                        </a>
                                    </div>
                                    <div class="bloglist-content w-100">
                                        <div class="card-body">
                                            <div class="blog-list-head d-flex">
                                                <div class="blog-list-title">
                                                    <h5><a href="#">Ferrari 458</a> <span class="text-muted">or similar car</span></h5>
                                                </div>
                                                <div class="blog-list-rate">
                                                    <div class="list-rating">
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <span>(5.0)</span>
                                                    </div>
                                                    <h6>$400 <span>/ Day</span></h6>
                                                </div>
                                            </div>
                                            <div class="listing-details-group">
                                                <ul>
                                                    <li>
                                                        <span><img src="assets/img/icons/car-parts-05.svg" alt="Auto"></span>
                                                        <p>Auto</p>
                                                    </li>
                                                    <li>
                                                        <span><img src="assets/img/icons/car-parts-02.svg" alt="10 KM"></span>
                                                        <p>10 KM</p>
                                                    </li>
                                                    <li>
                                                        <span><img src="assets/img/icons/car-parts-03.svg" alt="Petrol"></span>
                                                        <p>Petrol</p>
                                                    </li>
                                                    <li>
                                                        <span><img src="assets/img/icons/car-parts-04.svg" alt="Power"></span>
                                                        <p>Power</p>
                                                    </li>
                                                    <li>
                                                        <span><img src="assets/img/icons/car-parts-05.svg" alt="2018"></span>
                                                        <p>2018</p>
                                                    </li>
                                                    <li>
                                                        <span><img src="assets/img/icons/car-parts-06.svg" alt="Persons"></span>
                                                        <p>5 Persons</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="blog-list-head list-head-bottom d-flex">
                                                <div class="blog-list-title">
                                                    <div class="title-bottom">
                                                        <div class="car-list-icon">
                                                            <img src="assets/img/cars/car-list-icon-02.png" alt>
                                                        </div>
                                                        <div class="address-info">
                                                            <h5><a href>Toyota Of Lincoln Park</a></h5>
                                                            <h6><i class="feather-map-pin me-2"></i>Newyork, USA</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="listing-button">
                                                    <a href="listing-details.html" type="sumit" class="btn btn-order"><span><i class="feather-calendar me-2"></i></span>Rent Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <div class="blog-pagination">
                        <nav>
                            <ul class="pagination page-item justify-content-center">
                                <li class="previtem">
                                    <a class="page-link" href="#"><i class="fas fa-regular fa-arrow-left me-2"></i> Prev</a>
                                </li>
                                <li class="justify-content-center pagination-center">
                                    <div class="page-group">
                                        <ul>
                                            <li class="page-item">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="active page-link" href="#">2 <span class="visually-hidden">(current)</span></a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">4</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">5</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nextlink">
                                    <a class="page-link" href="#">Next <i class="fas fa-regular fa-arrow-right ms-2"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
