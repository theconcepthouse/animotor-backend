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
                                                        <a class="btn btn-primary" wire:navigate href="{{ route('admin.addDriver') }}"><em class="icon ni ni-user-add"></em><span>Add Vehicle</span></a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div><!-- .toggle-wrap -->
                                    </div><!-- .nk-block-head-content -->

                                </div>

                            </div>

                            <div class="card card-bordered card-preview">

                                <div class="card-inner">
                                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="d-flex">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-search"></em>
                                                </div>
                                                <input wire:model.live="search" type="text" class="form-control" id="default-04" placeholder="Start typing to search">
                                            </div>

                                        </div>


                                        <div class="datatable-wrap- table-responsive my-3">

                                            <table class="datatable-init- table-bordered nowrap table" data-export-title="{{ __('admin.export_title') }}">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" wire:model.live="selectAll"></th>
                                                        <th>{{ __('admin.sn') }}</th>
                                                        <th>VRM</th>
                                                        <th>Make</th>
                                                        <th>Model</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($vehicles as $item)
                                                    <tr wire:key="item.id">
                                                        <td><input type="checkbox" wire:model.live="selected_items" value="{{ $item->id }}"></td>

                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $item->vrm }}</td>
                                                        <td>{{ $item->make }}</td>
                                                        <td>{{ $item->model }}</td>
                                                        <td>{{ $item->status }}</td>
                                                        <td >
                                                            <div class="d-flex">
                                                                <a wire:navigate href="{{ route('admin.user.edit', $item->id) }}?back_url={{ $current_uri }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1"><em class="icon ni ni-edit"></em></a>

                                                                <a wire:navigate href="{{ route('admin.form.index', $item->id) }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1"><em class="icon ni ni-eye"></em></a>
                                                                <a wire:navigate href="{{ route('admin.driver.documents', ['id' => $item->id]) }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1"><em class="icon ni ni-file"></em></a>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                            <div class="d-flex mt-2">
                                                {!! $vehicles->links() !!}
                                            </div>


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
