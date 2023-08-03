@extends('frontpage.layout')

@section('page_title')
    {{ $page->title }}
@endsection

@section('content')


    @if($page->path == '/')
        <!--cars booking Here -->
        <section class="hotel__booksection cars__booksection">

            @if(!request()->has('app'))
                @include('frontpage.partials.layout.header')
            @endif
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-7">
                        <div class="hotel__content">
                            <h1 class="wow fadeInDown" data-wow-duration="2s">
                                Swift Booking

                            </h1>
                            <p class="wow fadeInUp max-636" data-wow-duration="2s">
                                Your One-Stop Travel Companion <br/>
                                Enjoy unforgettable supercar tours, holidays, hospitality and more with Discover your next great adventure.
                            </p>

                        </div>
                    </div>
                    <div class="col-xxl-5 col-xl-6 col-lg-5">

                    </div>
                </div>
            </div>
            <div class="car__shape">
                <img src="assets/img/cars/car-bg.png" alt="img">
            </div>
        </section>
    @else
        @if(!request()->has('app'))
            @include('frontpage.partials.layout.header')
        @endif
    @endif


    @if(strlen($contents) < 300)
        @include('frontpage.partials.dummy')
    @endif

    @foreach($contents as $item)

        @php
            eval(' ?> ' . Blade::compileString($item->content));
        @endphp
    @endforeach

@endsection
