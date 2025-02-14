@extends('frontpage.print_layout')


@section('content')

    @if(!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif


    <section class="pt-120 pb-120 booking_view">
        <div class="row- justify-content-center- text-center">
           <div class="col-12 d-flex justify-content-center mb-3">
            <div class="vehicle p-3 d-flex align-items-center justify-content-center">
                <div class="registration-container me-2">
                    <span class="registration-number">
                        {{ $booking?->car?->registration_number }}
                    </span>
                </div>
                <h6 class="vehicle_name">{{ $booking?->car?->title }}</h6>
            </div>
        </div>

            <div class="col-12 justify-content-center">
                <a href="{{ route('return') }}" class="cmn__btn">
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
                <a href="#" class="cmn__btn">
                    <span>Documents</span>
                </a>
            </div>
            <div class="col-12 mt-4 justify-content-center">
                <a href="#" class="cmn__btn">
                    <span>Change of address</span>
                </a>
            </div>
            <div class="col-12 mt-4 justify-content-center">
                <a href="#" class="cmn__btn">
                    <span>PCNs</span>
                </a>
            </div>
            <div class="col-12 mt-4 justify-content-center">
                <a href="#" class="cmn__btn">
                    <span>Monthly Maintenance</span>
                </a>
            </div>
        </div>
    </section>


    <div class="voucher_page_footer_bg"></div>

@endsection
