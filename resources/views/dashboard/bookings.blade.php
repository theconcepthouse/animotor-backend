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
                                    All Bookings
                                </h5>
                            </div>

                            <div class="table__system pb__24 table-responsive">
                                @if(count($bookings) > 0)
                                <table class="table1 table-condensed table-responsive">
                                    <thead>
                                    <tr>
                                        <th>{{ __('admin.sn') }}</th>

                                        <th>{{ __('admin.service_area') }}</th>
                                        <th>{{ __('admin.car') }}</th>
                                        <th>{{ __('admin.booking_no') }}</th>
                                        <th>{{ __('admin.reference') }}</th>
                                        <th>{{ __('admin.booking_date') }}</th>
                                        <th>{{ __('admin.period') }}</th>


                                        {{--                                <th>{{ __('admin.pickup_date') }}</th>--}}
                                        <th>{{ __('admin.booking_status') }}</th>
                                        <th>{{ __('admin.total_cost') }}</th>
                                        <th>{{ __('admin.payment_status') }}</th>
                                        <th>{{ __('admin.payment_method') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bookings as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>

                                            <td>{{ $item?->region?->name }}</td>

                                            <td>{{ $item?->car?->title }}</td>
                                            <td><a class="link" wire:navigate href="{{ route('booking', $item->id) }}">
                                                    {{ $item->booking_number }}</a>
                                            </td>
                                            <td>{{ $item->reference }}</td>
                                            <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                                            <td>{{ $item->days }} {{ __('admin.booking_days') }}</td>


                                            {{--    <td></td>--}}
                                            <td>{{ $item->status }}</td>

                                            <td>{{ amt($item->grand_total) }}</td>
                                            <td>{{ $item->payment_status }}</td>
                                            <td>{{ $item->payment_method }}</td>
                                            {{--    <td></td>--}}
                                            {{--    <td></td>--}}


                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <p class="mt-5">No bookings yet</p>
                                @endif
                            </div>



                            <div class="d-flex mt-2">
                                {!! $bookings->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- order End -->

@endsection
