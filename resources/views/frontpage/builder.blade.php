@extends('frontpage.layout')

@section('content')

    @if(!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif



    @include('hotel::components.popular_rooms')
@endsection
