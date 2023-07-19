<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ settings('site_name') }} | Template</title>

    <link rel="shortcut icon" href="/assets/img/favicon.png">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="/assets/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="/assets/plugins/aos/aos.css">

    <link rel="stylesheet" href="/assets/css/feather.css">

    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">

    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div class="main-wrapper">

    @if(!request()->has('app'))
    <header class="header">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a id="mobile_btn" href="javascript:void(0);">
<span class="bar-icon">
<span></span>
<span></span>
<span></span>
</span>
                    </a>
                    <a href="index-2.html" class="navbar-brand logo">
                        <img style="height: 50px" src="{{ settings('light_logo',asset('default/logo.png')) }}" class="img-fluid" alt="Logo">
                    </a>
                    <a href="index-2.html" class="navbar-brand logo-small">
                        <img style="height: 50px" src="{{ settings('light_logo',asset('default/logo.png')) }}" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="main-menu-wrapper">
                    <div class="menu-header">
                        <a href="index-2.html" class="menu-logo">
                            <img style="height: 50px" src="{{ settings('light_logo',asset('default/logo.png')) }}" class="img-fluid" alt="Logo">
                        </a>
                        <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i></a>
                    </div>
                    <ul class="main-nav">
                        <li><a href="/">Home</a></li>
                        <li><a href="/flight">Flight Booking</a></li>
                        <li><a href="#">About</a></li>

                        <li class="login-link">
                            <a href="#">Sign Up</a>
                        </li>
                        <li class="login-link">
                            <a href="#">Sign In</a>
                        </li>
                    </ul>
                </div>
                <ul class="nav header-navbar-rht">
                    <li class="nav-item">
                        <a class="nav-link header-login" href="#"><span><i class="fa-regular fa-user"></i></span>Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link header-reg" href="#"><span><i class="fa-solid fa-lock"></i></span>Sign Up</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    @endif

    @yield('content')

        @if(!request()->has('app'))
        <footer class="footer">

        <div class="footer-top aos" data-aos="fade-up">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">

                                <div class="footer-widget footer-menu">
                                    <h5 class="footer-title">About Company</h5>
                                    <ul>
                                        <li><a href="/about">Our Company</a></li>
                                        <li><a href="/privacy">Privacy policy</a></li>
                                        <li><a href="/terms">Terms of us</a></li>

                                    </ul>
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-6">

                                <div class="footer-widget footer-menu">
                                    <h5 class="footer-title">Booking Type</h5>
                                    <ul>
                                        <li><a href="javascript:void(0)">Car Rental</a></li>
                                        <li><a href="javascript:void(0)">Car Instant ride</a></li>
                                        <li><a href="javascript:void(0)">Hotel booking</a></li>
                                        <li><a href="javascript:void(0)">Flight Booking</a></li>
                                    </ul>
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-6">

                                <div class="footer-widget footer-menu">
                                    <h5 class="footer-title">Quick links</h5>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">My Account</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Champaigns</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Dreamsrental Dealers</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Deals and Incentive</a>
                                        </li>

                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="footer-contact footer-widget">
                            <h5 class="footer-title">Contact Info</h5>
                            <div class="footer-contact-info">
                                <div class="footer-address">
                                    <span><i class="feather-phone-call"></i></span>
                                    <div class="addr-info">
                                        <a href="tel:{{ settings('contact_phone') }}">{{ settings('contact_phone') }}</a>
                                    </div>
                                </div>
                                <div class="footer-address">
                                    <span><i class="feather-mail"></i></span>
                                    <div class="addr-info">
                                        {{ settings('contact_email') }}
                                    </div>
                                </div>
                            </div>
                            <div class="footer-social-widget">
                                <h6>Connect with us</h6>
                                <ul class="nav-social">
                                    <li>
                                        <a href="javascript:void(0)" target="_blank"><i class="fa-brands fa-facebook-f fa-facebook fi-icon"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" target="_blank"><i class="fab fa-instagram fi-icon"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" target="_blank"><i class="fab fa-behance fi-icon"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" target="_blank"><i class="fab fa-twitter fi-icon"></i> </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" target="_blank"><i class="fab fa-linkedin fi-icon"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="footer-bottom">
            <div class="container">

                <div class="copyright">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="copyright-text">
                                <p>© 2023 Dreams Rent. All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="copyright-menu">
                                <div class="vistors-details">
                                    <ul class="d-flex">
                                        <li><a href="javascript:void(0)"><img class="img-fluid" src="/assets/img/icons/paypal.svg" alt="Paypal"></a></li>
                                        <li><a href="javascript:void(0)"><img class="img-fluid" src="/assets/img/icons/visa.svg" alt="Visa"></a></li>
                                        <li><a href="javascript:void(0)"><img class="img-fluid" src="/assets/img/icons/master.svg" alt="Master"></a></li>
                                        <li><a href="javascript:void(0)"><img class="img-fluid" src="/assets/img/icons/applegpay.svg" alt="applegpay"></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </footer>
        @endif
</div>

<div class="progress-wrap active-progress">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewbox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;"></path>
    </svg>
</div>


<script src="/assets/js/jquery-3.6.4.min.js"></script>

<script src="/assets/js/bootstrap.bundle.min.js"></script>

<script src="/assets/js/jquery.waypoints.js"></script>
<script src="/assets/js/jquery.counterup.min.js"></script>

<script src="/assets/plugins/select2/js/select2.min.js"></script>

<script src="/assets/plugins/aos/aos.js"></script>

<script src="/assets/js/backToTop.js"></script>

<script src="/assets/plugins/moment/moment.min.js"></script>
<script src="/assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="/assets/js/owl.carousel.min.js"></script>

<script src="/assets/js/script.js"></script>
</body>
</html>
