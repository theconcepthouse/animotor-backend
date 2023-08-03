@extends('frontpage.layout')

@section('content')

    <section class="banner-section banner-slider">
        <div class="container">
            <div class="home-banner">
                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-down">
                        <p class="explore-text"> <span><i class="fa-solid fa-thumbs-up me-2"></i></span>100% Trusted car, hotel, flight booking platform in Nigeria</p>
                        <h1>Go connect <br>
                            <span>Your One-Stop Travel Companion</span></h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        <div class="view-all">
                            <a href="#" class="btn btn-view d-inline-flex align-items-center">Download app <span><i class="feather-arrow-right ms-2"></i></span></a>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-down">
                        <div class="banner-imgs">
                            <img src="/assets/img/car-right.png" class="img-fluid aos" alt="bannerimage">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="section-search">
        <div class="container">
            <div class="search-box-banner">
                <form action="#">
                    <ul class="align-items-center">
                        <li class="column-group-main">
                            <div class="form-group">
                                <label>Pickup Location</label>
                                <div class="group-img">
                                    <input type="text" class="form-control" placeholder="Enter City, Airport, or Address">
                                    <span><i class="feather-map-pin"></i></span>
                                </div>
                            </div>
                        </li>
                        <li class="column-group-main">
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


    <section class="section services">
        <div class="service-right">
            <img src="/assets/img/bg/service-right.svg" class="img-fluid" alt="services right">
        </div>
        <div class="container">

            <div class="section-heading" data-aos="fade-down">
                <h2>How It Works</h2>
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
            </div>

            <div class="services-work">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12" data-aos="fade-down">
                        <div class="services-group">
                            <div class="services-icon border-secondary">
                                <img class="icon-img bg-secondary" src="/assets/img/icons/services-icon-01.svg" alt="Choose Locations">
                            </div>
                            <div class="services-content">
                                <h3>1. Choose Locations</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12" data-aos="fade-down">
                        <div class="services-group">
                            <div class="services-icon border-warning">
                                <img class="icon-img bg-warning" src="/assets/img/icons/services-icon-01.svg" alt="Choose Locations">
                            </div>
                            <div class="services-content">
                                <h3>2. Pick-Up Locations</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12" data-aos="fade-down">
                        <div class="services-group">
                            <div class="services-icon border-dark">
                                <img class="icon-img bg-dark" src="/assets/img/icons/services-icon-01.svg" alt="Choose Locations">
                            </div>
                            <div class="services-content">
                                <h3>3. Book your service</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section popular-car-type">
        <div class="container">

            <div class="section-heading" data-aos="fade-down">
                <h2>Most Popular Cartypes</h2>
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
            </div>

            <div class="row">
                <div class="popular-slider-group">
                    <div class="owl-carousel popular-cartype-slider owl-theme">

                        <div class="listing-owl-item">
                            <div class="listing-owl-group">
                                <div class="listing-owl-img">
                                    <img src="/assets/img/cars/mp-vehicle-01.png" class="img-fluid" alt="Popular Cartypes">
                                </div>
                                <h6>Crossover</h6>
                                <p>35 Cars</p>
                            </div>
                        </div>


                        <div class="listing-owl-item">
                            <div class="listing-owl-group">
                                <div class="listing-owl-img">
                                    <img src="/assets/img/cars/mp-vehicle-02.png" class="img-fluid" alt="Popular Cartypes">
                                </div>
                                <h6>Sports Coupe</h6>
                                <p>45 Cars</p>
                            </div>
                        </div>


                        <div class="listing-owl-item">
                            <div class="listing-owl-group">
                                <div class="listing-owl-img">
                                    <img src="/assets/img/cars/mp-vehicle-03.png" class="img-fluid" alt="Popular Cartypes">
                                </div>
                                <h6>Sedan</h6>
                                <p>15 Cars</p>
                            </div>
                        </div>


                        <div class="listing-owl-item">
                            <div class="listing-owl-group">
                                <div class="listing-owl-img">
                                    <img src="/assets/img/cars/mp-vehicle-04.png" class="img-fluid" alt="Popular Cartypes">
                                </div>
                                <h6>Pickup</h6>
                                <p>17 Cars</p>
                            </div>
                        </div>


                        <div class="listing-owl-item">
                            <div class="listing-owl-group">
                                <div class="listing-owl-img">
                                    <img src="/assets/img/cars/mp-vehicle-05.png" class="img-fluid" alt="Popular Cartypes">
                                </div>
                                <h6>Family MPV</h6>
                                <p>24 Cars</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>


    <section class="section facts-number">
        <div class="facts-left">
            <img src="/assets/img/bg/facts-left.png" class="img-fluid" alt="facts left">
        </div>
        <div class="facts-right">
            <img src="/assets/img/bg/facts-right.png" class="img-fluid" alt="facts right">
        </div>
        <div class="container">

            <div class="section-heading" data-aos="fade-down">
                <h2 class="title text-white">Facts By The Numbers</h2>
                <p class="description text-white">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
            </div>

            <div class="counter-group">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down">
                        <div class="count-group flex-fill">
                            <div class="customer-count d-flex align-items-center">
                                <div class="count-img">
                                    <img src="/assets/img/icons/bx-heart.svg" alt>
                                </div>
                                <div class="count-content">
                                    <h4><span class="counterUp">16</span>K+</h4>
                                    <p>Happy Customers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down">
                        <div class="count-group flex-fill">
                            <div class="customer-count d-flex align-items-center">
                                <div class="count-img">
                                    <img src="/assets/img/icons/bx-car.svg" alt>
                                </div>
                                <div class="count-content">
                                    <h4><span class="counterUp">2547</span>+</h4>
                                    <p>Count of Cars</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down">
                        <div class="count-group flex-fill">
                            <div class="customer-count d-flex align-items-center">
                                <div class="count-img">
                                    <img src="/assets/img/icons/bx-headphone.svg" alt>
                                </div>
                                <div class="count-content">
                                    <h4><span class="counterUp">625</span>K+</h4>
                                    <p>Car Center Solutions</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down">
                        <div class="count-group flex-fill">
                            <div class="customer-count d-flex align-items-center">
                                <div class="count-img">
                                    <img src="/assets/img/icons/bx-history.svg" alt>
                                </div>
                                <div class="count-content">
                                    <h4><span class="counterUp">200</span>K+</h4>
                                    <p>Total Kilometer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section why-choose popular-explore">
        <div class="choose-left">
            <img src="/assets/img/bg/choose-left.png" class="img-fluid" alt="Why Choose Us">
        </div>
        <div class="container">

            <div class="section-heading" data-aos="fade-down">
                <h2>Why Choose Us</h2>
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
            </div>

            <div class="why-choose-group">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 d-flex" data-aos="fade-down">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <div class="choose-img choose-black">
                                    <img src="/assets/img/icons/bx-user-check.svg" alt>
                                </div>
                                <div class="choose-content">
                                    <h4>Easy & Fast Booking</h4>
                                    <p>Completely carinate e business testing process whereas fully researched customer service. Globally extensive content with quality.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 d-flex" data-aos="fade-down">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <div class="choose-img choose-secondary">
                                    <img src="/assets/img/icons/bx-user-check.svg" alt>
                                </div>
                                <div class="choose-content">
                                    <h4>Many Pickup Location</h4>
                                    <p>Enthusiastically magnetic initiatives with cross-platform sources. Dynamically target testing procedures through effective.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 d-flex" data-aos="fade-down">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <div class="choose-img choose-primary">
                                    <img src="/assets/img/icons/bx-user-check.svg" alt>
                                </div>
                                <div class="choose-content">
                                    <h4>Customer Satisfaction</h4>
                                    <p>Globally user centric method interactive. Seamlessly revolutionize unique portals corporate collaboration.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="section faq-section bg-light-primary">
        <div class="container">

            <div class="section-heading" data-aos="fade-down">
                <h2>Frequently Asked Questions </h2>
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
            </div>

            <div class="faq-info">
                <div class="faq-card bg-white" data-aos="fade-down">
                    <h4 class="faq-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#faqOne" aria-expanded="false">What is about rental car deals?</a>
                    </h4>
                    <div id="faqOne" class="card-collapse collapse">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="faq-card bg-white" data-aos="fade-down">
                    <h4 class="faq-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#faqTwo" aria-expanded="false">In which areas do you operate?</a>
                    </h4>
                    <div id="faqTwo" class="card-collapse collapse">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="faq-card bg-white" data-aos="fade-down">
                    <h4 class="faq-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#faqThree" aria-expanded="false">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium?</a>
                    </h4>
                    <div id="faqThree" class="card-collapse collapse">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="faq-card bg-white" data-aos="fade-down">
                    <h4 class="faq-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#faqFour" aria-expanded="false">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia?</a>
                    </h4>
                    <div id="faqFour" class="card-collapse collapse">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="faq-card bg-white" data-aos="fade-down">
                    <h4 class="faq-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#faqFive" aria-expanded="false">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor?</a>
                    </h4>
                    <div id="faqFive" class="card-collapse collapse">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="faq-card bg-white" data-aos="fade-down">
                    <h4 class="faq-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#faqSix" aria-expanded="false">eque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit?</a>
                    </h4>
                    <div id="faqSix" class="card-collapse collapse">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="faq-card bg-white" data-aos="fade-down">
                    <h4 class="faq-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#faqSeven" aria-expanded="false">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod?</a>
                    </h4>
                    <div id="faqSeven" class="card-collapse collapse">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
