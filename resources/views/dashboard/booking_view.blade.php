@extends('dashboard.layout')


@section('content')

    @if(!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif



    <section class="pt-120 pb-120 booking_view">
        <div class="container ">
        <div class="row justify-content-center- text-center">

{{--            <div class="col-12">--}}
{{--                @if(session()->has('success'))--}}
{{--                    <div class="alert alert-success">--}}
{{--                        {{ session()->get('success') }}--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div>--}}


            <div class="col-12 justify-content-center d-flex mb-3">
                <div class="vehicle p-3">
                    <div class="d-flex justify-content-center">
                        <p class="vehicle_no">{{ $booking?->car?->car?->registration_number }}</p>

                    </div>
                    <h6 class="vehicle_name mt-2">{{ $booking?->car?->title }}</h6>
                </div>
            </div>

            <div class="col-12 justify-content-center">
                <a href="{{ route('return.vehicle', $booking->id) }}" class="cmn__btn">
                    <span>Return vehicle</span>
                </a>
            </div>
            <div class="col-12 mt-4 justify-content-center">
                <a href="{{ route('rental.report_defect', ['id' => $booking->id]) }}" class="cmn__btn">
                    <span>Report vehicle defect</span>
                </a>
            </div>
            <div class="col-12 mt-4 justify-content-center">
                <a href="{{ route('rental.report_incident', $booking->id) }}" class="cmn__btn">
                    <span>Report an incident</span>
                </a>
            </div>
            <div class="col-12 mt-4 justify-content-center">
                <a href="{{ route('booking.documents', $booking->id) }}" class="cmn__btn">
                    <span>Documents</span>
                </a>
            </div>
{{--            <div class="col-12 mt-4 justify-content-center">--}}
{{--                <a href="#" class="cmn__btn">--}}
{{--                    <span>Change of address</span>--}}
{{--                </a>--}}
{{--            </div>--}}
            <div class="col-12 mt-4 justify-content-center">
                <a href="#" class="cmn__btn">
                    <span>PCNs</span>
                </a>
            </div>
            <div class="col-12 mt-4 justify-content-center">
                <a href="{{ route('vehicle_inspection.create',$booking->id) }}" class="cmn__btn">
                    <span>Monthly Maintenance</span>
                </a>
            </div>
        </div>
        </div>
    </section>



@endsection
