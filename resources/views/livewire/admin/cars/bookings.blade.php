<div class="row">

    @if(count($bookings) < 1)
        <h6 class="text-center mt-5">{{ __('admin.no_booking_history') }}</h6>
    @endif

    @if(count($bookings) > 0)
            <div class="dataTables_wrapper dt-bootstrap4 no-footer mt-4">
                <div class="datatable-wrap- my-3">
                    <table class="nowrap table" data-export-title="{{ __('admin.export_title') }}">
                        <thead>

                        <tr>
                            <th>{{ __('admin.sn') }}</th>
                            <th>{{ __('admin.booking_no') }}</th>
                            <th>{{ __('admin.booking_date') }}</th>
                            <th>{{ __('admin.pickup_date_time') }}</th>
{{--                            <th>{{ __('admin.dropoff_date_time') }}</th>--}}
                            <th>{{ __('admin.period') }}</th>
                            <th>{{ __('admin.customer_name') }}</th>
                            <th>{{ __('admin.service_area') }}</th>
                            <th>{{ __('admin.booking_status') }}</th>
                            <th>{{ __('admin.total_cost') }}</th>
                            <th>{{ __('admin.payment_status') }}</th>
                            <th>{{ __('admin.booking_type') }}</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($bookings as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>

                                <td>
                                    <a href="{{ route('admin.bookings.show', $item->id) }}">{{ $item->booking_number }}</a>
                                </td>
                                <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>{{ $item->pick_up_date }} {{ $item->pick_up_time }}</td>
                                <td>{{ $item->days }} {{ __('admin.booking_days') }}</td>


                                <td>
                                    @if($item?->customer)
                                        <a href="{{ route('admin.user.show',$item?->customer?->id) }}"> {{ $item?->customer?->name }} </a>
                                    @else
                                        {{ "not found" }}
                                    @endif
                                </td>
                                <td>{{ $item?->region?->name }}</td>

                                <td>{{ $item->status }}</td>
                                <td>{{ amt($item->grand_total) }}</td>


                                {{--    <td></td>--}}
                                <td>{{ $item->status }}</td>

                                <td>{{ $item->payment_status }}</td>

                                <td>{{ $item->booking_type }}</td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
</div>
