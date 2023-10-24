<div class="nk-block">


    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title text-capitalize-"><span class="text-capitalize">{{ $status }}</span> {{ __('admin.booking_title') }}</h4>
            </div>
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                            class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light"
                                       data-bs-toggle="dropdown"><em
                                            class="d-none d-sm-inline icon ni ni-filter-alt"></em><span>{{ $status == 'all' ?  __('admin.filtered_by') : __('admin.'.$status)}}</span><em
                                            class="dd-indc icon ni ni-chevron-right"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr link-items">
                                            <li wire:click="setStatus('completed')"><span>{{ __('admin.completed') }}</span></li>
                                            <li wire:click="setStatus('pending')"><span>{{ __('admin.pending') }}</span></li>
                                            <li wire:click="setStatus('confirmed')"><span>{{ __('admin.confirmed') }}</span></li>
                                            <li wire:click="setStatus('unconfirmed')"><span>{{ __('admin.unconfirmed') }}</span></li>
                                            <li wire:click="setStatus('paid')"><span>{{ __('admin.paid') }}</span></li>
                                            <li wire:click="setStatus('unpaid')"><span>{{ __('admin.unpaid') }}</span></li>
                                            <li wire:click="setStatus('all')"><span>{{ __('admin.all') }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->

        </div>

    </div>


    <div class="card card-bordered card-preview">
        <div class="card-inner">


                <div class="dataTables_wrapper dt-bootstrap4 no-footer mt-4">
                    <div class="d-flex">
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right">
                                <em class="icon ni ni-search"></em>
                            </div>
                            <input wire:model.live="search" type="text" class="form-control" id="default-04" placeholder="Booking search">
                        </div>
                    </div>
                    <div class="table-responsive my-3">
                        <table class="nowrap table-condensed table-bordered table-striped table">
                            <thead>
                            <tr>
                                <th>{{ __('admin.sn') }}</th>

                                <th>{{ __('admin.service_area') }}</th>
                                <th>{{ __('admin.car') }}</th>
                                <th>{{ __('admin.booking_no') }}</th>
                                <th>{{ __('admin.reference') }}</th>
                                <th>{{ __('admin.confirmation') }}</th>
                                <th>{{ __('admin.booking_date') }}</th>
                                <th>{{ __('admin.period') }}</th>
                                <th>{{ __('admin.customer_name') }}</th>

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
                                    <td><a wire:navigate href="{{ route('admin.bookings.show', $item->id) }}">
                                            {{ $item->booking_number }}</a>
                                    </td>
                                    <td>{{ $item->reference }}</td>
                                    <td>
                                        @if($item->is_confirmed)
                                            <span class="badge bg-success rounded-pill">Yes</span>
                                        @else
                                            <span class="badge bg-danger rounded-pill">No</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>{{ $item->days }} {{ __('admin.booking_days') }}</td>
                                    <td>
                                        @if($item?->customer)
                                             {{ $item?->customer?->name }}
{{--                                            <a wire:navigate href="{{ route('admin.user.show',$item?->customer?->id) }}?booking"> {{ $item?->customer?->name }} </a>--}}
                                        @else
                                            {{ "not found" }}
                                        @endif
                                    </td>

                                    {{--    <td></td>--}}
                                    <td>
                                        @if($item->cancelled)
                                            <span class="badge bg-danger rounded-pill">cancelled</span>
                                        @elseif($item->status == 'completed')
                                            <span class="badge bg-success rounded-pill">completed</span>
                                        @else

                                            <span class="badge bg-warning rounded-pill">{{ $item->status }}</span>
                                        @endif
                                        </td>

                                    <td>{{ amt($item->grand_total) }}</td>
                                    <td>{{ $item->payment_status }}</td>
                                    <td>{{ $item->payment_method }}</td>
                                    {{--    <td></td>--}}
                                    {{--    <td></td>--}}


                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                        @if(count($bookings) < 1)
                            <h6 class="text-center mt-5">{{ __('admin.no_booking_history') }}</h6>
                        @endif

                        <div class="d-flex mt-2">
                            {!! $bookings->links() !!}
                        </div>

                    </div>
                </div>
        </div>
    </div>
</div>
