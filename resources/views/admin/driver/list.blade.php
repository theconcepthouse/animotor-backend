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
                                                    <th>Status</th>
                                                    <th>Car Type</th>
                                                    <th>Document </th>
                                                    <th>Verification </th>
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
                                                        <td>
                                                            <a data-bs-toggle="modal" href="#update{{ $item->id }}">
                                                                @if($item->status == 'approved')
                                                                    <span class="badge badge-dim bg-success">Approved</span>
                                                                @else
                                                                    <span class="badge badge-dim bg-danger">{{ $item->status }}</span>
                                                                @endif
                                                            </a>
                                                        </td>
                                                        <td>{{ $item?->car?->type }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.driver.documents', ['id' => $item->id]) }}" class="btn btn-outline-primary">
                                                                <i class="icon ni ni-book"></i>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <a href="{{ route('admin.driver.documents', ['id' => $item->id]) }}">
                                                                @if($item->unapproved_documents < 1)
                                                                    <span class="badge badge-dim bg-success">Approved</span>
                                                                @else
                                                                    <span class="badge badge-dim bg-danger">{{$item->unapproved_documents }} pending</span>
                                                                @endif
                                                            </a>
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

@foreach($drivers as $item)
<div class="modal fade" role="dialog" id="update{{ $item->id }}">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title">Update status</h5>
                <form action="{{ route('admin.user.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row gy-4 pt-4">


                        <input name="id" value="{{ $item->id }}" type="hidden">

                        @include('admin.partials.form.select_array', ['attributes' => 'required', 'id' => $item->id,'colSize' => 'col-md-12', 'fieldName' => 'status','value' => $item->status, 'title' => 'Status','options' => ['unapproved','pending','blocked','approved']])

                        @include('admin.partials.form.textarea', [ 'colSize' => 'col-md-12',  'fieldName' => 'comment','value' => $item?->comment, 'title' => 'Comment / Message'])

                    </div>





                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-lg btn-primary">Update </button>
                    </div>
                </form>


            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div>
@endforeach
