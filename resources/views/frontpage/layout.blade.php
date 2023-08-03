<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ settings('site_name') }} | @yield('page_title')</title>

    <!--Favicon img-->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo/favicon.png') }}">
    <!--nice select css-->
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <!--datepicker css-->
    <link rel="stylesheet" href="{{ asset('assets/css/datepickerboot.css') }}">
    <!--main css-->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    @yield('style')

    {!! settings('head_section') !!}

</head>

<body>

<!-- Preloader Start Here -->
<div class="preloader__wrap">
    <div class="preloader__box">
        <div class="circle">
            <img src="assets/img/preloader/preloader.png" alt="preloader">
        </div>
        <div class="recharge">
            <img src="assets/img/preloader/rechage.png" alt="rechage">
        </div>
{{--        <span class="pretext">--}}
{{--         Swift bookings--}}
{{--      </span>--}}
    </div>
</div>
<!-- Preloader End Here -->


@yield('content')


@include('frontpage.partials.layout.footer')

<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<!--Viewport Jquery Js-->
<script src="{{ asset('assets/js/viewport.jquery.js') }}"></script>
<!--Odometer min Js-->
<script src="{{ asset('assets/js/odometer.min.js') }}"></script>
<!--date picker Js-->
<script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
<!--Magnifiw Popup Js-->
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<!--nice select Js-->
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<!--Wow min Js-->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<!--Owl carousel min Js-->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!--Prijm Js-->
<script src="{{ asset('assets/js/prism.js') }}"></script>
<!--main Js-->
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
