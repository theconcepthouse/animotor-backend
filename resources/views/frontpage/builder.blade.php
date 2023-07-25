@extends('frontpage.layout')


@section('content')

    <section class="banner-section banner-slider bg-black">

        <div class="container">


            <div class="home-banner">

                @include('frontpage.partials.inline_menu')

                <div class="banner_content">
                    <div class="row align-items-center">
                        <div class="col-lg-6" data-aos="fade-down">

                            <h2><span>Car hire for any kind <br> of trip</span></h2>
                            <br/>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>

                        </div>
                        <div class="col-lg-6" data-aos="fade-down">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <div class="section-search">
        <div class="container">
            <div class="search-box-banner">
                <p class="title"><strong>Book a car</strong></p>

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


    <section class="section services">
        <div class="service-right">
            <img src="/assets/img/bg/service-right.svg" class="img-fluid" alt="services right">
        </div>
        <div class="container  " data-aos="fade-down">
            <div class="sign-up-banner">
                <div class="inner-section">
                    <div class="row">
                        <div class="col-md-8">
                            <h6>Sign in to save 10% with Genius</h6>
                            <p class="mt-3">You're eligible for discounts on select car rentals.</p>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end align-items-center">
                            <a class="btn btn-default">Sign up now</a>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="container mt-5">
            <div class="services-work">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12" data-aos="fade-down">
                        <div class="services-group">
                            <div class="services-icon">
                                <img class="" src="/assets/img/support.png" alt="Choose Locations">
                            </div>
                            <div class="services-content">
                                <h3>We're here for you</h3>
                                <p>Providing customer support in <br/> over 30 languages</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12" data-aos="fade-down">
                        <div class="services-group">
                            <div class="services-icon">
                                <img class="" src="/assets/img/date.png" alt="Choose Locations">
                            </div>
                            <div class="services-content">
                                <h3>Free Cancellation</h3>
                                <p>On most booking, up to 48 hours  <br/>  before pick-up</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-12" data-aos="fade-down">
                        <div class="services-group">
                            <div class="services-icon">
                                <img class="" src="/assets/img/like.png" alt="Choose Locations">
                            </div>
                            <div class="services-content">
                                <h3>5 million+ reviews</h3>
                                <p>By verified customers</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="section  testimonials-section">
        <div class="container testimonial bg-light-primary p-5">

            <div class="section-heading" data-aos="fade-down">
                <h4 class="title">What our clients say about us? </h4>
                <p class="description ">Satisfied customers on Animotors</p>
            </div>

            <div class="owl-carousel about-testimonials testimonial-group mb-0 owl-theme">

                <div class="testimonial-item- d-flex">
                    <div class="card- flex-fill">
                        <div class="card-body-">

                            <div class="review-box d-flex flex-column">
                                <div class="text-center testimonial-text justify-content-center" style="max-width: 600px; padding: 20px">
                                    <img style="height: 50px; width: 50px; display : inline" class="text-center " src="/assets/img/comment.png" />

                                    <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        Ut </p>
                                </div>

                                <div class="review-profile mt-3">
                                <div class="review-img">
                                    <img src="assets/img/profiles/avatar-02.jpg" class="img-fluid" alt="img">
                                </div>
                                </div>
                                <div class="review-details mt-3 text-center">
                                    <h6>Rabien Ustoc</h6>
                                    <p>Califonia</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="testimonial-item- d-flex">
                    <div class="card- flex-fill">
                        <div class="card-body-">

                            <div class="review-box d-flex flex-column">
                                <div class="text-center testimonial-text justify-content-center" style="max-width: 600px; padding: 20px">
                                    <img style="height: 50px; width: 50px; display : inline" class="text-center " src="/assets/img/comment.png" />

                                    <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        Ut </p>
                                </div>

                                <div class="review-profile mt-3">
                                <div class="review-img">
                                    <img src="assets/img/profiles/avatar-02.jpg" class="img-fluid" alt="img">
                                </div>
                                </div>
                                <div class="review-details mt-3 text-center">
                                    <h6>Rabien Ustoc</h6>
                                    <p>Califonia</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="testimonial-item- d-flex">
                    <div class="card- flex-fill">
                        <div class="card-body-">

                            <div class="review-box d-flex flex-column">
                                <div class="text-center testimonial-text justify-content-center" style="max-width: 600px; padding: 20px">
                                    <img style="height: 50px; width: 50px; display : inline" class="text-center " src="/assets/img/comment.png" />

                                    <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        Ut </p>
                                </div>

                                <div class="review-profile mt-3">
                                <div class="review-img">
                                    <img src="assets/img/profiles/avatar-02.jpg" class="img-fluid" alt="img">
                                </div>
                                </div>
                                <div class="review-details mt-3 text-center">
                                    <h6>Rabien Ustoc</h6>
                                    <p>Califonia</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>




    </section>


    <section class="section faq-section bg-light-primary-">
        <div class="container">

            <div class="section-heading" data-aos="fade-down">
                <h4>Frequently Asked Questions </h4>
            </div>

            <div class="faq-info">
                <div class="faq-card bg-white" data-aos="fade-down">
                    <h4 class="faq-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#faqOne" aria-expanded="false">Can i book a car for my partner, friend, colleague, etc ?</a>
                    </h4>
                    <div id="faqOne" class="card-collapse collapse">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="faq-card bg-white" data-aos="fade-down">
                    <h4 class="faq-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#faqTwo" aria-expanded="false">Any tips on choosing the right car?</a>
                    </h4>
                    <div id="faqTwo" class="card-collapse collapse">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="faq-card bg-white" data-aos="fade-down">
                    <h4 class="faq-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#faqThree" aria-expanded="false">Is the rental price all inclusive</a>
                    </h4>
                    <div id="faqThree" class="card-collapse collapse">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="faq-card bg-white" data-aos="fade-down">
                    <h4 class="faq-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#faqFour" aria-expanded="false">Am i old enough to rent a car ?</a>
                    </h4>
                    <div id="faqFour" class="card-collapse collapse">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>

            </div>
        </div>


        @include('frontpage.partials.hire_destinations')

    </section>





    <section class="section why-choose popular-explore">
        <div class="choose-left">
            <img src="/assets/img/bg/choose-left.png" class="img-fluid" alt="Why Choose Us">
        </div>
        <div class="container">

            <div class="section-heading" data-aos="fade-down">
                <h4>Why Choose Us</h4>
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
                                <div class="choose-img choose-black">
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





@endsection
