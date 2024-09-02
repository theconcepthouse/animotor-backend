@extends('admin.layout.app')
@section('content')


    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block">

{{--                            <livewire:admin.user.index :current_uri="url()->current()" role="driver" />--}}

                        <div class="nk-block nk-block-lg" wire:poll.30s>


                            <div class="nk-block-head">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4>All Drivers</h4>
                                    </div>


                                    <div class="nk-block-head-content">
                                    <div class="toggle-wrap nk-block-tools-toggle">
                                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                        <div class="toggle-expand-content" data-content="pageMenu">
                                            <ul class="nk-block-tools g-3">


                                                <li  wire:ignore  class="nk-block-tools-opt d-none d-sm-block">
                                                    <a class="btn btn-outline-primary" wire:navigate href="{{ route('admin.create.customer') }}"><em class="icon ni ni-plus"></em><span>Registration</span></a>
                                                </li>

                                                <li  wire:ignore class="nk-block-tools-opt d-block d-sm-none">
                                                    <a  class="btn btn-icon btn-primary" href="{{ route('admin.create.customer') }}"><em class="icon ni ni-plus"></em></a>
                                                </li>


                                                 <li  wire:ignore  class="nk-block-tools-opt d-none d-sm-block">
                                                    <a class="btn btn-outline-secondary" wire:navigate href="{{ route('admin.createOnBoarding') }}"><em class="icon ni ni-file-check"></em><span>Self Onboarding</span></a>
                                                </li>
                                                <li  wire:ignore  class="nk-block-tools-opt d-none d-sm-block">
                                                    <a class="btn btn-primary" wire:navigate href="{{ route('admin.addDriver') }}"><em class="icon ni ni-user-add"></em><span>Add Drivers</span></a>
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
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Full Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Phone</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Email</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Status</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Created At</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Action</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($drivers as $value => $item)
                                                    <tr class="odd">
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $item->fullname() ?? '' }}</td>
                                                        <td>{{ $item->phone ?? '' }}</td>
                                                        <td>{{ $item->email ?? '' }}</td>
                                                        <td>
                                                             <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modalDefault-{{ $item?->id }}">{!! $item->status() !!}</button>

                                                        </td>
                                                        <td>{{ date('d M, Y', strtotime($item->created_at))}}</td>
                                                        <td >
                                                            <div class="d-flex">
                                                                <a wire:navigate href="{{ route('admin.user.edit', $item->id) }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1"><em class="icon ni ni-edit"></em></a>

                                                                <a wire:navigate href="{{ route('admin.driverForm', $item->id) }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1"><em class="icon ni ni-eye"></em></a>

                                                                <form method="POST" action="{{ route('admin.deleteDriver', $item->id) }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1">
                                                                        <em class="icon ni ni-trash"></em>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <div class="modal fade" tabindex="-1" id="modalDefault-{{ $item?->id }}"  aria-modal="true" role="dialog">
                                                         <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title">Update Vehicle Status</h5>
                                                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{ route('admin.vehicleStatus') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="vehicle_id" value="{{ $item?->id }}">
                                                            <div class="row">
                                                                <div class="col-lg-10">
                                                                    <select name="status" class="form-control" >
                                                                        <option selected disabled>Select Status</option>
                                                                        <option value="unapproved">Unapproved</option>
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
