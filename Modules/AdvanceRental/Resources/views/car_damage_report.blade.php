@extends('frontpage.layouts.return')


@section('content')
    <div class="nk-content " >
        <div class="container-fluid">


            <div class="nk-content-inner">

                <livewire:frontend.dashboard.customer-return :car_id="$car_id" :carDamageReport="$carDamageReport ?? null" :companyId="$company_id" :booking_id="$booking_id" :return_id="$return_id"  />

            </div>
        </div>
    </div>
@endsection
