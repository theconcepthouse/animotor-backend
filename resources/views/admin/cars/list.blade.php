@extends('admin.layout.app')
@section('content')

    @php
        $carsWithoutRegion = $data->where('region_id', null);
        $carsWithoutRegionCount = $carsWithoutRegion->count();
    @endphp

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block">
                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">{{ $title }} </h4>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li class="nk-block-tools-opt d-none d-sm-block">
                                                        <a class="btn btn-primary" wire:navigate href="{{ route('admin.cars.create') }}"><em class="icon ni ni-plus"></em><span>{{ __('admin.add_new') }}</span></a>
                                                    </li>
                                                    <li class="nk-block-tools-opt d-block d-sm-none">
                                                        <a class="btn btn-icon btn-primary" wire:navigate data-bs-toggle="modal" href="{{ route('admin.cars.create') }}"><em class="icon ni ni-plus"></em></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .toggle-wrap -->
                                    </div><!-- .nk-block-head-content -->

                                </div>

                            </div>

                            <div class="alert alert-danger alert-icon alert-dismissible">
                                <em class="icon ni ni-cross-circle"></em> <strong>{{ __('admin.notice') }}</strong>! {{ $carsWithoutRegionCount }} {{ __('admin.car_without_service_area_message') }}. <button class="close" data-bs-dismiss="alert"></button>
                            </div>
                            <div class="card card-bordered card-preview">

                                <div class="card-inner">
                                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="datatable-wrap- my-3">
                                            <table class="datatable-init nowrap table" data-export-title="{{ __('admin.export_title') }}">
                                                <thead>
                                                <tr>
                                                    <th>{{ __('admin.sn') }}</th>
                                                    <th>{{ __('admin.service_area') }}</th>
                                                    <th>{{ __('admin.title') }}</th>
                                                    <th>{{ __('admin.make') }}</th>
                                                    <th>{{ __('admin.is_available') }}</th>
                                                    <th>{{ __('admin.model') }}</th>
                                                    <th>{{ __('admin.extras') }}</th>
                                                    <th>{{ __('admin.type') }}</th>
                                                    <th>{{ __('admin.vehicle_no') }}</th>
                                                    <th>{{ __('admin.year') }}</th>
                                                    <th>{{ __('admin.action') }}</th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($data as $item)
                                                    <tr>
                                                        <td>{{ $loop->index+1 }}</td>
                                                        <td>{{ $item?->region?->name ?? "Not set" }}</td>
                                                        <td>{{ $item->title }}</td>
                                                        <td>{{ $item->make }}</td>
                                                        <td>
                                                            @include('admin.components.toggle-switch', ['model' => "Car", 'item' => $item, 'checked' => $item->is_available, 'field' => 'is_available'])

                                                        </td>
                                                        <td>{{ $item->model }}</td>
                                                        <td><a wire:navigate href="{{ route('admin.car.extras',['id' => $item->id]) }}">{{ count($item->extras) }} view</a></td>
                                                        <td>{{ $item->type }}</td>
                                                        <td>{{ $item->vehicle_no }}</td>
                                                        <td>{{ $item->year }}</td>


                                                        <td>

                                                            <a class="btn btn-warning btn-sm rounded" wire:navigate href="{{ route('admin.cars.edit',$item->id) }}"><em class="icon ni ni-edit"></em><span>{{ __('admin.edit_item') }}</span></a>

                                                        </td>

                                                    </tr>
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
