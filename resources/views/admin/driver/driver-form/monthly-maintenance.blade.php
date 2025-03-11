@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md- mx-auto">

                        <div class="nk-block">

                            <div class="nk-block-between g-3">
                                <div class="nk-block-head-content mb-5">
                                    <h4 class="title nk-block-title">Monthly Maintenance</h4>
                                </div>
                                <div class="nk-block-head-content">
                                     <a href="{{ route('admin.driverForm', ['driverId' => $driver->id, 'formId' => $form->id]) }}" wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                    <a href="{{ route('admin.driverForm', ['driverId' => $driver->id, 'formId' => $form->id]) }}" wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>

                                </div>
                            </div>
                            <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">
                                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="datatable-wrap- my-3">
                                            <table class="datatable-init nowrap table" data-export-title="Export">
                                                <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Booking No</th>
                                                    <th>Inspection Mileage</th>
                                                    <th>Inspection Date</th>
                                                    <th>Last Inspection Mileage</th>
                                                    <th>Last Inspection Date</th>
                                                    <th>Last Service Mileage</th>
                                                    <th>Action</th>
                                                    <th>Last Service Date</th>
                                                    <th>Image</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                </tr>

                                                </thead>
                                                <tbody>

                                                @foreach($monthly_main as $item)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td><a  wire:navigate href="{{ route('admin.bookings.show', $item?->booking?->id) }}"> {{ $item?->booking?->booking_number }}</a></td>
                                                        <td>{{ $item->inspection['inspection_mileage'] ?? ''}}</td>
                                                        <td>{{ $item->inspection['inspection_date'] ?? ''}}</td>
                                                        <td>{{ $item->inspection['last_inspection_mileage'] ?? ''}}</td>
                                                        <td>{{ $item->inspection['last_inspection_date'] ?? ''}}</td>
                                                        <td>{{ $item->inspection['last_service_mileage'] ?? ''}}</td>
                                                        <td><a href="{{ route('admin.viewMonthlyRepairs', $item->id) }}" class="btn btn-sm btn-primary">
                                                                View </a></td>
                                                        <td>{{ $item->inspection['last_service_date'] ?? ''}}</td>
                                                        <td><img height="50" width="50" src="{{ asset($item->inspection['odometer_picture']) }}" alt="">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalDefault-{{ $item->id }}"><em class="icon ni ni-eye"></em></a>
                                                        </td>
                                                        <td>
                                                        <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#modalDefaultStatus-{{ $item?->id }}">{!! $item?->status() !!}</button>

                                                        </td>

                                                        <td>{{ $item?->created_at->format('d-M-Y') }}</td>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @foreach($monthly_main as $item)
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
                                                        <img src="{{ asset($item->inspection['odometer_picture']) }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                             <div class="modal fade" tabindex="-1" id="modalDefaultStatus-{{ $item?->id }}"  aria-modal="true" role="dialog">
                                                         <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title">Modal Title</h5>
                                                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{ route('admin.updateMMStatus', $item->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="mileageId" value="{{ $item?->id }}">
                                                            <div class="row">
                                                                <div class="col-lg-10">
                                                                    <select name="status" class="form-control" id="">
                                                                        <option selected disabled>Select Status</option>
                                                                        <option value="pending">Pending</option>
                                                                        <option value="approved">Approved</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-8 mt-3">
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                        @endforeach
                                    </div>
                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>

@endsection
