@extends('frontpage.layout')

@section('content')
    <!-- Blocks section Here -->
    <div class="common__section overflow-hidden">
        <div class="container-fluid">
            <div class="divided__common__body">
                @section('hide')
                <div class="side__sticky">
                    <ul class="common__sidebar__wrapper">
                        <li class="common__sideitems">
                            <a href="typography.html">
                                Typography
                            </a>
                        </li>
                        <li class="common__sideitems">
                            <a href="blocks-home.html">
                                Banners
                            </a>
                        </li>
                        <li class="common__sideitems">
                            <a href="blocks-allblocks.html" class="active">
                                All Blocks
                            </a>
                        </li>
                        <li class="common__sideitems">
                            <a href="blocks-ordersystem.html">
                                Order System
                            </a>
                        </li>
                        <li class="common__sideitems">
                            <a href="blocks-about.html">
                                About & Refer
                            </a>
                        </li>
                        <li class="common__sideitems">
                            <a href="blocks-list.html">
                                Page List
                            </a>
                        </li>
                        <li class="common__sideitems">
                            <a href="blocks-grid.html">
                                Page Grid
                            </a>
                        </li>
                        <li class="common__sideitems">
                            <a href="blocks-round.html">
                                Round & Oneway
                            </a>
                        </li>
                        <li class="common__sideitems">
                            <a href="blocks-invoice.html">
                                Invoice & Email
                            </a>
                        </li>
                        <li class="common__sideitems">
                            <a href="blocks-signin.html">
                                Sigin & Signup
                            </a>
                        </li>
                        <li class="common__sideitems">
                            <a href="blocks-confirm-details.html">
                                Confirm Details
                            </a>
                        </li>
                        <li class="common__sideitems">
                            <a href="blocks-payments.html">
                                Payment System
                            </a>
                        </li>
                        <li class="common__sideitems">
                            <a href="blocks-successful.html">
                                Successfull
                            </a>
                        </li>
                        <li class="common__sideitems">
                            <a href="blocks-personalinfo.html">
                                Personal Info
                            </a>
                        </li>
                        <li class="common__sideitems">
                            <a href="blocks-testimonial.html">
                                Testimonial
                            </a>
                        </li>
                        <li class="common__sideitems">
                            <a href="blocks-faqs.html">
                                Faq
                            </a>
                        </li>
                        <li class="common__sideitems">
                            <a href="blocks-support.html">
                                Support
                            </a>
                        </li>
                        <li class="common__sideitems">
                            <a href="blocks-contact.html">
                                Contact us
                            </a>
                        </li>
                        <li class="common__sideitems">
                            <a href="blocks-error.html">
                                Error
                            </a>
                        </li>
                    </ul>
                </div>
                @endsection
                <div class="common__body" style="margin-left: 0px">
                    <div class="d-flex- justify-content-between-">

                        <a style="color: #0a53be" href="{{  url()->previous()  }}">Go BACK</a>


                        <h5 class="cmn__title">
                            All Blocks

                        </h5>

                    </div>

                    <!--home one-->
                    <div class="common__body__section pb__60">
                        <div class="container">
                            <div class="common__body__head pb__20">
                                <h4>
                                    Section [1]
                                </h4>
                                <ul class="nav nav-pills" id="pills-tabblocks" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-homeblocks" type="button" role="tab" aria-controls="pills-homeblocks" aria-selected="true">
                                            Preview
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profileblcoks" type="button" role="tab" aria-controls="pills-profileblcoks" aria-selected="false">
                                            Html Code
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content" id="pills-tabContentre">
                            <div class="tab-pane fade show active" id="pills-homeblocks" role="tabpanel" aria-labelledby="pills-home-tab">
                                <section class="roomsuites__section pt-80 pb-120">
                                    <div class="container">
                                        <div class="section__header section__center pb__60 wow fadeInDown">
                                            <h2>
                                                Rooms & Suites
                                            </h2>
                                            <p class="max600">
                                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form
                                            </p>
                                        </div>
                                        <div class="row g-4">
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 wow fadeInDown" data-wow-duration="1.8s">
                                                <div class="rooms">
                                                    <div class="row g-4">
                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="rooms__items">
                                                                <img src="/assets/img/room/largbed1.jpg" alt="img">
                                                                <div class="content__wrap">
                                                                    <div class="content">
                                                                        <h6>
                                                                            $100/Night
                                                                        </h6>
                                                                        <h4>
                                                                            <a href="hotel-list.html">
                                                                                Single Bed Room
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <a href="https://www.youtube.com/watch?v=gpelxzSME04" class="video video-btn">
                                                                    <i class="material-symbols-outlined">
                                                                        play_circle
                                                                    </i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="rooms__items">
                                                                <img src="/assets/img/room/sing1.jpg" alt="img">
                                                                <div class="content__wrap">
                                                                    <div class="content">
                                                                        <h6>
                                                                            $300/Night
                                                                        </h6>
                                                                        <h4>
                                                                            <a href="hotel-list.html">
                                                                                Double Bed
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <a href="https://www.youtube.com/watch?v=gpelxzSME04" class="video video-btn">
                                                                    <i class="material-symbols-outlined">
                                                                        play_circle
                                                                    </i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="rooms__items">
                                                                <img src="/assets/img/room/sing2.jpg" alt="img">
                                                                <div class="content__wrap">
                                                                    <div class="content">
                                                                        <h6>
                                                                            $300/Night
                                                                        </h6>
                                                                        <h4>
                                                                            <a href="hotel-list.html">
                                                                                Family Room
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <a href="https://www.youtube.com/watch?v=gpelxzSME04" class="video video-btn">
                                                                    <i class="material-symbols-outlined">
                                                                        play_circle
                                                                    </i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="2.2s">
                                                <div class="rooms">
                                                    <div class="row g-4">
                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="rooms__items">
                                                                <img src="/assets/img/room/single3.jpg" alt="img">
                                                                <div class="content__wrap">
                                                                    <div class="content">
                                                                        <h6>
                                                                            $300/Night
                                                                        </h6>
                                                                        <h4>
                                                                            <a href="hotel-list.html">
                                                                                Double bed
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <a href="https://www.youtube.com/watch?v=gpelxzSME04" class="video video-btn">
                                                                    <i class="material-symbols-outlined">
                                                                        play_circle
                                                                    </i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="rooms__items">
                                                                <img src="/assets/img/room/single4.jpg" alt="img">
                                                                <div class="content__wrap">
                                                                    <div class="content">
                                                                        <h6>
                                                                            $100/Night
                                                                        </h6>
                                                                        <h4>
                                                                            <a href="hotel-list.html">
                                                                                Single Bed
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <a href="https://www.youtube.com/watch?v=gpelxzSME04" class="video video-btn">
                                                                    <i class="material-symbols-outlined">
                                                                        play_circle
                                                                    </i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="rooms__items">
                                                                <img src="/assets/img/room/largibed2.jpg" alt="img">
                                                                <div class="content__wrap">
                                                                    <div class="content">
                                                                        <h6>
                                                                            $700/Night
                                                                        </h6>
                                                                        <h4>
                                                                            <a href="hotel-list.html">
                                                                                Lusury Be Room
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <a href="https://www.youtube.com/watch?v=gpelxzSME04" class="video video-btn">
                                                                    <i class="material-symbols-outlined">
                                                                        play_circle
                                                                    </i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane fade" id="pills-profileblcoks" role="tabpanel" aria-labelledby="pills-profile-tab">
                     <pre><code class="language-markup"><!--

                   <section class="roomsuites__section pt-120 pb-120">
                           <div class="container">
                              <div class="section__header section__center pb__60 wow fadeInDown">
                                 <h2>
                                    Rooms & Suites
                                 </h2>
                                 <p class="max600">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form
                                 </p>
                              </div>
                              <div class="row g-4">
                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 wow fadeInDown" data-wow-duration="1.8s">
                                    <div class="rooms">
                                       <div class="row g-4">
                                          <div class="col-xl-12 col-lg-12">
                                             <div class="rooms__items">
                                                <img src="/assets/img/room/largbed1.jpg" alt="img">
                                                <div class="content__wrap">
                                                   <div class="content">
                                                      <h6>
                                                         $100/Night
                                                      </h6>
                                                      <h4>
                                                         <a href="hotel-list.html">
                                                            Single Bed Room
                                                         </a>
                                                      </h4>
                                                   </div>
                                                </div>
                                                <a href="https://www.youtube.com/watch?v=gpelxzSME04" class="video video-btn">
                                                   <i class="material-symbols-outlined">
                                                      play_circle
                                                   </i>
                                                </a>
                                             </div>
                                          </div>
                                          <div class="col-xl-6 col-lg-6">
                                             <div class="rooms__items">
                                                <img src="/assets/img/room/sing1.jpg" alt="img">
                                                <div class="content__wrap">
                                                   <div class="content">
                                                      <h6>
                                                         $300/Night
                                                      </h6>
                                                      <h4>
                                                         <a href="hotel-list.html">
                                                            Double Bed
                                                         </a>
                                                      </h4>
                                                   </div>
                                                </div>
                                                <a href="https://www.youtube.com/watch?v=gpelxzSME04" class="video video-btn">
                                                   <i class="material-symbols-outlined">
                                                      play_circle
                                                   </i>
                                                </a>
                                             </div>
                                          </div>
                                          <div class="col-xl-6 col-lg-6">
                                             <div class="rooms__items">
                                                <img src="/assets/img/room/sing2.jpg" alt="img">
                                                <div class="content__wrap">
                                                   <div class="content">
                                                      <h6>
                                                         $300/Night
                                                      </h6>
                                                      <h4>
                                                         <a href="hotel-list.html">
                                                            Family Room
                                                         </a>
                                                      </h4>
                                                   </div>
                                                </div>
                                                <a href="https://www.youtube.com/watch?v=gpelxzSME04" class="video video-btn">
                                                   <i class="material-symbols-outlined">
                                                      play_circle
                                                   </i>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="2.2s">
                                    <div class="rooms">
                                       <div class="row g-4">
                                          <div class="col-xl-6 col-lg-6">
                                             <div class="rooms__items">
                                                <img src="/assets/img/room/single3.jpg" alt="img">
                                                <div class="content__wrap">
                                                   <div class="content">
                                                      <h6>
                                                         $300/Night
                                                      </h6>
                                                      <h4>
                                                         <a href="hotel-list.html">
                                                            Double bed
                                                         </a>
                                                      </h4>
                                                   </div>
                                                </div>
                                                <a href="https://www.youtube.com/watch?v=gpelxzSME04" class="video video-btn">
                                                   <i class="material-symbols-outlined">
                                                      play_circle
                                                   </i>
                                                </a>
                                             </div>
                                          </div>
                                          <div class="col-xl-6 col-lg-6">
                                             <div class="rooms__items">
                                                <img src="/assets/img/room/single4.jpg" alt="img">
                                                <div class="content__wrap">
                                                   <div class="content">
                                                      <h6>
                                                         $100/Night
                                                      </h6>
                                                      <h4>
                                                         <a href="hotel-list.html">
                                                            Single Bed
                                                         </a>
                                                      </h4>
                                                   </div>
                                                </div>
                                                <a href="https://www.youtube.com/watch?v=gpelxzSME04" class="video video-btn">
                                                   <i class="material-symbols-outlined">
                                                      play_circle
                                                   </i>
                                                </a>
                                             </div>
                                          </div>
                                          <div class="col-xl-12 col-lg-12">
                                             <div class="rooms__items">
                                                <img src="/assets/img/room/largibed2.jpg" alt="img">
                                                <div class="content__wrap">
                                                   <div class="content">
                                                      <h6>
                                                         $700/Night
                                                      </h6>
                                                      <h4>
                                                         <a href="hotel-list.html">
                                                            Lusury Be Room
                                                         </a>
                                                      </h4>
                                                   </div>
                                                </div>
                                                <a href="https://www.youtube.com/watch?v=gpelxzSME04" class="video video-btn">
                                                   <i class="material-symbols-outlined">
                                                      play_circle
                                                   </i>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </section>
                  --></code></pre>
                            </div>
                        </div>
                    </div>
                    <!--home two-->
                    <div class="common__body__section">
                        <div class="common__body__head pb__20">
                            <h4>
                                Section [2]
                            </h4>
                            <ul class="nav nav-pills" id="pills-tabblocksh2" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tabh2" data-bs-toggle="pill" data-bs-target="#pills-homeblocksh2" type="button" role="tab" aria-controls="pills-homeblocksh2" aria-selected="true">
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tabh2" data-bs-toggle="pill" data-bs-target="#pills-profileblcoksh2" type="button" role="tab" aria-controls="pills-profileblcoksh2" aria-selected="false">
                                        Html Code
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-homeblocksh2" role="tabpanel" aria-labelledby="pills-home-tabh2">
                                <section class="app__section bgsection pt-120 pb-120">
                                    <div class="container">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-xl-7 col-lg-7">
                                                <div class="app__content">
                                                    <div class="section__header wow fadeInUp">
                                                        <h2>
                                                            Download Our Rechargio Mobile App Now
                                                        </h2>
                                                        <p class="apptext">
                                                            Download our app for the fastest, most convenient way to send Recharge.
                                                        </p>
                                                        <p class="pb__40">
                                                            There are many variations of passages of Lorem Ipsum available, but the         have suffered alteration in some form, by injected humour, or randomised      words which don't look even slightly believable. If you are going to use...
                                                        </p>
                                                        <div class="d-flex gap-3 align-items-center">
                                                            <a href="javascript:void(0)" class="storyitem">
                                                                <img src="/assets/img/app/appplay.png" alt="img">
                                                            </a>
                                                            <a href="javascript:void(0)" class="storyitem">
                                                                <img src="/assets/img/app/appstore.png" alt="img">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-5 wow fadeInDown">
                                                <div class="app__thumb">
                                                    <img src="/assets/img/app/app.png" alt="img">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="app__shape">
                                        <img src="/assets/img/app/app-shape.png" alt="img">
                                    </div>
                                    <div class="app__shape2">
                                        <img src="/assets/img/app/appshape2.png" alt="img">
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane fade" id="pills-profileblcoksh2" role="tabpanel" aria-labelledby="pills-profile-tabh2">
                  <pre><code class="language-markup"><!--
                    <section class="app__section bgsection pt-120 pb-120">
                        <div class="container">
                           <div class="row justify-content-between align-items-center">
                              <div class="col-xl-7 col-lg-7">
                                 <div class="app__content">
                                    <div class="section__header wow fadeInUp">
                                       <h2>
                                          Download Our Rechargio Mobile App Now
                                       </h2>
                                       <p class="apptext">
                                          Download our app for the fastest, most convenient way to send Recharge.
                                       </p>
                                       <p class="pb__40">
                                          There are many variations of passages of Lorem Ipsum available, but the         have suffered alteration in some form, by injected humour, or randomised      words which don't look even slightly believable. If you are going to use...
                                       </p>
                                       <div class="d-flex gap-3 align-items-center">
                                          <a href="javascript:void(0)" class="storyitem">
                                             <img src="/assets/img/app/appplay.png" alt="img">
                                          </a>
                                          <a href="javascript:void(0)" class="storyitem">
                                             <img src="/assets/img/app/appstore.png" alt="img">
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xl-5 col-lg-5 wow fadeInDown">
                                 <div class="app__thumb">
                                    <img src="/assets/img/app/app.png" alt="img">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="app__shape">
                           <img src="/assets/img/app/app-shape.png" alt="img">
                        </div>
                        <div class="app__shape2">
                           <img src="/assets/img/app/appshape2.png" alt="img">
                        </div>
                     </section>
                  --></code></pre>
                            </div>
                        </div>
                    </div>
                    <!--home three-->
                    <div class="common__body__section pb__60">
                        <div class="common__body__head pt__60 pb__20">
                            <h4>
                                Section [3]
                            </h4>
                            <ul class="nav nav-pills" id="pills-tabblocksh3" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tabh3" data-bs-toggle="pill" data-bs-target="#pills-homeblocksh3" type="button" role="tab" aria-controls="pills-homeblocksh3" aria-selected="true">
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tabh3" data-bs-toggle="pill" data-bs-target="#pills-profileblcoksh3" type="button" role="tab" aria-controls="pills-profileblcoksh3" aria-selected="false">
                                        Html Code
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContent3">
                            <div class="tab-pane fade show active" id="pills-homeblocksh3" role="tabpanel" aria-labelledby="pills-home-tabh3">
                                <section class="speacial__support bgsection pt-120 pb-120">
                                    <div class="container">
                                        <div class="row gx-5 justify-content-between align-items-center">
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="refer__content">
                                                    <div class="section__header wow fadeInDown">
                                                        <h2>
                                                            Enjoy our Speacial supports
                                                        </h2>
                                                        <p>
                                                            There are many variations of passages of Lorem Ipsum available, but the  have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use...
                                                        </p>
                                                    </div>
                                                    <div class="refer__wrap pt__20">
                                                        <div class="refer__item wow fadeInUp" data-wow-duration="0.9s">
                                                            <div class="icon">
                                                                <img src="/assets/img/refer/boxspeaker.png" alt="img">
                                                            </div>
                                                            <div class="content">
                                                                <h5>
                                                                    Secure Payment
                                                                </h5>
                                                                <p>There are many variations of passages of Lorem Ipsum available...</p>
                                                            </div>
                                                        </div>
                                                        <div class="refer__item wow fadeInUp" data-wow-duration="1s">
                                                            <div class="icon">
                                                                <img src="/assets/img/refer/boxregister.png" alt="img">
                                                            </div>
                                                            <div class="content">
                                                                <h5>
                                                                    Refer & Earn
                                                                </h5>
                                                                <p>There are many variations of passages of Lorem Ipsum available...</p>
                                                            </div>
                                                        </div>
                                                        <div class="refer__item wow fadeInUp" data-wow-duration="1.4s">
                                                            <div class="icon">
                                                                <img src="/assets/img/refer/boxamount.png" alt="img">
                                                            </div>
                                                            <div class="content">
                                                                <h5>
                                                                    Trust pay
                                                                </h5>
                                                                <p>There are many variations of passages of Lorem Ipsum available...</p>
                                                            </div>
                                                        </div>
                                                        <div class="refer__item wow fadeInUp" data-wow-duration="1.6s">
                                                            <div class="icon">
                                                                <img src="/assets/img/refer/boxamount.png" alt="img">
                                                            </div>
                                                            <div class="content">
                                                                <h5>
                                                                    24X7 Support
                                                                </h5>
                                                                <p>There are many variations of passages of Lorem Ipsum available...</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="contact.html" class="cmn__btn wow fadeInUp" data-wow-duration="1.9s">
                                       <span>
                                          Contact us
                                       </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-5 wow fadeInUp">
                                                <div class="speacial__refer__thumb">
                                                    <img src="/assets/img/refer/spealsupport.png" alt="thumb">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane fade" id="pills-profileblcoksh3" role="tabpanel" aria-labelledby="pills-profile-tabh3">
                  <pre><code class="language-markup"><!--
                    <section class="speacial__support bgsection pt-120 pb-120">
                        <div class="container">
                           <div class="row gx-5 justify-content-between align-items-center">
                              <div class="col-xl-6 col-lg-6">
                                 <div class="refer__content">
                                    <div class="section__header wow fadeInDown">
                                       <h2>
                                          Enjoy our Speacial supports
                                       </h2>
                                       <p>
                                          There are many variations of passages of Lorem Ipsum available, but the  have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use...
                                       </p>
                                    </div>
                                    <div class="refer__wrap pt__20">
                                       <div class="refer__item wow fadeInUp" data-wow-duration="0.9s">
                                          <div class="icon">
                                             <img src="/assets/img/refer/boxspeaker.png" alt="img">
                                          </div>
                                          <div class="content">
                                             <h5>
                                                Secure Payment
                                             </h5>
                                             <p>There are many variations of passages of Lorem Ipsum available...</p>
                                          </div>
                                       </div>
                                       <div class="refer__item wow fadeInUp" data-wow-duration="1s">
                                          <div class="icon">
                                             <img src="/assets/img/refer/boxregister.png" alt="img">
                                          </div>
                                          <div class="content">
                                             <h5>
                                                Refer & Earn
                                             </h5>
                                             <p>There are many variations of passages of Lorem Ipsum available...</p>
                                          </div>
                                       </div>
                                       <div class="refer__item wow fadeInUp" data-wow-duration="1.4s">
                                          <div class="icon">
                                             <img src="/assets/img/refer/boxamount.png" alt="img">
                                          </div>
                                          <div class="content">
                                             <h5>
                                                Trust pay
                                             </h5>
                                             <p>There are many variations of passages of Lorem Ipsum available...</p>
                                          </div>
                                       </div>
                                       <div class="refer__item wow fadeInUp" data-wow-duration="1.6s">
                                          <div class="icon">
                                             <img src="/assets/img/refer/boxamount.png" alt="img">
                                          </div>
                                          <div class="content">
                                             <h5>
                                                24X7 Support
                                             </h5>
                                             <p>There are many variations of passages of Lorem Ipsum available...</p>
                                          </div>
                                       </div>
                                    </div>
                                    <a href="contact.html" class="cmn__btn wow fadeInUp" data-wow-duration="1.9s">
                                       <span>
                                          Contact us
                                       </span>
                                    </a>
                                 </div>
                              </div>
                              <div class="col-xl-5 col-lg-5 wow fadeInUp">
                                 <div class="speacial__refer__thumb">
                                    <img src="/assets/img/refer/spealsupport.png" alt="thumb">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                  --></code></pre>
                            </div>
                        </div>
                    </div>
                    <!--home four-->
                    <div class="common__body__section pb__60">
                        <div class="common__body__head pb__20">
                            <h4>
                                Section [4]
                            </h4>
                            <ul class="nav nav-pills" id="pills-tabblocksh4" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tabh4" data-bs-toggle="pill" data-bs-target="#pills-homeblocksh4" type="button" role="tab" aria-controls="pills-homeblocksh4" aria-selected="true">
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tabh4" data-bs-toggle="pill" data-bs-target="#pills-profileblcoksh4" type="button" role="tab" aria-controls="pills-profileblcoksh4" aria-selected="false">
                                        Html Code
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContent4">
                            <div class="tab-pane fade show active" id="pills-homeblocksh4" role="tabpanel" aria-labelledby="pills-home-tabh4">
                                <section class="working__section__two pt-120 pb-120">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6">
                                                <div class="section__header section__center minusten pb__40 wow fadeInUp">
                                                    <h2>
                                                        How It’s Work
                                                    </h2>
                                                    <p>
                                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-4 justify-content-center">
                                            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1.2s">
                                                <div class="working__itemstwo">
                                    <span class="list">
                                       01
                                    </span>
                                                    <div class="icon">
                                                        <img src="/assets/img/working/chossetouch.png" alt="img">
                                                    </div>
                                                    <div class="content">
                                                        <h5>
                                                            Choose what to do
                                                        </h5>
                                                        <p>
                                                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s">
                                                <div class="working__itemstwo">
                                    <span class="list">
                                       02
                                    </span>
                                                    <div class="icon">
                                                        <img src="/assets/img/working/find.png" alt="img">
                                                    </div>
                                                    <div class="content">
                                                        <h5>
                                                            Find what you want
                                                        </h5>
                                                        <p>
                                                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1.9s">
                                                <div class="working__itemstwo">
                                    <span class="list">
                                       03
                                    </span>
                                                    <div class="icon">
                                                        <img src="/assets/img/working/code.png" alt="img">
                                                    </div>
                                                    <div class="content">
                                                        <h5>
                                                            Explore amazing code
                                                        </h5>
                                                        <p>
                                                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane fade" id="pills-profileblcoksh4" role="tabpanel" aria-labelledby="pills-profile-tabh4">
                  <pre><code class="language-markup"><!--
                     <section class="working__section__two pt-120 pb-120">
                        <div class="container">
                           <div class="row justify-content-center">
                              <div class="col-lg-6">
                                 <div class="section__header section__center minusten pb__40 wow fadeInUp">
                                    <h2>
                                       How It’s Work
                                    </h2>
                                    <p>
                                       There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form
                                    </p>
                                 </div>
                              </div>
                           </div>
                           <div class="row g-4 justify-content-center">
                              <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1.2s">
                                 <div class="working__itemstwo">
                                    <span class="list">
                                       01
                                    </span>
                                    <div class="icon">
                                       <img src="/assets/img/working/chossetouch.png" alt="img">
                                    </div>
                                    <div class="content">
                                       <h5>
                                          Choose what to do
                                       </h5>
                                       <p>
                                          There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s">
                                 <div class="working__itemstwo">
                                    <span class="list">
                                       02
                                    </span>
                                    <div class="icon">
                                       <img src="/assets/img/working/find.png" alt="img">
                                    </div>
                                    <div class="content">
                                       <h5>
                                          Find what you want
                                       </h5>
                                       <p>
                                          There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1.9s">
                                 <div class="working__itemstwo">
                                    <span class="list">
                                       03
                                    </span>
                                    <div class="icon">
                                       <img src="/assets/img/working/code.png" alt="img">
                                    </div>
                                    <div class="content">
                                       <h5>
                                          Explore amazing code
                                       </h5>
                                       <p>
                                          There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                  --></code></pre>
                            </div>
                        </div>
                    </div>
                    <!--home five-->
                    <div class="common__body__section pb__20">
                        <div class="common__body__head pb__20">
                            <h4>
                                Section [5]
                            </h4>
                            <ul class="nav nav-pills" id="pills-tabblocksh5" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tabh5" data-bs-toggle="pill" data-bs-target="#pills-homeblocksh5" type="button" role="tab" aria-controls="pills-homeblocksh5" aria-selected="true">
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tabh5" data-bs-toggle="pill" data-bs-target="#pills-profileblcoksh5" type="button" role="tab" aria-controls="pills-profileblcoksh5" aria-selected="false">
                                        Html Code
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContent55s">
                            <div class="tab-pane fade show active" id="pills-homeblocksh5" role="tabpanel" aria-labelledby="pills-home-tabh5">
                                <section class="working__section__three bgsection pt-120 pb-120">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6">
                                                <div class="section__header section__center pb__40">
                                                    <h2>
                                                        How It’s Work
                                                    </h2>
                                                    <p>
                                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-4 justify-content-center align-items-center">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="working__wrapitems__three">
                                                    <div class="row justify-content-between">
                                                        <div class="col-xl-12 working__space">
                                                            <div class="working__itemstwo affter__one">
                                             <span class="list">
                                                01
                                             </span>
                                                                <div class="icon">
                                                                    <img src="/assets/img/working/chossetouch.png" alt="img">
                                                                </div>
                                                                <div class="content">
                                                                    <h5>
                                                                        Choose what to do
                                                                    </h5>
                                                                    <p>
                                                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <div class="working__itemstwo affter__three">
                                             <span class="list">
                                                03
                                             </span>
                                                                <div class="icon">
                                                                    <img src="/assets/img/working/find.png" alt="img">
                                                                </div>
                                                                <div class="content">
                                                                    <h5>
                                                                        Find what you want
                                                                    </h5>
                                                                    <p>
                                                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-2"><div class="borders"></div></div>
                                            <div class="col-xl-5 col-md-5">
                                                <div class="working__itemstwo affter__two">
                                    <span class="list">
                                       03
                                    </span>
                                                    <div class="icon">
                                                        <img src="/assets/img/working/code.png" alt="img">
                                                    </div>
                                                    <div class="content">
                                                        <h5>
                                                            Explore amazing code
                                                        </h5>
                                                        <p>
                                                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="working__3shape">
                                        <img src="/assets/img/working/working3shape.png" alt="img">
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane fade" id="pills-profileblcoksh5" role="tabpanel" aria-labelledby="pills-profile-tabh5">
                  <pre><code class="language-markup"><!--
                    <section class="working__section__three bgsection pt-120 pb-120">
                        <div class="container">
                           <div class="row justify-content-center">
                              <div class="col-lg-6">
                                 <div class="section__header section__center pb__40">
                                    <h2>
                                       How It’s Work
                                    </h2>
                                    <p>
                                       There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form
                                    </p>
                                 </div>
                              </div>
                           </div>
                           <div class="row g-4 justify-content-center align-items-center">
                              <div class="col-lg-5 col-md-5">
                                 <div class="working__wrapitems__three">
                                    <div class="row justify-content-between">
                                       <div class="col-xl-12 working__space">
                                          <div class="working__itemstwo affter__one">
                                             <span class="list">
                                                01
                                             </span>
                                             <div class="icon">
                                                <img src="/assets/img/working/chossetouch.png" alt="img">
                                             </div>
                                             <div class="content">
                                                <h5>
                                                   Choose what to do
                                                </h5>
                                                <p>
                                                   There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour
                                                </p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-xl-12">
                                          <div class="working__itemstwo affter__three">
                                             <span class="list">
                                                03
                                             </span>
                                             <div class="icon">
                                                <img src="/assets/img/working/find.png" alt="img">
                                             </div>
                                             <div class="content">
                                                <h5>
                                                   Find what you want
                                                </h5>
                                                <p>
                                                   There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour
                                                </p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-2 col-md-2"><div class="borders"></div></div>
                              <div class="col-xl-5 col-md-5">
                                 <div class="working__itemstwo affter__two">
                                    <span class="list">
                                       03
                                    </span>
                                    <div class="icon">
                                       <img src="/assets/img/working/code.png" alt="img">
                                    </div>
                                    <div class="content">
                                       <h5>
                                          Explore amazing code
                                       </h5>
                                       <p>
                                          There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="working__3shape">
                           <img src="/assets/img/working/working3shape.png" alt="img">
                        </div>
                     </section>
                  --></code></pre>
                            </div>
                        </div>
                    </div>
                    <!--home six-->
                    <div class="common__body__section pb__20">
                        <div class="common__body__head pb__20">
                            <h4>
                                Section [6]
                            </h4>
                            <ul class="nav nav-pills" id="pills-tabblocksh5ts" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tabh5ts" data-bs-toggle="pill" data-bs-target="#pills-homeblocksh5ts" type="button" role="tab" aria-controls="pills-homeblocksh5ts" aria-selected="true">
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tabh5ts" data-bs-toggle="pill" data-bs-target="#pills-profileblcoksh5ts" type="button" role="tab" aria-controls="pills-profileblcoksh5ts" aria-selected="false">
                                        Html Code
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContent5">
                            <div class="tab-pane fade show active" id="pills-homeblocksh5ts" role="tabpanel" aria-labelledby="pills-home-tabh5ts">
                                <section class="hotel__bookslider1 pb-120">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xxl-6 col-xl-7 col-lg-7 wow fadeInDown">
                                                <div class="section__header pb__60">
                                                    <h2>
                                                        Popular Destinations
                                                    </h2>
                                                    <p>
                                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flight__brachslider owl-theme owl-carousel">
                                        <div class="brach__flight__item">
                                            <img src="/assets/img/flights/paris1.jpg" alt="img">
                                            <a href="flight-oneway.html" class="flitposition">
                                 <span class="location">
                                    <span class="icon">
                                       <img src="/assets/img/booking/locate.png" alt="img">
                                    </span>
                                    <span class="text">
                                       England
                                    </span>
                                 </span>
                                                <span class="pages leftrightb pt__10 mt__20">
                                    <span class="text">
                                       14 Tour Packages
                                    </span>
                                    <span class="arrow">
                                       <i class="material-symbols-outlined">
                                          chevron_right
                                       </i>
                                    </span>
                                 </span>
                                            </a>
                                        </div>
                                        <div class="brach__flight__item">
                                            <img src="/assets/img/flights/paris2.jpg" alt="img">
                                            <a href="flight-oneway.html" class="flitposition">
                                 <span class="location">
                                    <span class="icon">
                                       <img src="/assets/img/booking/locate.png" alt="img">
                                    </span>
                                    <span class="text">
                                       Canada
                                    </span>
                                 </span>
                                                <span class="pages leftrightb pt__10 mt__20">
                                    <span class="text">
                                       14 Tour Packages
                                    </span>
                                    <span class="arrow">
                                       <i class="material-symbols-outlined">
                                          chevron_right
                                       </i>
                                    </span>
                                 </span>
                                            </a>
                                        </div>
                                        <div class="brach__flight__item">
                                            <img src="/assets/img/flights/paris3.jpg" alt="img">
                                            <a href="flight-oneway.html" class="flitposition">
                                 <span class="location">
                                    <span class="icon">
                                       <img src="/assets/img/booking/locate.png" alt="img">
                                    </span>
                                    <span class="text">
                                       Kasmir
                                    </span>
                                 </span>
                                                <span class="pages leftrightb pt__10 mt__20">
                                    <span class="text">
                                       14 Tour Packages
                                    </span>
                                    <span class="arrow">
                                       <i class="material-symbols-outlined">
                                          chevron_right
                                       </i>
                                    </span>
                                 </span>
                                            </a>
                                        </div>
                                        <div class="brach__flight__item">
                                            <img src="/assets/img/flights/paris4.jpg" alt="img">
                                            <a href="flight-oneway.html" class="flitposition">
                                 <span class="location">
                                    <span class="icon">
                                       <img src="/assets/img/booking/locate.png" alt="img">
                                    </span>
                                    <span class="text">
                                       Switzerland
                                    </span>
                                 </span>
                                                <span class="pages leftrightb pt__10 mt__20">
                                    <span class="text">
                                       14 Tour Packages
                                    </span>
                                    <span class="arrow">
                                       <i class="material-symbols-outlined">
                                          chevron_right
                                       </i>
                                    </span>
                                 </span>
                                            </a>
                                        </div>
                                        <div class="brach__flight__item">
                                            <img src="/assets/img/flights/paris5.jpg" alt="img">
                                            <a href="flight-oneway.html" class="flitposition">
                                 <span class="location">
                                    <span class="icon">
                                       <img src="/assets/img/booking/locate.png" alt="img">
                                    </span>
                                    <span class="text">
                                       New Zealand
                                    </span>
                                 </span>
                                                <span class="pages leftrightb pt__10 mt__20">
                                    <span class="text">
                                       14 Tour Packages
                                    </span>
                                    <span class="arrow">
                                       <i class="material-symbols-outlined">
                                          chevron_right
                                       </i>
                                    </span>
                                 </span>
                                            </a>
                                        </div>
                                        <div class="brach__flight__item">
                                            <img src="/assets/img/flights/paris6.jpg" alt="img">
                                            <a href="flight-oneway.html" class="flitposition">
                                 <span class="location">
                                    <span class="icon">
                                       <img src="/assets/img/booking/locate.png" alt="img">
                                    </span>
                                    <span class="text">
                                       Sydney
                                    </span>
                                 </span>
                                                <span class="pages leftrightb pt__10 mt__20">
                                    <span class="text">
                                       14 Tour Packages
                                    </span>
                                    <span class="arrow">
                                       <i class="material-symbols-outlined">
                                          chevron_right
                                       </i>
                                    </span>
                                 </span>
                                            </a>
                                        </div>
                                        <div class="brach__flight__item">
                                            <img src="/assets/img/flights/paris3.jpg" alt="img">
                                            <a href="flight-oneway.html" class="flitposition">
                                 <span class="location">
                                    <span class="icon">
                                       <img src="/assets/img/booking/locate.png" alt="img">
                                    </span>
                                    <span class="text">
                                       England
                                    </span>
                                 </span>
                                                <span class="pages leftrightb pt__10 mt__20">
                                    <span class="text">
                                       14 Tour Packages
                                    </span>
                                    <span class="arrow">
                                       <i class="material-symbols-outlined">
                                          chevron_right
                                       </i>
                                    </span>
                                 </span>
                                            </a>
                                        </div>
                                        <div class="brach__flight__item">
                                            <img src="/assets/img/flights/paris5.jpg" alt="img">
                                            <a href="flight-oneway.html" class="flitposition">
                                 <span class="location">
                                    <span class="icon">
                                       <img src="/assets/img/booking/locate.png" alt="img">
                                    </span>
                                    <span class="text">
                                       Dubai
                                    </span>
                                 </span>
                                                <span class="pages leftrightb pt__10 mt__20">
                                    <span class="text">
                                       14 Tour Packages
                                    </span>
                                    <span class="arrow">
                                       <i class="material-symbols-outlined">
                                          chevron_right
                                       </i>
                                    </span>
                                 </span>
                                            </a>
                                        </div>
                                        <div class="brach__flight__item">
                                            <img src="/assets/img/flights/paris1.jpg" alt="img">
                                            <a href="flight-oneway.html" class="flitposition">
                                 <span class="location">
                                    <span class="icon">
                                       <img src="/assets/img/booking/locate.png" alt="img">
                                    </span>
                                    <span class="text">
                                       England
                                    </span>
                                 </span>
                                                <span class="pages leftrightb pt__10 mt__20">
                                    <span class="text">
                                       14 Tour Packages
                                    </span>
                                    <span class="arrow">
                                       <i class="material-symbols-outlined">
                                          chevron_right
                                       </i>
                                    </span>
                                 </span>
                                            </a>
                                        </div>
                                        <div class="brach__flight__item">
                                            <img src="/assets/img/flights/paris2.jpg" alt="img">
                                            <a href="flight-oneway.html" class="flitposition">
                                 <span class="location">
                                    <span class="icon">
                                       <img src="/assets/img/booking/locate.png" alt="img">
                                    </span>
                                    <span class="text">
                                       Canada
                                    </span>
                                 </span>
                                                <span class="pages leftrightb pt__10 mt__20">
                                    <span class="text">
                                       14 Tour Packages
                                    </span>
                                    <span class="arrow">
                                       <i class="material-symbols-outlined">
                                          chevron_right
                                       </i>
                                    </span>
                                 </span>
                                            </a>
                                        </div>
                                        <div class="brach__flight__item">
                                            <img src="/assets/img/flights/paris3.jpg" alt="img">
                                            <a href="flight-oneway.html" class="flitposition">
                                 <span class="location">
                                    <span class="icon">
                                       <img src="/assets/img/booking/locate.png" alt="img">
                                    </span>
                                    <span class="text">
                                       Kasmir
                                    </span>
                                 </span>
                                                <span class="pages leftrightb pt__10 mt__20">
                                    <span class="text">
                                       14 Tour Packages
                                    </span>
                                    <span class="arrow">
                                       <i class="material-symbols-outlined">
                                          chevron_right
                                       </i>
                                    </span>
                                 </span>
                                            </a>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane fade" id="pills-profileblcoksh5ts" role="tabpanel" aria-labelledby="pills-profile-tabh5ts">
                  <pre><code class="language-markup"><!--
                     <section class="hotel__bookslider1 pb-120">
   <div class="container">
      <div class="row">
         <div class="col-xxl-6 col-xl-7 col-lg-7 wow fadeInDown">
            <div class="section__header pb__60">
               <h2>
                  Popular Destinations
               </h2>
               <p>
                  There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form
               </p>
            </div>
         </div>
      </div>
   </div>
   <div class="flight__brachslider owl-theme owl-carousel">
      <div class="brach__flight__item">
         <img src="/assets/img/flights/paris1.jpg" alt="img">
         <a href="flight-oneway.html" class="flitposition">
            <span class="location">
               <span class="icon">
                  <img src="/assets/img/booking/locate.png" alt="img">
               </span>
               <span class="text">
                  England
               </span>
            </span>
            <span class="pages leftrightb pt__10 mt__20">
               <span class="text">
                  14 Tour Packages
               </span>
               <span class="arrow">
                  <i class="material-symbols-outlined">
                     chevron_right
                  </i>
               </span>
            </span>
         </a>
      </div>
      <div class="brach__flight__item">
         <img src="/assets/img/flights/paris2.jpg" alt="img">
         <a href="flight-oneway.html" class="flitposition">
            <span class="location">
               <span class="icon">
                  <img src="/assets/img/booking/locate.png" alt="img">
               </span>
               <span class="text">
                  Canada
               </span>
            </span>
            <span class="pages leftrightb pt__10 mt__20">
               <span class="text">
                  14 Tour Packages
               </span>
               <span class="arrow">
                  <i class="material-symbols-outlined">
                     chevron_right
                  </i>
               </span>
            </span>
         </a>
      </div>
      <div class="brach__flight__item">
         <img src="/assets/img/flights/paris3.jpg" alt="img">
         <a href="flight-oneway.html" class="flitposition">
            <span class="location">
               <span class="icon">
                  <img src="/assets/img/booking/locate.png" alt="img">
               </span>
               <span class="text">
                  Kasmir
               </span>
            </span>
            <span class="pages leftrightb pt__10 mt__20">
               <span class="text">
                  14 Tour Packages
               </span>
               <span class="arrow">
                  <i class="material-symbols-outlined">
                     chevron_right
                  </i>
               </span>
            </span>
         </a>
      </div>
      <div class="brach__flight__item">
         <img src="/assets/img/flights/paris4.jpg" alt="img">
         <a href="flight-oneway.html" class="flitposition">
            <span class="location">
               <span class="icon">
                  <img src="/assets/img/booking/locate.png" alt="img">
               </span>
               <span class="text">
                  Switzerland
               </span>
            </span>
            <span class="pages leftrightb pt__10 mt__20">
               <span class="text">
                  14 Tour Packages
               </span>
               <span class="arrow">
                  <i class="material-symbols-outlined">
                     chevron_right
                  </i>
               </span>
            </span>
         </a>
      </div>
      <div class="brach__flight__item">
         <img src="/assets/img/flights/paris5.jpg" alt="img">
         <a href="flight-oneway.html" class="flitposition">
            <span class="location">
               <span class="icon">
                  <img src="/assets/img/booking/locate.png" alt="img">
               </span>
               <span class="text">
                  New Zealand
               </span>
            </span>
            <span class="pages leftrightb pt__10 mt__20">
               <span class="text">
                  14 Tour Packages
               </span>
               <span class="arrow">
                  <i class="material-symbols-outlined">
                     chevron_right
                  </i>
               </span>
            </span>
         </a>
      </div>
      <div class="brach__flight__item">
         <img src="/assets/img/flights/paris6.jpg" alt="img">
         <a href="flight-oneway.html" class="flitposition">
            <span class="location">
               <span class="icon">
                  <img src="/assets/img/booking/locate.png" alt="img">
               </span>
               <span class="text">
                  Sydney
               </span>
            </span>
            <span class="pages leftrightb pt__10 mt__20">
               <span class="text">
                  14 Tour Packages
               </span>
               <span class="arrow">
                  <i class="material-symbols-outlined">
                     chevron_right
                  </i>
               </span>
            </span>
         </a>
      </div>
      <div class="brach__flight__item">
         <img src="/assets/img/flights/paris3.jpg" alt="img">
         <a href="flight-oneway.html" class="flitposition">
            <span class="location">
               <span class="icon">
                  <img src="/assets/img/booking/locate.png" alt="img">
               </span>
               <span class="text">
                  England
               </span>
            </span>
            <span class="pages leftrightb pt__10 mt__20">
               <span class="text">
                  14 Tour Packages
               </span>
               <span class="arrow">
                  <i class="material-symbols-outlined">
                     chevron_right
                  </i>
               </span>
            </span>
         </a>
      </div>
      <div class="brach__flight__item">
         <img src="/assets/img/flights/paris5.jpg" alt="img">
         <a href="flight-oneway.html" class="flitposition">
            <span class="location">
               <span class="icon">
                  <img src="/assets/img/booking/locate.png" alt="img">
               </span>
               <span class="text">
                  Dubai
               </span>
            </span>
            <span class="pages leftrightb pt__10 mt__20">
               <span class="text">
                  14 Tour Packages
               </span>
               <span class="arrow">
                  <i class="material-symbols-outlined">
                     chevron_right
                  </i>
               </span>
            </span>
         </a>
      </div>
      <div class="brach__flight__item">
         <img src="/assets/img/flights/paris1.jpg" alt="img">
         <a href="flight-oneway.html" class="flitposition">
            <span class="location">
               <span class="icon">
                  <img src="/assets/img/booking/locate.png" alt="img">
               </span>
               <span class="text">
                  England
               </span>
            </span>
            <span class="pages leftrightb pt__10 mt__20">
               <span class="text">
                  14 Tour Packages
               </span>
               <span class="arrow">
                  <i class="material-symbols-outlined">
                     chevron_right
                  </i>
               </span>
            </span>
         </a>
      </div>
      <div class="brach__flight__item">
         <img src="/assets/img/flights/paris2.jpg" alt="img">
         <a href="flight-oneway.html" class="flitposition">
            <span class="location">
               <span class="icon">
                  <img src="/assets/img/booking/locate.png" alt="img">
               </span>
               <span class="text">
                  Canada
               </span>
            </span>
            <span class="pages leftrightb pt__10 mt__20">
               <span class="text">
                  14 Tour Packages
               </span>
               <span class="arrow">
                  <i class="material-symbols-outlined">
                     chevron_right
                  </i>
               </span>
            </span>
         </a>
      </div>
      <div class="brach__flight__item">
         <img src="/assets/img/flights/paris3.jpg" alt="img">
         <a href="flight-oneway.html" class="flitposition">
            <span class="location">
               <span class="icon">
                  <img src="/assets/img/booking/locate.png" alt="img">
               </span>
               <span class="text">
                  Kasmir
               </span>
            </span>
            <span class="pages leftrightb pt__10 mt__20">
               <span class="text">
                  14 Tour Packages
               </span>
               <span class="arrow">
                  <i class="material-symbols-outlined">
                     chevron_right
                  </i>
               </span>
            </span>
         </a>
      </div>
   </div>
</section>
                  --></code></pre>
                            </div>
                        </div>
                    </div>
                    <!--home hotel book-->
                    <div class="common__body__section pb__60">
                        <div class="common__body__head pb__20">
                            <h4>
                                Section [7]
                            </h4>
                            <ul class="nav nav-pills" id="pills-tabblockshs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tabhs" data-bs-toggle="pill" data-bs-target="#pills-homeblockshs" type="button" role="tab" aria-controls="pills-homeblockshs" aria-selected="true">
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tabhs" data-bs-toggle="pill" data-bs-target="#pills-profileblcokshs" type="button" role="tab" aria-controls="pills-profileblcokshs" aria-selected="false">
                                        Html Code
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContentrehs">
                            <div class="tab-pane fade show active" id="pills-homeblockshs" role="tabpanel" aria-labelledby="pills-home-tabhs">
                                <section class="discount__travel bgsection pt-120 pb-120">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-xxl-6 col-xl-7 col-lg-7 wow fadeInDown">
                                                <div class="section__header section__center pb__60">
                                                    <h2>
                                                        Travels Discount
                                                    </h2>
                                                    <p>
                                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-4 justify-content-center">
                                            <div class="col-xxl-6 col-xl-6 col-lg-6">
                                                <div class="travel__dicount__item ">
                                                    <img src="/assets/img/flights/discount1.jpg" alt="img">
                                                    <div class="bestoffer__content">
                                                        <h4 class="cheap">
                                                            Fly Now, Pay Later
                                                        </h4>
                                                        <p class="usa">
                                                            USA cheap flight deals
                                                        </p>
                                                        <h1 class="offfertitle">
                                          <span class="uptoget">
                                             <span class="upto d-block">
                                                Get
                                             </span>
                                             <span class="upto">
                                                upto
                                             </span>
                                          </span>
                                                            45
                                                            <span class="offs">
                                             % OFF
                                          </span>
                                                        </h1>
                                                        <a href="flight-oneway.html" class="cmn__btn cmn__green">
                                          <span>
                                             Book Now
                                          </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6">
                                                <div class="travel__dicount__item ">
                                                    <img src="/assets/img/flights/discount2.jpg" alt="img">
                                                    <div class="content">
                                                        <div class="boxeswidth">
                                                            <h1 class="fivepercent">
                                                                5%
                                                            </h1>
                                                            <h4 class="instant">
                                                                INSTANT
                                                                DISCOUNT
                                                            </h4>
                                                            <p class="flightbook">
                                                                on Flight Booking
                                                            </p>
                                                            <a href="flight-oneway.html" class="cmn__btn cmn__meron">
                                             <span>
                                                Book Now
                                             </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                                <div class="travel__dicount__item">
                                                    <img src="/assets/img/flights/discount3.jpg" alt="img">
                                                    <div class="content">
                                                        <h4 class="fivtin">
                                                            Get 15% off
                                                        </h4>
                                                        <p class="winter pb__20">
                                                            Fly to Dubai & Enjoy
                                                        </p>
                                                        <a href="flight-oneway.html" class="cmn__btn cmn__base">
                                          <span>
                                             Book Now
                                          </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                                <div class="travel__dicount__item">
                                                    <img src="/assets/img/flights/discount4.jpg" alt="img">
                                                    <div class="content">
                                                        <h4 class="cheap">
                                                            Cheap Flight Deal
                                                        </h4>
                                                        <p class="winter">
                                                            Winter holidays in Switzerland
                                                        </p>
                                                        <span class="tharthy pb__20">
                                          30% OFF
                                       </span>
                                                        <a href="flight-oneway.html" class="cmn__btn cmn__base">
                                          <span>
                                             Book Now
                                          </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                                <div class="travel__dicount__item">
                                                    <img src="/assets/img/flights/discount5.jpg" alt="img">
                                                    <div class="content">
                                                        <h4 class="cheap">
                                                            Hot Flight Deal
                                                        </h4>
                                                        <p class="winter">
                                                            Summer vacation in Hong Kong
                                                        </p>
                                                        <span class="tharthy pb__20">
                                          50% OFF
                                       </span>
                                                        <a href="flight-oneway.html" class="cmn__btn cmn__green">
                                          <span>
                                             Book Now
                                          </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="more__btn text-center pt__40">
                                            <a href="flight-oneway.html" class="cmn__btn">
                                 <span>
                                    See All Offer
                                 </span>
                                            </a>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane fade" id="pills-profileblcokshs" role="tabpanel" aria-labelledby="pills-profile-tabhs">
                     <pre><code class="language-markup"><!--

                     <section class="discount__travel bgsection pt-120 pb-120">
                        <div class="container">
                           <div class="row justify-content-center">
                              <div class="col-xxl-6 col-xl-7 col-lg-7 wow fadeInDown">
                                 <div class="section__header section__center pb__60">
                                    <h2>
                                       Travels Discount
                                    </h2>
                                    <p>
                                       There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form
                                    </p>
                                 </div>
                              </div>
                           </div>
                           <div class="row g-4 justify-content-center">
                              <div class="col-xxl-6 col-xl-6 col-lg-6">
                                 <div class="travel__dicount__item ">
                                    <img src="/assets/img/flights/discount1.jpg" alt="img">
                                    <div class="bestoffer__content">
                                       <h4 class="cheap">
                                          Fly Now, Pay Later
                                       </h4>
                                       <p class="usa">
                                          USA cheap flight deals
                                       </p>
                                       <h1 class="offfertitle">
                                          <span class="uptoget">
                                             <span class="upto d-block">
                                                Get
                                             </span>
                                             <span class="upto">
                                                upto
                                             </span>
                                          </span>
                                          45
                                          <span class="offs">
                                             % OFF
                                          </span>
                                       </h1>
                                       <a href="flight-oneway.html" class="cmn__btn cmn__green">
                                          <span>
                                             Book Now
                                          </span>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xxl-6 col-xl-6 col-lg-6">
                                 <div class="travel__dicount__item ">
                                    <img src="/assets/img/flights/discount2.jpg" alt="img">
                                    <div class="content">
                                    <div class="boxeswidth">
                                          <h1 class="fivepercent">
                                             5%
                                          </h1>
                                          <h4 class="instant">
                                             INSTANT
                                             DISCOUNT
                                          </h4>
                                          <p class="flightbook">
                                             on Flight Booking
                                          </p>
                                          <a href="flight-oneway.html" class="cmn__btn cmn__meron">
                                             <span>
                                                Book Now
                                             </span>
                                          </a>
                                    </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                 <div class="travel__dicount__item">
                                    <img src="/assets/img/flights/discount3.jpg" alt="img">
                                    <div class="content">
                                       <h4 class="fivtin">
                                          Get 15% off
                                       </h4>
                                       <p class="winter pb__20">
                                          Fly to Dubai & Enjoy
                                       </p>
                                       <a href="flight-oneway.html" class="cmn__btn cmn__base">
                                          <span>
                                             Book Now
                                          </span>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                 <div class="travel__dicount__item">
                                    <img src="/assets/img/flights/discount4.jpg" alt="img">
                                    <div class="content">
                                       <h4 class="cheap">
                                          Cheap Flight Deal
                                       </h4>
                                       <p class="winter">
                                          Winter holidays in Switzerland
                                       </p>
                                       <span class="tharthy pb__20">
                                          30% OFF
                                       </span>
                                       <a href="flight-oneway.html" class="cmn__btn cmn__base">
                                          <span>
                                             Book Now
                                          </span>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                 <div class="travel__dicount__item">
                                    <img src="/assets/img/flights/discount5.jpg" alt="img">
                                    <div class="content">
                                       <h4 class="cheap">
                                          Hot Flight Deal
                                       </h4>
                                       <p class="winter">
                                          Summer vacation in Hong Kong
                                       </p>
                                       <span class="tharthy pb__20">
                                          50% OFF
                                       </span>
                                       <a href="flight-oneway.html" class="cmn__btn cmn__green">
                                          <span>
                                             Book Now
                                          </span>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="more__btn text-center pt__40">
                              <a href="flight-oneway.html" class="cmn__btn">
                                 <span>
                                    See All Offer
                                 </span>
                              </a>
                           </div>
                        </div>
                     </section>
                  --></code></pre>
                            </div>
                        </div>
                    </div>
                    <!--home flight book-->
                    <div class="common__body__section pb__60">
                        <div class="common__body__head pb__20">
                            <h4>
                                Section [8]
                            </h4>
                            <ul class="nav nav-pills" id="pills-tabblockshs1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tabhs1" data-bs-toggle="pill" data-bs-target="#pills-homeblockshs1" type="button" role="tab" aria-controls="pills-homeblockshs1" aria-selected="true">
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tabhs1" data-bs-toggle="pill" data-bs-target="#pills-profileblcokshs1" type="button" role="tab" aria-controls="pills-profileblcokshs1" aria-selected="false">
                                        Html Code
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContentrehs1">
                            <div class="tab-pane fade show active" id="pills-homeblockshs1" role="tabpanel" aria-labelledby="pills-home-tabhs1">
                                <section class="conplaint__service hidd">
                                    <div class="container-fluid p-0">
                                        <div class="row g-0">
                                            <div class="col-xxl-7 col-xl-7 col-lg-7">
                                                <div class="complaint__content row justify-content-center align-items-center">
                                                    <div class="complaint__content__box">
                                                        <div class="section__header pb__40">
                                                            <h2>
                                                                You can make any complaint our service
                                                            </h2>
                                                            <p>
                                                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour...
                                                            </p>
                                                        </div>
                                                        <form action="javascript:void(0)">
                                                            <input type="text" placeholder="Your name">
                                                            <input type="email" placeholder="Your email">
                                                            <textarea cols="30" rows="3" placeholder="Your complaint"></textarea>
                                                        </form>
                                                        <div class="agree__chek pb__40">
                                                            <input class="form-check-input" type="checkbox" id="agree" checked>
                                                            <label class="form-check-label" for="agree">
                                                                I Agree support terms & condition
                                                            </label>
                                                        </div>
                                                        <button type="submit" class="cmn__btn">
                                          <span>
                                             Submit
                                          </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-5 col-xl-5 col-lg-5">
                                                <div class="conplaint__thumb">
                                                    <!-- <img src="/assets/img/testimonial/plane.jpg" alt="img"> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane fade" id="pills-profileblcokshs1" role="tabpanel" aria-labelledby="pills-profile-tabhs1">
                     <pre><code class="language-markup"><!--

                   <section class="conplaint__service hidd">
                        <div class="container-fluid p-0">
                           <div class="row g-0">
                              <div class="col-xxl-7 col-xl-7 col-lg-7">
                                 <div class="complaint__content row justify-content-center align-items-center">
                                    <div class="complaint__content__box">
                                       <div class="section__header pb__40">
                                          <h2>
                                             You can make any complaint our service
                                          </h2>
                                          <p>
                                             There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour...
                                          </p>
                                       </div>
                                       <form action="javascript:void(0)">
                                          <input type="text" placeholder="Your name">
                                          <input type="email" placeholder="Your email">
                                          <textarea cols="30" rows="3" placeholder="Your complaint"></textarea>
                                       </form>
                                       <div class="agree__chek pb__40">
                                          <input class="form-check-input" type="checkbox" id="agree" checked>
                                          <label class="form-check-label" for="agree">
                                             I Agree support terms & condition
                                          </label>
                                       </div>
                                       <button type="submit" class="cmn__btn">
                                          <span>
                                             Submit
                                          </span>
                                       </button>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xxl-5 col-xl-5 col-lg-5">
                                 <div class="conplaint__thumb">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                  --></code></pre>
                            </div>
                        </div>
                    </div>
                    <!--home Train book-->
                    <div class="common__body__section pb__60">
                        <div class="common__body__head pb__20">
                            <h4>
                                Section [9]
                            </h4>
                            <ul class="nav nav-pills" id="pills-tabblockshs2" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tabhs2sf" data-bs-toggle="pill" data-bs-target="#pills-homeblockshs2sf" type="button" role="tab" aria-controls="pills-homeblockshs2sf" aria-selected="true">
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tabhs2sf" data-bs-toggle="pill" data-bs-target="#pills-profileblcokshs2sf" type="button" role="tab" aria-controls="pills-profileblcokshs2sf" aria-selected="false">
                                        Html Code
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContentrehs2">
                            <div class="tab-pane fade show active" id="pills-homeblockshs2sf" role="tabpanel" aria-labelledby="pills-home-tabhs2sf">
                                <!-- Home Here -->
                                <section class="train__ticket">
                                    <div class="container">
                                        <div class="row flex-row-reverse align-items-center justify-content-between">
                                            <div class="col-xxl-6 col-xl-6 col-lg-6">
                                                <div class="train__ticket__content">
                                                    <div class="section__header mb__30">
                                                        <h2>
                                                            Different Types of Train Ticket Booking
                                                        </h2>
                                                        <p>
                                                            There are many variations of passages of Lorem Ipsum available, but the  have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use...
                                                        </p>
                                                    </div>
                                                    <ul class="offer__list pb__40">
                                                        <li>
                                          <span class="thumb">
                                             <img src="/assets/img/train/unoffer.png" alt="img">
                                          </span>
                                                            <span class="text">
                                             Unlimited Offers
                                          </span>
                                                        </li>
                                                        <li>
                                          <span class="thumb">
                                             <img src="/assets/img/train/suppor24.png" alt="img">
                                          </span>
                                                            <span class="text">
                                             24X7 Support
                                          </span>
                                                        </li>
                                                        <li>
                                          <span class="thumb">
                                             <img src="/assets/img/train/secure100.png" alt="img">
                                          </span>
                                                            <span class="text">
                                             100% Secure
                                          </span>
                                                        </li>
                                                        <li>
                                          <span class="thumb">
                                             <img src="/assets/img/train/truspay.png" alt="img">
                                          </span>
                                                            <span class="text">
                                             Trust pay
                                          </span>
                                                        </li>
                                                    </ul>
                                                    <a href="train-list.html" class="cmn__btn">
                                       <span>
                                          Explore deals
                                       </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xxl-5 col-xl-5 col-lg-5">
                                                <div class="trainticket__thumb">
                                                    <img src="/assets/img/train/trainticket.png" alt="img">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- Home End -->
                            </div>
                            <div class="tab-pane fade" id="pills-profileblcokshs2sf" role="tabpanel" aria-labelledby="pills-profile-tabhs2sf">
                     <pre><code class="language-markup"><!--

                   <section class="train__ticket">
                     <div class="container">
                        <div class="row flex-row-reverse align-items-center justify-content-between">
                           <div class="col-xxl-6 col-xl-6 col-lg-6">
                              <div class="train__ticket__content">
                                 <div class="section__header mb__30">
                                    <h2>
                                       Different Types of Train Ticket Booking
                                    </h2>
                                    <p>
                                       There are many variations of passages of Lorem Ipsum available, but the  have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use...
                                    </p>
                                 </div>
                                 <ul class="offer__list pb__40">
                                    <li>
                                       <span class="thumb">
                                          <img src="/assets/img/train/unoffer.png" alt="img">
                                       </span>
                                       <span class="text">
                                          Unlimited Offers
                                       </span>
                                    </li>
                                    <li>
                                       <span class="thumb">
                                          <img src="/assets/img/train/suppor24.png" alt="img">
                                       </span>
                                       <span class="text">
                                          24X7 Support
                                       </span>
                                    </li>
                                    <li>
                                       <span class="thumb">
                                          <img src="/assets/img/train/secure100.png" alt="img">
                                       </span>
                                       <span class="text">
                                          100% Secure
                                       </span>
                                    </li>
                                    <li>
                                       <span class="thumb">
                                          <img src="/assets/img/train/truspay.png" alt="img">
                                       </span>
                                       <span class="text">
                                          Trust pay
                                       </span>
                                    </li>
                                 </ul>
                                 <a href="train-list.html" class="cmn__btn">
                                    <span>
                                       Explore deals
                                    </span>
                                 </a>
                              </div>
                           </div>
                           <div class="col-xxl-5 col-xl-5 col-lg-5">
                              <div class="trainticket__thumb">
                                 <img src="/assets/img/train/trainticket.png" alt="img">
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  --></code></pre>
                            </div>
                        </div>
                    </div>
                    <!--home Bus book-->
                    <div class="common__body__section pb__60">
                        <div class="common__body__head pb__20">
                            <h4>
                                Section [10]
                            </h4>
                            <ul class="nav nav-pills" id="pills-tabblockshs3" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tabhs3" data-bs-toggle="pill" data-bs-target="#pills-homeblockshs3" type="button" role="tab" aria-controls="pills-homeblockshs3" aria-selected="true">
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tabhs3" data-bs-toggle="pill" data-bs-target="#pills-profileblcokshs3" type="button" role="tab" aria-controls="pills-profileblcokshs3" aria-selected="false">
                                        Html Code
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContentrehs33">
                            <div class="tab-pane fade show active" id="pills-homeblockshs3" role="tabpanel" aria-labelledby="pills-home-tabhs3">
                                <section class="app__section bgsection pt-120 pb-120">
                                    <div class="container">
                                        <div class="row flex-row-reverse justify-content-between align-items-center">
                                            <div class="col-xl-6 col-lg-7 col-md-7 wow fadeInDown" data-wow-duration="1.5s">
                                                <div class="app__content">
                                                    <div class="section__header">
                                                        <h2>
                                                            Instructions to Purchase Train Tickets
                                                        </h2>
                                                        <p class="apptext">
                                                            Download our app for the fastest, most convenient way to Booking System.
                                                        </p>
                                                        <ul class="train__list pb__40">
                                                            <li>
                                             <span class="icons">
                                                <i class="material-symbols-outlined">
                                                   done
                                                </i>
                                             </span>
                                                                <span class="textss">
                                                Tickets can be bought online five days in advance.
                                             </span>
                                                            </li>
                                                            <li>
                                             <span class="icons">
                                                <i class="material-symbols-outlined">
                                                   done
                                                </i>
                                             </span>
                                                                <span class="text">
                                                In case of payment or transaction failure, the deducted amount would be refunded by your bank within 8 business days.
                                             </span>
                                                            </li>
                                                            <li>
                                             <span class="icons">
                                                <i class="material-symbols-outlined">
                                                   done
                                                </i>
                                             </span>
                                                                <span class="text">
                                                In case money has been deducted from your card / mobile wallet but you have not received a ticket confirmation, the deducted amount would be refunded by your bank  within 8 business days.
                                             </span>
                                                            </li>
                                                            <li>
                                             <span class="icons">
                                                <i class="material-symbols-outlined">
                                                   done
                                                </i>
                                             </span>
                                                                <span class="text">
                                                Download the official app published by Rechargio from App store
                                             </span>
                                                            </li>
                                                            <li>
                                             <span class="icons">
                                                <i class="material-symbols-outlined">
                                                   done
                                                </i>
                                             </span>
                                                                <span class="text">
                                                In case of passengers downloading fake apps or any other app from app store which claim to sell train tickets of Rechargio, the authorities will not take any liability.
                                             </span>
                                                            </li>
                                                        </ul>
                                                        <div class="d-flex gap-3 align-items-center">
                                                            <a href="javascript:void(0)" class="storyitem">
                                                                <img src="/assets/img/app/appplay.png" alt="img">
                                                            </a>
                                                            <a href="javascript:void(0)" class="storyitem">
                                                                <img src="/assets/img/app/appstore.png" alt="img">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-5 col-md-5 wow fadeInUp" data-wow-duration="2.5s">
                                                <div class="app__thumb app__thumb__two">
                                                    <img src="/assets/img/app/apptwo.png" alt="img">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane fade" id="pills-profileblcokshs3" role="tabpanel" aria-labelledby="pills-profile-tabhs3">
                     <pre><code class="language-markup"><!--

                    <section class="app__section bgsection pt-120 pb-120">
                        <div class="container">
                           <div class="row flex-row-reverse justify-content-between align-items-center">
                              <div class="col-xl-6 col-lg-7 col-md-7 wow fadeInDown" data-wow-duration="1.5s">
                                 <div class="app__content">
                                    <div class="section__header">
                                       <h2>
                                          Instructions to Purchase Train Tickets
                                       </h2>
                                       <p class="apptext">
                                          Download our app for the fastest, most convenient way to Booking System.
                                       </p>
                                       <ul class="train__list pb__40">
                                          <li>
                                             <span class="icons">
                                                <i class="material-symbols-outlined">
                                                   done
                                                </i>
                                             </span>
                                             <span class="textss">
                                                Tickets can be bought online five days in advance.
                                             </span>
                                          </li>
                                          <li>
                                             <span class="icons">
                                                <i class="material-symbols-outlined">
                                                   done
                                                </i>
                                             </span>
                                             <span class="text">
                                                In case of payment or transaction failure, the deducted amount would be refunded by your bank within 8 business days.
                                             </span>
                                          </li>
                                          <li>
                                             <span class="icons">
                                                <i class="material-symbols-outlined">
                                                   done
                                                </i>
                                             </span>
                                             <span class="text">
                                                In case money has been deducted from your card / mobile wallet but you have not received a ticket confirmation, the deducted amount would be refunded by your bank  within 8 business days.
                                             </span>
                                          </li>
                                          <li>
                                             <span class="icons">
                                                <i class="material-symbols-outlined">
                                                   done
                                                </i>
                                             </span>
                                             <span class="text">
                                                Download the official app published by Rechargio from App store
                                             </span>
                                          </li>
                                          <li>
                                             <span class="icons">
                                                <i class="material-symbols-outlined">
                                                   done
                                                </i>
                                             </span>
                                             <span class="text">
                                                In case of passengers downloading fake apps or any other app from app store which claim to sell train tickets of Rechargio, the authorities will not take any liability.
                                             </span>
                                          </li>
                                       </ul>
                                       <div class="d-flex gap-3 align-items-center">
                                          <a href="javascript:void(0)" class="storyitem">
                                             <img src="/assets/img/app/appplay.png" alt="img">
                                          </a>
                                          <a href="javascript:void(0)" class="storyitem">
                                             <img src="/assets/img/app/appstore.png" alt="img">
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xl-5 col-lg-5 col-md-5 wow fadeInUp" data-wow-duration="2.5s">
                                 <div class="app__thumb app__thumb__two">
                                    <img src="/assets/img/app/apptwo.png" alt="img">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                  --></code></pre>
                            </div>
                        </div>
                    </div>
                    <!--home Car book-->
                    <div class="common__body__section pb__60">
                        <div class="common__body__head pb__20">
                            <h4>
                                Section [11]
                            </h4>
                            <ul class="nav nav-pills" id="pills-tabblockshs4" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tabhs4" data-bs-toggle="pill" data-bs-target="#pills-homeblockshs4" type="button" role="tab" aria-controls="pills-homeblockshs4" aria-selected="true">
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tabhs4" data-bs-toggle="pill" data-bs-target="#pills-profileblcokshs4" type="button" role="tab" aria-controls="pills-profileblcokshs4" aria-selected="false">
                                        Html Code
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContentrehs34">
                            <div class="tab-pane fade show active" id="pills-homeblockshs4" role="tabpanel" aria-labelledby="pills-home-tabhs4">
                                <section class="hotel__facilities pb-120">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-xxl-6 col-xl-7 col-lg-7 wow fadeInDown">
                                                <div class="section__header section__center pb__60">
                                                    <h2>
                                                        Bus Facilities
                                                    </h2>
                                                    <p>
                                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flight__facilites__wrap bus__facilities__wrap">
                                            <div class="row g-4 align-items-center justify-content-center">
                                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4">
                                                    <div class="bus__fasilities__left">
                                                        <div class="hotel__facilities__item nlfbottom wow fadeInUp" data-wow-duration="1.2s">
                                                            <div class="head__wrap">
                                                                <img src="/assets/img/room/breakfast.png" alt="img">
                                                                <h5>
                                                                    <a href="bus-list.html">
                                                                        Breakfast
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <p>
                                                                It is a long established fact that a reader will be distracted by the...
                                                            </p>
                                                        </div>
                                                        <div class="hotel__facilities__item nlfbottom wow fadeInUp" data-wow-duration="1.6s">
                                                            <div class="head__wrap pt__30">
                                                                <img src="/assets/img/room/seats.png" alt="img">
                                                                <h5>
                                                                    <a href="bus-list.html">
                                                                        Comfortable seats
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <p>
                                                                It is a long established fact that a reader will be distracted by the...
                                                            </p>
                                                        </div>
                                                        <div class="hotel__facilities__item wow fadeInUp" data-wow-duration="1.8s">
                                                            <div class="head__wrap">
                                                                <img src="/assets/img/room/wifi.png" alt="img">
                                                                <h5>
                                                                    <a href="bus-list.html">
                                                                        Sunlimited WIFI
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <p>
                                                                It is a long established fact that a reader will be distracted by the...
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-4">
                                                    <div class="bus__fasilitiesthumb">
                                                        <img src="/assets/img/bus/busappp.png" alt="img">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4">
                                                    <div class="bus__fasilities__right">
                                                        <div class="hotel__facilities__item nlfbottom wow fadeInDown" data-wow-duration="1.2s">
                                                            <div class="head__wrap">
                                                                <img src="/assets/img/room/drinkss.png" alt="img">
                                                                <h5>
                                                                    <a href="bus-list.html">
                                                                        Cold Drinks
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <p>
                                                                It is a long established fact that a reader will be distracted by the...
                                                            </p>
                                                        </div>
                                                        <div class="hotel__facilities__item nlfbottom wow fadeInDown" data-wow-duration="1.4s">
                                                            <div class="head__wrap">
                                                                <img src="/assets/img/room/hotcoffee.png" alt="img">
                                                                <h5>
                                                                    <a href="bus-list.html">
                                                                        Hot Coffee
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <p>
                                                                It is a long established fact that a reader will be distracted by the...
                                                            </p>
                                                        </div>
                                                        <div class="hotel__facilities__item wow fadeInDown" data-wow-duration="1.6s">
                                                            <div class="head__wrap">
                                                                <img src="/assets/img/room/salat.png" alt="img">
                                                                <h5>
                                                                    <a href="bus-list.html">
                                                                        Place of Religion Pray
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <p>
                                                                It is a long established fact that a reader will be distracted by the...
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane fade" id="pills-profileblcokshs4" role="tabpanel" aria-labelledby="pills-profile-tabhs4">
                     <pre><code class="language-markup"><!--

                    <section class="hotel__facilities pb-120">
                        <div class="container">
                           <div class="row justify-content-center">
                              <div class="col-xxl-6 col-xl-7 col-lg-7 wow fadeInDown">
                                 <div class="section__header section__center pb__60">
                                    <h2>
                                       Bus Facilities
                                    </h2>
                                    <p>
                                       There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form
                                    </p>
                                 </div>
                              </div>
                           </div>
                           <div class="flight__facilites__wrap bus__facilities__wrap">
                              <div class="row g-4 align-items-center justify-content-center">
                                 <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4">
                                    <div class="bus__fasilities__left">
                                       <div class="hotel__facilities__item nlfbottom wow fadeInUp" data-wow-duration="1.2s">
                                          <div class="head__wrap">
                                             <img src="/assets/img/room/breakfast.png" alt="img">
                                             <h5>
                                                <a href="bus-list.html">
                                                   Breakfast
                                                </a>
                                             </h5>
                                          </div>
                                          <p>
                                             It is a long established fact that a reader will be distracted by the...
                                          </p>
                                       </div>
                                       <div class="hotel__facilities__item nlfbottom wow fadeInUp" data-wow-duration="1.6s">
                                          <div class="head__wrap pt__30">
                                             <img src="/assets/img/room/seats.png" alt="img">
                                             <h5>
                                                <a href="bus-list.html">
                                                   Comfortable seats
                                                </a>
                                             </h5>
                                          </div>
                                          <p>
                                             It is a long established fact that a reader will be distracted by the...
                                          </p>
                                       </div>
                                       <div class="hotel__facilities__item wow fadeInUp" data-wow-duration="1.8s">
                                          <div class="head__wrap">
                                             <img src="/assets/img/room/wifi.png" alt="img">
                                             <h5>
                                                <a href="bus-list.html">
                                                   Sunlimited WIFI
                                                </a>
                                             </h5>
                                          </div>
                                          <p>
                                             It is a long established fact that a reader will be distracted by the...
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-4">
                                    <div class="bus__fasilitiesthumb">
                                       <img src="/assets/img/bus/busappp.png" alt="img">
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4">
                                    <div class="bus__fasilities__right">
                                       <div class="hotel__facilities__item nlfbottom wow fadeInDown" data-wow-duration="1.2s">
                                          <div class="head__wrap">
                                             <img src="/assets/img/room/drinkss.png" alt="img">
                                             <h5>
                                                <a href="bus-list.html">
                                                   Cold Drinks
                                                </a>
                                             </h5>
                                          </div>
                                          <p>
                                             It is a long established fact that a reader will be distracted by the...
                                          </p>
                                       </div>
                                       <div class="hotel__facilities__item nlfbottom wow fadeInDown" data-wow-duration="1.4s">
                                          <div class="head__wrap">
                                             <img src="/assets/img/room/hotcoffee.png" alt="img">
                                             <h5>
                                                <a href="bus-list.html">
                                                   Hot Coffee
                                                </a>
                                             </h5>
                                          </div>
                                          <p>
                                             It is a long established fact that a reader will be distracted by the...
                                          </p>
                                       </div>
                                       <div class="hotel__facilities__item wow fadeInDown" data-wow-duration="1.6s">
                                          <div class="head__wrap">
                                             <img src="/assets/img/room/salat.png" alt="img">
                                             <h5>
                                                <a href="bus-list.html">
                                                   Place of Religion Pray
                                                </a>
                                             </h5>
                                          </div>
                                          <p>
                                             It is a long established fact that a reader will be distracted by the...
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                  --></code></pre>
                            </div>
                        </div>
                    </div>
                    <!--home Car book-->
                    <div class="common__body__section pb__60">
                        <div class="common__body__head pb__20">
                            <h4>
                                Section [12]
                            </h4>
                            <ul class="nav nav-pills" id="pills-tabblockshs4n" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tabhs4n" data-bs-toggle="pill" data-bs-target="#pills-homeblockshs4n" type="button" role="tab" aria-controls="pills-homeblockshs4n" aria-selected="true">
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tabhs4n" data-bs-toggle="pill" data-bs-target="#pills-profileblcokshs4n" type="button" role="tab" aria-controls="pills-profileblcokshs4n" aria-selected="false">
                                        Html Code
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContentrehs3n">
                            <div class="tab-pane fade show active" id="pills-homeblockshs4n" role="tabpanel" aria-labelledby="pills-home-tabhs4n">
                                <section class="bus__ticket">
                                    <div class="container">
                                        <div class="row align-items-center">
                                            <div class="col-xxl-5 col-xl-5 col-lg-5">

                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6">
                                                <div class="train__ticket__content bus__ticket__content">
                                                    <div class="section__header mb__30">
                                                        <h2>
                                                            We provide bus booking at affordable rates
                                                        </h2>
                                                        <p>
                                                            There are many variations of passages of Lorem Ipsum available, but the  have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use...
                                                        </p>
                                                    </div>
                                                    <ul class="offer__list pb__40">
                                                        <li>
                                          <span class="thumb">
                                             <img src="/assets/img/bus/b1.png" alt="img">
                                          </span>
                                                            <span class="text">
                                             No Booking Charges
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
                                             <img src="/assets/img/bus/b3.png" alt="img">
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
                                             Easy for Refunds
                                          </span>
                                                        </li>
                                                        <li>
                                          <span class="thumb">
                                             <img src="/assets/img/bus/b5.png" alt="img">
                                          </span>
                                                            <span class="text">
                                             2 Lakh+ Routes
                                          </span>
                                                        </li>
                                                        <li>
                                          <span class="thumb">
                                             <img src="/assets/img/bus/b6.png" alt="img">
                                          </span>
                                                            <span class="text">
                                             100% Trust pay
                                          </span>
                                                        </li>
                                                    </ul>
                                                    <a href="bus-list.html" class="cmn__btn">
                                       <span>
                                          Explore deals
                                       </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane fade" id="pills-profileblcokshs4n" role="tabpanel" aria-labelledby="pills-profile-tabhs4n">
                     <pre><code class="language-markup"><!--

                    <section class="bus__ticket">
                        <div class="container">
                           <div class="row align-items-center">
                              <div class="col-xxl-5 col-xl-5 col-lg-5">

                              </div>
                              <div class="col-xxl-6 col-xl-6 col-lg-6">
                                 <div class="train__ticket__content bus__ticket__content">
                                    <div class="section__header mb__30">
                                       <h2>
                                          We provide bus booking at affordable rates
                                       </h2>
                                       <p>
                                          There are many variations of passages of Lorem Ipsum available, but the  have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use...
                                       </p>
                                    </div>
                                    <ul class="offer__list pb__40">
                                       <li>
                                          <span class="thumb">
                                             <img src="/assets/img/bus/b1.png" alt="img">
                                          </span>
                                          <span class="text">
                                             No Booking Charges
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
                                             <img src="/assets/img/bus/b3.png" alt="img">
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
                                             Easy for Refunds
                                          </span>
                                       </li>
                                       <li>
                                          <span class="thumb">
                                             <img src="/assets/img/bus/b5.png" alt="img">
                                          </span>
                                          <span class="text">
                                             2 Lakh+ Routes
                                          </span>
                                       </li>
                                       <li>
                                          <span class="thumb">
                                             <img src="/assets/img/bus/b6.png" alt="img">
                                          </span>
                                          <span class="text">
                                             100% Trust pay
                                          </span>
                                       </li>
                                    </ul>
                                    <a href="bus-list.html" class="cmn__btn">
                                       <span>
                                          Explore deals
                                       </span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                  --></code></pre>
                            </div>
                        </div>
                    </div>
                    <!--home Car book-->
                    <div class="common__body__section pb__60">
                        <div class="common__body__head pb__20">
                            <h4>
                                Section [13]
                            </h4>
                            <ul class="nav nav-pills" id="pills-tabblockshs4ns" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tabhs4ns" data-bs-toggle="pill" data-bs-target="#pills-homeblockshs4ns" type="button" role="tab" aria-controls="pills-homeblockshs4ns" aria-selected="true">
                                        Preview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tabhs4ns" data-bs-toggle="pill" data-bs-target="#pills-profileblcokshs4ns" type="button" role="tab" aria-controls="pills-profileblcokshs4ns" aria-selected="false">
                                        Html Code
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContentrehs3ns">
                            <div class="tab-pane fade show active" id="pills-homeblockshs4ns" role="tabpanel" aria-labelledby="pills-home-tabhs4ns">
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
                                                                    <img src="/assets/img/cars/location.png" alt="img">
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
                                                                    <img src="/assets/img/cars/bookiing.png" alt="img">
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
                                                                    <img src="/assets/img/cars/rental.png" alt="img">
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
                                                                    <img src="/assets/img/cars/customer.png" alt="img">
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
                                                        <img src="/assets/img/cars/car-ingo.png" alt="img">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane fade" id="pills-profileblcokshs4ns" role="tabpanel" aria-labelledby="pills-profile-tabhs4ns">
                     <pre><code class="language-markup"><!--

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
                                                <img src="/assets/img/cars/location.png" alt="img">
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
                                                <img src="/assets/img/cars/bookiing.png" alt="img">
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
                                                <img src="/assets/img/cars/rental.png" alt="img">
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
                                                <img src="/assets/img/cars/customer.png" alt="img">
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
                                       <img src="/assets/img/cars/car-ingo.png" alt="img">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
                  --></code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blocks section End -->


@endsection
