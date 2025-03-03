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
                                        <h4 class="nk-block-title">Vehicle Mileage</h4>
                                    </div>


                                </div>

                            </div>

                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="datatable-wrap- my-3">
                                            <table class="datatable-init nowrap table" data-export-title="Export">
                                                <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Booking No</th>
                                                    <th>Reported By</th>
                                                    <th>Inspection Mileage</th>
                                                    <th>Inspection Date</th>
                                                    <th>Last Inspection Mileage</th>
                                                    <th>Last Inspection Date</th>
                                                    <th>Last Service Mileage</th>
                                                    <th>Last Service Date</th>
                                                    <th>Image</th>
                                                    <th>Status</th>
                                                    <th>Reported on</th>
{{--                                                    <th>Action</th>--}}
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($data as $item)

                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td><a wire:navigate href="{{ route('admin.bookings.show', $item?->booking?->id) }}"> {{ $item?->booking?->booking_number }}</a></td>
                                                        <td>
                                                           {{  $item?->booking?->customer->fullname() }}
                                                        </td>
                                                        <td>{{ $item->inspections['inspection_mileage'] ?? ''}}</td>

                                                        <td>{{ $item->inspections['inspection_date'] ?? ''}}</td>
                                                        <td>{{ $item->inspections['last_inspection_mileage'] ?? ''}}</td>
                                                        <td>{{ $item->inspections['last_inspection_date'] ?? ''}}</td>
                                                        <td>{{ $item->inspections['last_service_mileage'] ?? ''}}</td>
                                                        <td>{{ $item->inspections['last_service_date'] ?? ''}}</td>
                                                        <td><img height="50" width="50" src="{{ asset($item->inspections['your_adometer_or_mileage_picture']) ?? '' }}" alt="">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalDefault-{{ $item->id }}"><em class="icon ni ni-eye"></em></a>
                                                        </td>
                                                        <td><span class="badge badge-dim bg-warning"> {{ $item->status }}</span></td>

                                                        <td>{{ $item?->created_at->format('d-m-Y') }}</td>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @foreach($data as $item)
                                            <div class="modal fade" tabindex="-1" id="modalDefault-{{ $item->id }}"  role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Mileage Image</h5>
                                                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset($item->inspections['your_adometer_or_mileage_picture']) ?? '' }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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
