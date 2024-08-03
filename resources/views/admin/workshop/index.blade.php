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
                                        <h4 class="nk-block-title text-capitalize">Companies List</h4>
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
                                                        <a class="btn btn-primary" wire:navigate href="{{ route('admin.workshop.create') }}"><em class="icon ni ni-plus"></em><span>Add Company</span></a>
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
                                                    <th>S/N</th>
                                                    <th>Company</th>
                                                    <th>Branches</th>
                                                    <th>Contact Person</th>
                                                    <th>Documents</th>
                                                    <th>Date Of Incident</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($workshops as $value => $item)
                                                    <tr wire:key="item-{{ $item->id }}">
                                                        <td>{{ $value + 1 }}</td>
                                                        <td><a href="#" class="btn btn-success btn-sm">{{ $item->company_info['company_name'] ?? 'N/A' }}</a></td>
                                                        <td>
                                                            {{ $item->branches['branch_name'] ?? 'N/A' }}
                                                        </td>
                                                        <td>
                                                             {{ $item->contact_persons['first_name'] ?? 'N/A' }}
                                                             {{ $item->contact_persons['last_name'] ?? '' }}
                                                        </td>
                                                        <td>
                                                              {{ $item->document['document_type'] ?? 'N/A' }}
                                                        </td>
                                                        <td>{{ $item->date_of_incident ?? 'N/A' }}</td>
                                                        <td>{{ $item->status }}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a wire:navigate href="{{ route('admin.workshop.edit', $item->id) }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1">
                                                                    <em class="icon ni ni-edit"></em>
                                                                </a>
                                                                <a wire:navigate href="{{ route('admin.workshop.edit', $item->id) }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1">
                                                                    <em class="icon ni ni-eye"></em>
                                                                </a>
                                                                <a wire:navigate href="{{ route('admin.editClaim', $item->id) }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1">
                                                                    <em class="icon ni ni-file"></em>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>


                                            <div class="d-flex mt-2">
                                                {!! $workshops->links() !!}
                                            </div>


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
