@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block">
                        <div class="nk-block nk-block-lg" wire:poll.50s>


                            <div class="nk-block-head">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title text-capitalize">Reported Incidents</h4>
                                    </div>


                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">

{{--                                                    <li  wire:ignore  class="nk-block-tools-opt d-none d-sm-block">--}}
{{--                                                        <a class="btn btn-outline-primary" wire:navigate href="{{ route('admin.create.customer') }}"><em class="icon ni ni-plus"></em><span>Registration</span></a>--}}
{{--                                                    </li>--}}

{{--                                                    <li  wire:ignore class="nk-block-tools-opt d-block d-sm-none">--}}
{{--                                                        <a  class="btn btn-icon btn-primary" href="{{ route('admin.create.customer') }}"><em class="icon ni ni-plus"></em></a>--}}
{{--                                                    </li>--}}

                                                    <li  wire:ignore  class="nk-block-tools-opt d-none d-sm-block">
                                                        <a class="btn btn-primary" wire:navigate href="{{ route('admin.addClaim') }}"><em class="icon ni ni-plus"></em><span>New Claim</span></a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div><!-- .toggle-wrap -->
                                    </div><!-- .nk-block-head-content -->

                                </div>

                            </div>

                            <div class="card card-bordered card-preview">
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <div class="card-inner">

                                    <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="datatable-wrap my-3">
                                            <table class="datatable-init-export nowrap table dataTable no-footer dtr-inline" data-export-title="Export" id="DataTables_Table_2" aria-describedby="DataTables_Table_2_info">
                                                <thead>
                                                    <tr>
                                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">S/N</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >VRN</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Full Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Type</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Claim Reference</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Date Of Incident</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Status</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Action</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($reports as $value => $item)
                                                    <tr class="odd">
                                                        <td>{{ $value +1 }}</td>
                                                        <td><a href="#" class="btn btn-warning btn-sm">{{ $item->registration_number }}</a></td>
                                                        <td>{{ $item->first_name." ".$item->last_name }}</td>
                                                        <td>{{ $item->damage_type }}</td>
                                                        <td>{{ $item->reference_no }}</td>
                                                        <td>{{ $item->accident_date." ".$item->accident_time }}</td>
                                                        <td>
                                                             <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modalDefault">
                                                                 {!! $item->status() !!}<em class="ni ni-edit-alt"></em> </button>
                                                             <div class="modal fade" tabindex="-1" id="modalDefault">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Update Claim Status</h5>
                                                                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                <em class="icon ni ni-cross"></em>
                                                                            </a>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{ route('admin.updateClaimStatus', $item->id) }}" method="POST">
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <label for="first_name" class="form-label">Claim Status</label>
                                                                                        <select name="status" class="form-control">
                                                                                            <option disabled selected>Select Status</option>
                                                                                            <option value="notification">Notification</option>
                                                                                            <option value="claim-form">Claim Form</option>
                                                                                            <option value="doc-pci">Doc & PCI</option>
                                                                                            <option value="live">Live</option>
                                                                                            <option value="settled">Settled</option>
                                                                                            <option value="pending">Pending</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="first_name" class="form-label">Type of Damage</label>
                                                                                        <select name="damage_type" id="" class="form-control">
                                                                                             <option disabled selected>Select Type</option>
                                                                                            <option value="Faulty">Faulty</option>
                                                                                            <option value="Not Faulty">Not Faulty</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-12 mt-3">
                                                                                        <button class="btn btn-primary" type="submit">Submit</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer bg-light">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td >
                                                            <div class="d-flex">
                                                                <a wire:navigate href="{{ route('admin.editClaim', $item->id) }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1"><em class="icon ni ni-edit"></em></a>

                                                                <a wire:navigate href="{{ route('admin.editClaim', $item->id) }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1"><em class="icon ni ni-eye"></em></a>

                                                                <form method="POST" action="{{ route('admin.workshop.destroy', $item->id) }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
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

                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>


@endsection
