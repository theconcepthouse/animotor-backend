@extends('frontpage.layouts.return')


@section('content')
    <div class="nk-content " >
        <div class="container-fluid">
            <div class="nk-content-inner">

                <livewire:frontend.dashboard.customer-return :booking="{{ $booking_id }}" />

            </div>
        </div>
    </div>
@endsection
