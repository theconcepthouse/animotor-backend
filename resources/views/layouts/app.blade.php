<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ settings('site_name') }} | @yield('page_title')</title>

    <!--Favicon img-->
    <link rel="shortcut icon" href="{{ settings('favicon') }}">
    <!--nice select css-->
    <link rel="stylesheet" href="{{ asset('/assets/css/nice-select.css') }}">
    <!--datepicker css-->
    <link rel="stylesheet" href="{{ asset('/assets/css/datepickerboot.css') }}">
    <!--main css-->
    <link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}">


    <link rel="stylesheet" href="/vendor/sweetalert/sweetalert.css">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    @yield('style')

    <style>
        .footer__logo img {
            /*height: 40px;*/
            width: 100%;
        }
        /*#e7323c*/

        .cmn__btn:hover {
            background-color: #6a1d1d!important;
        }
        .outline__btn:hover {
            background-color: #6a1d1d!important;
        }

        .cmn__btn::before {
            position: absolute;
            content: "";
            top: 0;
            left: 50%;
            background: #a31313;
        }
        .password-toggle {
            position: relative;
        }

        .password-toggle input[type="password"] {
            padding-right: 30px; /* Make room for the toggle button */
        }

        .password-toggle .toggle-btn {
            position: absolute;
            top: 65px;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>

    {!! settings('head_section') !!}

    @livewireStyles
</head>

<body>

{{--@include('partials.loader')--}}


@yield('content')


@if(!request()->has('app'))
    @include('frontpage.partials.layout.footer')
@endif


<script src="{{ asset('/assets/js/jquery-3.6.0.min.js') }}"></script>

<script src="{{ asset('/assets/js/bootstrap.bundle.min.js') }}"></script>
<!--Viewport Jquery Js-->
<script src="{{ asset('/assets/js/viewport.jquery.js') }}"></script>
<!--Odometer min Js-->
<script src="{{ asset('/assets/js/odometer.min.js') }}"></script>
<!--date picker Js-->
<script src="{{ asset('/assets/js/bootstrap-datepicker.js') }}"></script>
<!--Magnifiw Popup Js-->
<script src="{{ asset('/assets/js/jquery.magnific-popup.min.js') }}"></script>
<!--nice select Js-->
{{--<script src="{{ asset('/assets/js/jquery.nice-select.min.js') }}"></script>--}}
<!--Wow min Js-->
<script src="{{ asset('/assets/js/wow.min.js') }}"></script>
<!--Owl carousel min Js-->
<script src="{{ asset('/assets/js/owl.carousel.min.js') }}"></script>
<!--Prijm Js-->
<script src="{{ asset('/assets/js/prism.js') }}"></script>
<!--main Js-->
<script src="{{ asset('/assets/js/main.js') }}"></script>

<script src="/vendor/sweetalert/sweetalert.min.js"></script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACF6bkjbHGX_apTFV60dxGQh98DGKyNhg&libraries=places"></script>




@livewireScripts


@include('partials.alerts')


<script>
    // document.addEventListener('livewire:navigated', function () {
    //     setTimeout(function(){
    //         $('.preloader__wrap').fadeOut();
    //     }, 1000);
    // });

</script>


<script>
    const togglePassword = document.querySelector('#togglePassword');
    const passwordInput = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Toggle eye icon
        const eyeIcon = this.querySelector('i');
        eyeIcon.classList.toggle('fa-eye');
        eyeIcon.classList.toggle('fa-eye-slash');
    });
</script>
</body>

</html>
