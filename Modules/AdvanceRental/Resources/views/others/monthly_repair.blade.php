@extends('admin.layout.app')
@section('content')

    <style>
        .nk-sidebar{
            display: none;
        }
        .nk-header {
            display: none;
        }
    </style>

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
                                     <a href="{{ route('booking.view', $booking->id) }}" wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                    <a href="{{ route('booking.view', $booking->id) }}" wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>

                                </div>
                            </div>
                            <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">

                                             <form action="{{ route('storeMonthlyMaintenance') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                 @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif

                                                <input type="hidden" name="car_id" value="{{ $booking->car_id }}">
                                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                                <input type="hidden" name="id" value="{{ $monthly_main->id ?? '' }}">



                                                <div class="container mt-4">
{{--                                                    <div class="mb-4">--}}
{{--                                                        <h4 class="title nk-block-title">Monthly Maintenance</h4>--}}
{{--                                                    </div>--}}

                                                   <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="inspection_mileage">Inspection mileage</label>
                                                        <input type="text" class="form-control" id="inspection_mileage"
                                                               name="inspection[inspection_mileage]" value="{{ old('inspection.inspection_mileage', $monthly_main->inspection['inspection_mileage'] ?? '') }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inspection_date">Inspection date</label>
                                                        <input type="date" class="form-control" id="inspection_date"
                                                               name="inspection[inspection_date]" value="{{ old('inspection.inspection_date', $monthly_main->inspection['inspection_date'] ?? '') }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="last_inspection_mileage">Last inspection mileage</label>
                                                        <input type="text" class="form-control" id="last_inspection_mileage"
                                                               name="inspection[last_inspection_mileage]" value="{{ old('inspection.last_inspection_mileage', $monthly_main->inspection['last_inspection_mileage'] ?? '') }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="last_inspection_date">Last inspection date</label>
                                                        <input type="date" class="form-control" id="last_inspection_date"
                                                               name="inspection[last_inspection_date]" value="{{ old('inspection.last_inspection_date', $monthly_main->inspection['last_inspection_date'] ?? '') }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="last_service_mileage">Last service mileage</label>
                                                        <input type="text" class="form-control" id="last_service_mileage"
                                                               name="inspection[last_service_mileage]" value="{{ old('inspection.last_service_mileage', $monthly_main->inspection['last_service_mileage'] ?? '') }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="last_service_date">Last service date</label>
                                                        <input type="date" class="form-control" id="last_service_date"
                                                               name="inspection[last_service_date]" value="{{ old('inspection.last_service_date', $monthly_main->inspection['last_service_date'] ?? '') }}">
                                                    </div>
                                                    <div class="col-md-5 col-sm-6">
                                                        @include('admin.partials.image-upload', [
                                                            'field' => 'inspection[odometer_picture]',
                                                            'image' => $monthly_main->inspection['odometer_picture'] ?? '',
                                                            'id' => 'file' . Str::uuid(),
                                                            'title' => 'Odometer picture',
                                                            'colSize' => 'col-md-10 col-sm-6',
                                                        ])
                                                    </div>
                                                </div>

                                                    <div class="form-group text-center mt-3">
                                                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                             </form>
                                                 <br>
                                                 <hr>

                                                <div class="container mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Issues/Repairs Information</h4>
                                                    </div>
{{--                                                    <a href="" class="btn btn-primary">Add Repair</a>--}}
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalDefault">Add Repair</button>

                                                    <table class="table">
                                                        <tr>
                                                            <th>Repair Date</th>
                                                            <th>Garage Name</th>
                                                            <th>Cost</th>
                                                            <th>Mileage at time of repair</th>
                                                            <th>Garage/Work details</th>
                                                        </tr>
                                                        @foreach($data as $item)
                                                            <tr>
                                                                <td>{{ $item->repairs['repair_date'] ?? '' }}</td>
                                                                <td>{{ $item->repairs['garage_name'] ?? ''}}</td>
                                                                <td>${{ $item->repairs['cost'] ?? ''}}</td>
                                                                <td>{{ $item->repairs['mileage_at_repair'] ?? ''}}</td>
                                                                <td>{{ $item->repairs['garage_details'] ?? '' }}</td>
                                                            </tr>
                                                        @endforeach

                                                    </table>
                                                    <!-- Modal Trigger Code -->

                                                    <!-- Modal Content Code -->
                                                    <div class="modal fade" tabindex="-1" id="modalDefault">
                                                        <div class="modal-dialog modal-dialog-top modal-body-" role="document">
                                                            <div class="modal-content">
                                                                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <em class="icon ni ni-cross"></em>
                                                                </a>
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Add Issue/Repair Details</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('storeMonthlyRepair') }}" method="POST">
                                                                        @csrf

                                                                        <input type="hidden" name="monthly_maintenaces_id" value="{{ $monthly_main->id }}">

                                                                        <div class="row">
                                                                        <div class="form-group  col-md-6 ">
                                                                            <label for="repair_date">Repair date</label>
                                                                            <input type="date" class="form-control" id="repair_date"
                                                                                   name="repairs[repair_date]">
                                                                        </div>
                                                                        <div class="form-group  col-md-6">
                                                                            <label for="garage_name">Garage name</label>
                                                                            <input type="text" class="form-control" id="garage_name"
                                                                                   name="repairs[garage_name]">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="cost">Cost</label>
                                                                            <input type="text" class="form-control" id="cost"
                                                                                   name="repairs[cost]">
                                                                        </div>
                                                                      <div class="form-group col-md-6">
                                                                            <label for="cost">Mileage At time of Repair</label>
                                                                            <input type="text" class="form-control" id="cost"
                                                                                   name="repairs[mileage_at_repair]">
                                                                        </div>
                                                                        <div class="form-group col-lg-12 col-md-4">
                                                                            <label for="garage_details">Garage/Work details</label>
                                                                            <textarea class="form-control" id="garage_details"
                                                                                      name="repairs[garage_details]"
                                                                                      cols="10" rows="5"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group text-center mt-3">
                                                                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                                                    </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



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
