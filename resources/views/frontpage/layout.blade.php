<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

{{--    <title>{{ settings('site_name') }} | @yield('page_title')</title>--}}
    <title>{{ settings('site_name') }} </title>

    <!--Favicon img-->
    <link rel="shortcut icon" href="{{ settings('favicon') }}">
    <!--nice select css-->
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <!--datepicker css-->
    <link rel="stylesheet" href="{{ asset('assets/css/datepickerboot.css') }}">
    <!--main css-->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css">

    <link rel="stylesheet" href="/vendor/sweetalert/sweetalert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    @yield('style')


    {!! settings('head_section') !!}

    <style>
        .services {
            padding-top: 10px!important;
        }
        .btn_rounded {
            border-radius: 50px;
            padding-right: 50px;
            padding-left: 50px;
            width: 100%;
        }
        .input_btn {
            width: 50%;
        }




        .step-form {
            display: flex;
            justify-content: space-between;
            /*background-color: #f7f7f8;*/
            padding: 10px;
        }

        .step {
            flex: 1;
            text-align: center;
            padding: 10px;
            cursor: pointer;
            background-color: #e9ecef;
        }

        .step.active {
            background-color: #007bff;
            color: #ffffff;
        }
        .step.prev {
            background-color: #22D187;
            color: #ffffff;
        }

        .step:first-child {
            border-bottom-left-radius: 30px;
            border-top-left-radius: 30px;
        }
        .step:last-child {
            border-bottom-right-radius: 30px;
            border-top-right-radius: 30px;
        }

        .active p {
            color: #ffffff;
        }



        /* CSS */
        .image-picker {
            border: 1px dashed #ccc;
            position: relative;
            padding: 20px;
            min-height: 150px;
            cursor: pointer;

        }

        .picker_img{
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            opacity: 0.5;
            min-height: 150px;

        }

        .image-preview {
            display: none;
        }

        .dropzone-placeholder {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            /*color: #aaa;*/
            color: red;
            font-weight: 600;
        }



        .image-container {
            position: relative;
            display: inline-block;
        }

        .delete-icon {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 5px 8px;
            cursor: pointer;
        }

        .image-picker.active .dropzone-placeholder {
            display: none;
        }

        .image-picker.active .image-preview {
            display: block;
        }


        .header_simple {
            border-bottom: 1px solid #7180962b;
            padding: 18px 0px;
        }

        .vehicle {
            background-color: #67849d82;
            border-radius: 10px;
            width: 400px;
        }

         .vehicle .vehicle_no{
            background-color: yellow;
            border-radius: 5px;
            /*flex-direction: row;*/
            padding: 10px;
        }

         .car_categories .owl-item p {
             color: #3F3F3F;
         }

         .car_section .text-title {
             font-size: 1.0em;
         }

         /*.common__filter__wrapper .search__item {*/
         /*    max-height: 300px;*/
         /*    overflow: auto;*/
         /*}*/
         .common__filter__wrapper .common__sidebar__content {
             max-height: 300px;
             overflow: auto;
         }

         .is_app_top .flight__onewaysection {
             padding-top: 90px!important;
         }

    </style>

    <style>
        .registration-container {
            background-color: #FFD700; /* Gold background for the registration number */
            border-radius: 5px;
            padding: 5px 10px;
            display: inline-block;
        }

        .registration-number {
            font-weight: bold;
            color: #000; /* Black text color */
            font-size: 16px;
        }

        .vehicle_name {
            font-weight: bold;
            font-size: 18px;
            margin: 0;
            color: #333; /* Dark gray for vehicle name */
        }

    </style>

</head>

<body class="{{ is_app() ? 'is_app_top' : '' }}">

<!-- Preloader Start Here -->
<div class="preloader__wrap">
    <div class="preloader__box">
{{--        <div class="circle">--}}
{{--            <img src="assets/img/preloader/preloader.png" alt="preloader">--}}
{{--        </div>--}}
        <div class="recharge">
            <img src="/assets/img/preloader/rechage.png" alt="rechage">
        </div>
{{--        <span class="pretext">--}}
{{--         Swift bookings--}}
{{--      </span>--}}
    </div>
</div>
<!-- Preloader End Here -->


@yield('content')

@if(!is_app())
@include('frontpage.partials.layout.footer')
@endif

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

<script src="/vendor/sweetalert/sweetalert.min.js"></script>


@if (session('success'))
    <script>
        "use strict";
        $(document).ready(function () {
            swal("Success!", "{{ session('success') }}", "success");
        });
    </script>
@endif

@if (session('error'))
    <script>
        "use strict";
        $(document).ready(function () {
            swal("Opps!", "{{ session('error') }}", "error");
        });
    </script>
@endif




<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dateInputs = document.querySelectorAll('.date-input');

        dateInputs.forEach(function(input) {
            input.addEventListener('change', function() {
                if (input.value === '') {
                    input.classList.remove('filled');
                } else {
                    input.classList.add('filled');
                }
            });
        });
    });
</script>

{!! settings('foot_section') !!}

@yield('js')

</body>

</html>
