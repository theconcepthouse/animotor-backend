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
                                        <h4 class="nk-block-title text-capitalize">{{ $title }}</h4>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li class="nk-block-tools-opt d-none d-sm-block">
                                                        <a class="btn btn-primary" href="{{ route('admin.user.create') }}?role=driver"><em class="icon ni ni-plus"></em><span>Add new driver</span></a>
                                                    </li>
                                                    <li class="nk-block-tools-opt d-block d-sm-none">
                                                        <a class="btn btn-icon btn-primary" href="{{ route('admin.user.create') }}?role=driver"><em class="icon ni ni-plus"></em></a>
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
                                                    <th>S/N</th>
                                                    <th>Service area</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Car Type</th>
                                                    <th>Document </th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($drivers as $item)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $item?->region?->name ?? 'Not set' }}</td>
                                                        <td>{{ $item?->name }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->phone }}</td>
                                                        <td>{{ $item?->car?->type }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.driver.documents', ['id' => $item->id]) }}" class="btn btn-outline-primary">
                                                                <i class="icon ni ni-book"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            @if($item->status == 'approved')
                                                                <span class="badge badge-dim bg-success">Approved</span>
                                                            @else
                                                                <span class="badge badge-dim bg-danger">{{ $item->status }}</span>
                                                            @endif
                                                        </td>


                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{ route('admin.user.edit', $item->id) }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1"><em class="icon ni ni-edit"></em></a>

                                                                    <a href="{{ route('admin.user.show', $item->id) }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1"><em class="icon ni ni-eye"></em></a>
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
