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
                                        <h4 class="nk-block-title">Doctors</h4>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li class="nk-block-tools-opt d-none d-sm-block">
                                                        <a class="btn btn-primary" href="{{ route('admin.doctor.create') }}"><em class="icon ni ni-plus"></em><span>Add New Record</span></a>
                                                    </li>
                                                    <li class="nk-block-tools-opt d-block d-sm-none">
                                                        <a class="btn btn-icon btn-primary" href="{{ route('admin.doctor.create') }}"><em class="icon ni ni-plus"></em></a>
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
                                        <div class="datatable-wrap- my-3">
                                            <table class="datatable-init-export nowrap table" data-export-title="Export">
                                            <thead>
                                            <tr>
                                                <th>Full name</th>
                                                <th>Mobile contact</th>
                                                <th>Email Address</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($doctors as $item)
                                                    <tr>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->phone }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->is_audiologist ? 'Audiologist' : $item->category }}</td>
                                                        <td>{{ $item->status }}</td>

                                                        <td>
                                                            <ul class="nk-tb-actions gx-1">
                                                                <li>
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li><a href="{{ route('admin.doctor.show', $item->id) }}"><em class="icon ni ni-eye"></em><span>View Profile</span></a></li>
                                                                                <li><a  href="{{ route('admin.doctor.edit', $item->id) }}"><em class="icon ni ni-edit"></em><span>Edit Doctor</span></a></li>
                                                                                @if(auth()->user()->hasRole(['admin|superadmin|accountant']))
                                                                                <li><a href="{{ route('admin.doctor.edit', $item->id) }}?payment"><em class="icon ni ni-check-round-cut"></em><span>Payment Categories</span></a></li>
                                                                                @endif
{{--                                                                                <li><a href="{{ route('admin.doctor.edit', $item->id) }}?payment"><em class="icon ni ni-notes"></em><span>Generate invoice</span></a></li>--}}
                                                                                <li><a href="{{ route('admin.doctor.toggle_status', $item->id) }}"><em class="icon ni ni-check-round-cut"></em><span>{{ $item->status == 'active' ? 'Disable' : 'Activate' }}</span></a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
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
