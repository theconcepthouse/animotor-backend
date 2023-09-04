
<!-- Footer Here -->
<footer class="footer__section bgsection pt-120">
    <div class="container">
        <div class="footer__wrapper">
            <div class="footer__top pb-120">
                <div class="row gy-5 gx-5">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="1s">
                        <div class="footer__widget">
                            <div class="widget__head mb__20">
                                <a href="#" class="footer__logo">
                                    <img style="height: 80px; width: auto" src="{{ settings('dark_logo') }}" alt="logo">
                                </a>
                            </div>
                            <p class="pratext mb__20 fz-18">
                                At OneTouchPay, we are committed to making your life more convenient and enjoyable.
                                With just one touch, you can effortlessly handle all your payments and top-ups, saving you time and effort.
                            </p>
                            <ul class="social d-flex gap-3">
                                <li>
                                    <a href="javascript:void(0)" class="social__icon">
                                        <img src="/assets/img/svg/facebook.svg" alt="svg">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="social__icon">
                                        <img src="/assets/img/svg/instagram.svg" alt="svg">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="social__icon">
                                        <img src="/assets/img/svg/twitter.svg" alt="svg">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="social__icon">
                                        <img src="/assets/img/svg/ball.svg" alt="svg">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="footer__widget">
                            <div class="widget__head mb__20">
                                <h4 class="fz-24 pratext">
                                    Quick Links
                                </h4>
                            </div>
                            <div class="widget__link">
                                <a href="#" class="link fz-18 pratext">
                                    Home
                                </a>
                                <a href="#about" class="link fz-18 pratext">
                                    About
                                </a>
                                <a href="{{ route('dashboard') }}" class="link fz-18 pratext">
                                    Rechage & Bill Payment
                                </a>
                                <a href="{{ route('transactions') }}" class="link fz-18 pratext">
                                    Bookings
                                </a>
                                <a href="#service" class="link fz-18 pratext">
                                    Services
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="1.7s">
                        <div class="footer__widget">
                            <div class="widget__head mb__20">
                                <h4 class="fz-24 pratext">
                                    Address
                                </h4>
                            </div>
                            <div class="widget__link">
                                <a href="javascript:void(0)" class="link fz-18 pratext">
                          <span class="d-block">
                           {{ settings('contact_email') }}
                          </span>
                                    <span>
                           {{ settings('contact_phone') }}
                          </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom d-flex">
                <p class="fz-18 pratext">
                    Copyright &copy;2023 <a href="#" class="base">{{ settings('site_name') }}.</a> All Rights Reserved
                </p>
                <ul class="footer__bottom__link">
                    <li>
                        <a href="#">
                            Support
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Terms of Use
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Privacy Policy
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

