<section class="hotel__booksection cars__booksection">

    @if(!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xxl-6 col-xl-6 col-lg-7">
                <div class="hotel__content">
                    <h3 class="wow fadeInDown" data-wow-duration="2s">
                        {!!  settings('home_banner_title')  !!}

                    </h3>
                    <p class="wow fadeInUp max-636" data-wow-duration="2s">
                        {!! settings('home_banner_description') !!}
                    </p>

                </div>
            </div>
            <div class="col-xxl-5 col-xl-6 col-lg-5">

            </div>
        </div>
    </div>
    <div class="car__shape">
{{--        <img src="/assets/img/bg.png" alt="img">--}}
        <img src="{{ settings('home_banner_image','/assets/img/cars/car-bg.png') }}" alt="img">
    </div>
</section>
