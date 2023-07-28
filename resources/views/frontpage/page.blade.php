@extends('frontpage.layout')

@section('page_title')
    {{ $page->title }}
@endsection

@section('content')

    @foreach($contents as $item)

        @php
            eval(' ?> ' . Blade::compileString($item->content));
        @endphp
    @endforeach

@endsection
