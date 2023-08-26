@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <livewire:admin.bookings.show :booking_item="$booking" />
            </div>
        </div>
    </div>


@endsection
