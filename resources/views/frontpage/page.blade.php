@extends('frontpage.layout')

@section('page_title')
    {{ $page->title }}
@endsection

@section('content')

    @if(!request()->has('app'))
    @if(settings('nav_style') == 'nav_inline' && $page->path != '/')
        <section class="banner-section">

            <div class="container">
                <div class="home-banner">
                    @include('frontpage.partials.inline_menu')
                </div>
            </div>
        </section>
    @endif
    @endif

    @foreach($contents as $item)

        @php
            eval(' ?> ' . Blade::compileString($item->content));
        @endphp
    @endforeach

@endsection
