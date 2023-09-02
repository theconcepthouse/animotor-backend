@extends('frontpage.print_layout')


@section('content')

    @if(!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif


    <section class="pt-120 pb-120">
        <div class="row- justify-content-center- text-center">
            <div class="col-12 justify-content-center">
                <a href="{{ route('return') }}" class="cmn__btn">
                    <span>Return vehicle</span>
                </a>
            </div>
            <div class="col-12 mt-4 justify-content-center">
                <a href="{{ route('rental.report_defect', ['id' => \App\Models\Car::first()->id]) }}" class="cmn__btn">
                    <span>Report vehicle defect</span>
                </a>
            </div>
            <div class="col-12 mt-4 justify-content-center">
                <a href="{{ route('rental.report_incident', \App\Models\Booking::first()->id) }}" class="cmn__btn">
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
                    <span>Monthly Maintanance</span>
                </a>
            </div>
        </div>
    </section>


    <div class="voucher_page_footer_bg"></div>

@endsection
