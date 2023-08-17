@extends('frontpage.layout')


@section('content')

    @if(!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif


    <!-- hotel list here -->
    <section class="flight__onewaysection pb__60">

        @include('frontpage.components.home_booking')

        <livewire:car-listing />

    </section>
    <!-- hotel list End -->

@endsection
