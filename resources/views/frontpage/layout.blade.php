<!DOCTYPE html>
<html lang="en">

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


@yield('js')

</body>

</html>
