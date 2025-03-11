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
                                    <h4 class="title nk-block-title">Monthly Maintenance Details</h4>
                                </div>
                                <div class="nk-block-head-content">
{{--                                   <a href="javascript:history.back()" class="btn">Go Back</a>--}}
                                    <a href="javascript:history.back()"
                                       class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                            class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                    <a href="javascript:history.back()"  class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>

                                </div>
                            </div>
                            <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Booking Number</th>
                                                    <td><a wire:navigate
                                                           href="{{ route('admin.bookings.show', $data?->booking?->id) }}">{{ $data?->booking?->booking_number }}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Car VRM</th>
                                                    <td>
                                                        <span class="badge bg-primary">{{ $data?->booking?->car?->registration_number }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Inspection Mileage</th>
                                                    <td>{{ $data->inspection['inspection_mileage'] ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Inspection Date</th>
                                                    <td>{{ $data->inspection['inspection_date'] ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Last Inspection Mileage</th>
                                                    <td>{{ $data->inspection['last_inspection_mileage'] ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Last Inspection Date</th>
                                                    <td>{{ $data->inspection['last_inspection_date'] ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Last Service Mileage</th>
                                                    <td>{{ $data->inspection['last_service_mileage'] ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Last Service Date</th>
                                                    <td>{{ $data->inspection['last_service_date'] ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Odometer Picture</th>
                                                    <td>
                                                        <img height="50" width="50"
                                                             src="{{ asset($data->inspection['odometer_picture']) }}"
                                                             alt="">
                                                        <a href="#" data-bs-toggle="modal"
                                                           data-bs-target="#modalDefault-{{ $data->id }}"><em
                                                                    class="icon ni ni-eye"></em></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>
                                                        <button type="button" class="btn" data-bs-toggle="modal"
                                                                data-bs-target="#modalDefaultStatus-{{ $data?->id }}">{!! $data?->status() !!}</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Created At</th>
                                                    <td>{{ $data?->created_at->format('d-M-Y') }}</td>
                                                </tr>
                                            </table>

                                            <br>
                                            <h4 class="mt-4 mb-2">Monthly Repairs History</h4>
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Created At</th>
                                                    <th>Repair Cost</th>
                                                    <th>Garage Name</th>
                                                    <th>Repair Date</th>
                                                    <th>Garage Details</th>
                                                    <th>Mileage at Repair</th>
                                                </tr>
                                                @foreach($repairs as $item)
                                                    <tr>
                                                        <td>{{ $item?->created_at->format('d-M-Y') }}</td>
                                                        <td>{{ $item->repairs['cost'] ?? '' }}</td>
                                                        <td>{{ $item->repairs['garage_name'] ?? '' }}</td>
                                                        <td>{{ $item->repairs['repair_date'] ?? '' }}</td>
                                                        <td>{{ $item->repairs['garage_details'] ?? '' }}</td>
                                                        <td>{{ $item->repairs['mileage_at_repair'] ?? '' }}</td>
                                                    </tr>
                                                @endforeach


                                            </table>


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

    <div class="modal fade" tabindex="-1" id="modalDefault-{{ $data->id }}" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Odometer Picture</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <img src="{{ asset($data->inspection['odometer_picture']) }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="modalDefaultStatus-{{ $data?->id }}" aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal Title</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.updateMMStatus', $data->id) }}" method="POST">
                        @csrf
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

@endsection
