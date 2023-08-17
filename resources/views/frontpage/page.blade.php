@extends('frontpage.layout')

@section('page_title')
    {{ $page->title }}
@endsection

@section('content')

    @if($page->path == '/')
        <!--cars booking Here -->

        @include(settings('home_banner_component','frontpage.components.banner_default'))

    @else
        @if(!request()->has('app'))
            @include('frontpage.partials.layout.header')
        @endif
    @endif


    @include('frontpage.components.home_booking')


    <section class="container section_three ">
        <div class="row g-0">
            <div class="col-md-8 text-light">
                <p class="text-title text-white">sign in to save 10% with Genius</p>
                <p class="p_text mt-4 text-white">You're eligible for discounts on select car rentals.</p>
            </div>
            <div class="col-md-4 justify-content-center pt-md-2 text-center">
                <button type="button" class=" cmn_btn_white">Sign Up now</button>
            </div>
        </div>
    </section>

    <section class="container mt-5">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="/assets/img/support.png" />
                <p class="text-title mt-2"> we're here for you</p>
                <p>Providing customer support in <br/> over 30 languages</p>

            </div>
            <div class="col-md-4 text-center">
                <img src="/assets/img/calender.png" />
                <p class="text-title mt-2"> Free cancellation</p>
                <p>On most booking, up to 48 hours <br/> before pick-up</p>

            </div>
            <div class="col-md-4 text-center">
                <img src="/assets/img/review.png" />
                <p class="text-title mt-2">5 million + reviews</p>
                <p>By verified customers </p>

            </div>
        </div>
    </section>


    @include('frontpage.components.testimonials')
    @include('frontpage.components.faqs')
    @include('frontpage.components.popular_car_hire')


    @foreach($contents as $item)


        @if($item->is_shortcode)
            @include($item->content)
        @else
            {!! $item->content !!}
        @endif
    @endforeach

    @include('frontpage.components.subscribe')


@endsection
