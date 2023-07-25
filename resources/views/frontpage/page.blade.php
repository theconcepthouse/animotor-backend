@extends('frontpage.layout')

@section('content')

    @foreach($contents as $item)

        {!! bladeCompile($item->content) !!}
    @endforeach

@endsection
