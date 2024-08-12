@extends('admin.layout.app')
@section('content')


    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block">


                        <div class="nk-block nk-block-lg" wire:poll.30s>


                            <div class="nk-block-head">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                        {{--                <h4 class="nk-block-title text-capitalize">{{  __('admin.'.$role) }} {{ __('admin.listing') }} [{{ $status }}]</h4>--}}
                                    </div>


                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li  wire:ignore  class="nk-block-tools-opt d-none d-sm-block">
                                                        <a class="btn btn-primary" wire:navigate href="{{ route('admin.vehicle.create') }}"><em class="icon ni ni-plus"></em><span>Add Vehicle</span></a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div><!-- .toggle-wrap -->
                                    </div><!-- .nk-block-head-content -->

                                </div>

                            </div>

                            <div class="card card-bordered card-preview">

                                <div class="card-inner">
                                    <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="datatable-wrap my-3">
                                            <table class="datatable-init-export nowrap table dataTable no-footer dtr-inline" data-export-title="Export" id="DataTables_Table_2" aria-describedby="DataTables_Table_2_info">
                                                <thead>
                                                    <tr>
                                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">S/N</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >VRM</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Make</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Model</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Status</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Action</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($vehicles as $value => $item)
                                                    <tr class="odd">
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td><a href="#" class="btn btn-warning btn-sm">{{ $item->vehicle_details['registration_number'] ?? 'N/A' }}</a></td>
                                                        <td>{{ $item->vehicle_details['make'] ?? '' }}</td>
                                                        <td>{{ $item->vehicle_details['model'] ?? '' }}</td>
                                                        <td>{!! $item->status() !!}</td>
                                                        <td >
                                                            <div class="d-flex">
                                                                <a wire:navigate href="{{ route('admin.vehicle.edit', ['vehicleId' => $item->id]) }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1"><em class="icon ni ni-edit"></em></a>

                                                                <a wire:navigate href="{{ route('admin.vehicle.edit', $item->id) }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1"><em class="icon ni ni-eye"></em></a>

                                                                <form method="POST" action="{{ route('admin.vehicle.destroy', $item->id) }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1">
                                                                        <em class="icon ni ni-trash"></em>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @endforeach


                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>



@endsection
