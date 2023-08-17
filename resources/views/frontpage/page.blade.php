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


    @foreach($contents as $item)


        @if($item->is_shortcode)
            @include($item->content)
        @else
            {!! $item->content !!}
        @endif
    @endforeach

    @include('frontpage.components.subscribe')


@endsection
