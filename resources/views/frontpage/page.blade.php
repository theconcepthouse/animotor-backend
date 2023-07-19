@extends('frontpage.layout')

@section('content')

    @foreach($contents as $item)
        {!! $item->content !!}
    @endforeach

@endsection
