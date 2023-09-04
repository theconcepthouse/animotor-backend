@extends('layouts.dash')


@section('content')


    <!-- order here -->
    <section class="personal__information pt-120 pb__60">
        <div class="container">
            <div class="row justify-content-center">
                @include('dashboard.partials.sidebar')

                <div class="col-md-9">

                    <div class="personal__favorites">
                        <div class="personal__info__box">
                            <div class="per__ittle d-flex align-items-center">
                                <h5>
                                    Recent bookings
                                </h5>
                            </div>

                            <div class="table__system pb__24">
                                @if(count($bookings) > 0)
                                    <table class="table1">
                                        <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Service Area</th>
                                            <th>Reference</th>
                                            <th>Ride type</th>
                                            <th>Date</th>
                                            <th>Driver Name</th>
                                            <th>Trip Status</th>
                                            <th>Service type</th>
                                            <th>Payment Status</th>
                                            <th>Payment Method</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($bookings as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $item?->region?->name }}</td>
                                                <td>{{ $item->reference }}</td>
                                                <td>{{ $item->ride_type }}</td>
                                                <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>

                                                <td>
                                                    @if($item?->driver)
                                                        <a href="#"> {{ $item?->driver?->name }} </a>
                                                    @else
                                                        {{ "ride not picked" }}
                                                    @endif

                                                </td>

                                                {{--    <td></td>--}}
                                                <td>{{ $item->status }}</td>
                                                <td>{{ $item?->service?->name }}</td>
                                                <td>{{ $item->payment_status }}</td>
                                                <td>{{ $item->payment_method }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p class="mt-5">No booking history yet</p>
                                @endif
                            </div>

                        </div>
                    </div>



                    <div class="personal__infobody">
                        <div class="personal__info__box">
                            <div class="per__ittle border__bottom pb__20 d-flex align-items-center">
                                <h5>
                                    Credit or Debit Cards
                                </h5>
                            </div>
                            <div class="debit__creadit d-flex align-items-center">

                                <a wire:navigate href="{{ route('top_up') }}" class="card__boxed">
                                    <img src="/assets/img/payment/payplus.png" alt="img">
                                    <span>
                           Account top up
                        </span>
                                </a>
                            </div>
                        </div>
                    </div>


                </div>


                </div>
            </div>
        </div>
    </section>
    <!-- order End -->

@endsection
