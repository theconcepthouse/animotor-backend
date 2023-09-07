@extends('frontpage.layout')


@section('content')

    @if(!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif


    <section class="pt-120 pb-120 booking_view ">
        <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 mx-auto">
                <form method="post" action="{{ route('vehicle_return.store') }}">

                    @csrf



                    <input name="booking_id" type="hidden" value="{{ $booking->id }}" />
                    <input name="car_id" type="hidden" value="{{ $booking->car_id }}" />

                    <div class="row">
                        <div class="col-12 justify-content-center d-flex mb-3 mt-5">
                            <div class="vehicle p-4">
                                <div class="d-flex justify-content-center">
                                    <p class="vehicle_no">{{ $booking?->car?->car?->registration_number }}</p>

                                </div>
                                <h6 class="vehicle_name mt-3">{{ $booking?->car?->title }}</h6>
                            </div>
                        </div>

                        <div class="col-12 justify-content-center mt-5 text-center">
                            <h4>Choose return date and time</h4>

                            <p class="{{ $booking->completed ? 'btn btn-success' : 'btn-warning btn' }} mt-3">{{ $return->status }}</p>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @include('frontpage.components.form.text', ['attributes' => 'required', 'type' => 'datetime-local',  'value' => $return?->return_date_time, 'colSize' => 'col-md-12 mt-4', 'fieldName' => 'return_date_time','title' => 'Return date & time'])
                        @include('frontpage.components.form.textarea', ['attributes' => 'required', 'value' => $return?->reason, 'colSize' => 'col-md-12 mt-4', 'fieldName' => 'reason','title' => 'Return Reason'])

                        <div class="col-lg-12">
                            <div class="d-flex justify-content-center">
                                <div class="input__grp input_btn mt-3">
                                    <button type="submit" class="cmn__btn btn_rounded">
                               <span>
                                 Next
                               </span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

            </div>

        </div>
        </div>
    </section>


@endsection
