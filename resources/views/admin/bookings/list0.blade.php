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
                                        <h4 class="nk-block-title text-capitalize-">{{ __('admin.booking_title') }}</h4>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-bs-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-filter-alt"></em><span>{{ __('admin.filtered_by') }}</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><span>{{ __('admin.completed') }}</span></a></li>
                                                                    <li><a href="#"><span>{{ __('admin.pending') }}</span></a></li>
                                                                    <li><a href="#"><span>{{ __('admin.scheduled') }}</span></a></li>
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
                                            <table class="datatable-init nowrap table" data-export-title="{{ __('admin.export_title') }}">
                                                <thead>

                                                <tr>
                                                    <th>{{ __('admin.sn') }}</th>
                                                    <th>{{ __('admin.view') }}</th>
                                                    <th>{{ __('admin.service_area') }}</th>
                                                    <th>{{ __('admin.booking_no') }}</th>
                                                    <th>{{ __('admin.reference') }}</th>
                                                    <th>{{ __('admin.pickup_date') }}</th>
                                                    <th>{{ __('admin.period') }}</th>
                                                    <th>{{ __('admin.customer_name') }}</th>
                                                    <th>{{ __('admin.booking_status') }}</th>
                                                    <th>{{ __('admin.payment_status') }}</th>
                                                    <th>{{ __('admin.payment_method') }}</th>
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
