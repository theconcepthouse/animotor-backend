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


    @yield('style')

    <style>
        .footer__logo img {
            /*height: 40px;*/
            width: 100%;
        }
        /*#e7323c*/

        @media screen and (max-width: 575px){
            .pt-120 {
                 padding-top: 130px;
            }
        }

        /*.cmn__btn:hover {*/
        /*    background-color: #6a1d1d!important;*/
        /*}*/
        /*.outline__btn:hover {*/
        /*    background-color: #6a1d1d!important;*/
        /*}*/

        /*.cmn__btn::before {*/
        /*    position: absolute;*/
        /*    content: "";*/
        /*    top: 0;*/
        /*    left: 50%;*/
        /*    background: #a31313;*/
        /*}*/
        .bank_info {
            margin: 10px;
            background: #cecece;
            padding: 20px;
            border-radius: 20px;
        }
    </style>

    {!! settings('head_section') !!}

    @livewireStyles
</head>

<body>


@if(!request()->has('app'))
    <header class="header-section header_simple">
    <div class="container">
        <div class="header-wrapper">
            <div class="logo-menu">
                <a href="/" class="logo">
                    <img  style="max-height: 60px" src="{{ settings('front_logo') }}" alt="logo">
                </a>
                <a href="/" class="small__logo d-xl-none">
                    <img src="{{ settings('front_sm_logo') }}" alt="logo">
                </a>
            </div>
            <div class="menu__right__components d-flex align-items-center">
                <div class="sigup__grp d-lg-none">

                </div>

            </div>
            <ul class="main-menu">

                @auth()
                    <li class="sigup__grp- d-lg-none d-flex align-items-center">
                        <a wire:navigate href="{{ route('dashboard') }}" class="cmn__btn">
                     <span>
                        dashboard
                     </span>
                        </a>
                    </li>
                @endauth
            </ul>
            <div class="sigin__grp- d-flex align-items-center">
                @auth()
                    <a href="{{ route('dashboard') }}" class="cmn__btn">
                  <span>
                     Dashboard
                  </span>
                    </a>
                @endauth
            </div>
        </div>
    </div>
</header>
@endif
@yield('content')




<script src="{{ asset('/assets/js/jquery-3.6.0.min.js') }}"></script>

<script src="{{ asset('/assets/js/bootstrap.bundle.min.js') }}"></script>
<!--Viewport Jquery Js-->
<script src="{{ asset('/assets/js/viewport.jquery.js') }}"></script>

<!--Magnifiw Popup Js-->
<script src="{{ asset('/assets/js/jquery.magnific-popup.min.js') }}"></script>
<!--nice select Js-->
{{--<script src="{{ asset('/assets/js/jquery.nice-select.min.js') }}"></script>--}}
<!--Wow min Js-->

<!--Prijm Js-->
<script src="{{ asset('/assets/js/prism.js') }}"></script>
<!--main Js-->
<script src="{{ asset('/assets/js/main.js') }}"></script>

<script src="/vendor/sweetalert/sweetalert.min.js"></script>


@livewireScripts


<script>
    document.addEventListener('livewire:navigated', function () {
        setTimeout(function(){
            $('.preloader__wrap').fadeOut();
        }, 1000);
    });

</script>


@include('partials.alerts')

</body>

</html>
