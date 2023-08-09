@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block">
                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title text-capitalize-">{{ __('admin.bookings.list.title') }}</h4>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-bs-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-filter-alt"></em><span>{{ __('admin.bookings.list.filtered_by') }}</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><span>{{ __('admin.bookings.list.completed') }}</span></a></li>
                                                                    <li><a href="#"><span>{{ __('admin.bookings.list.pending') }}</span></a></li>
                                                                    <li><a href="#"><span>{{ __('admin.bookings.list.scheduled') }}</span></a></li>
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
                                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="datatable-wrap- my-3">
                                            <table class="datatable-init-export nowrap table" data-export-title="{{ __('admin.bookings.list.export_title') }}">
                                                <thead>

                                                <tr>
                                                    <th>{{ __('admin.bookings.list.sn') }}</th>
                                                    <th>{{ __('admin.bookings.list.view') }}</th>
                                                    <th>{{ __('admin.bookings.list.service_area') }}</th>
                                                    <th>{{ __('admin.bookings.list.reference') }}</th>
                                                    <th>{{ __('admin.bookings.list.pickup_date') }}</th>
                                                    <th>{{ __('admin.bookings.list.period') }}</th>
                                                    <th>{{ __('admin.bookings.list.customer_name') }}</th>
                                                    <th>{{ __('admin.bookings.list.booking_status') }}</th>
                                                    <th>{{ __('admin.bookings.list.payment_status') }}</th>
                                                    <th>{{ __('admin.bookings.list.payment_method') }}</th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($data as $item)
                                                    @include('admin.partials.table.bookings-table', ['item' => $item])
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .card-preview -->
                        </div>

                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>


@endsection
