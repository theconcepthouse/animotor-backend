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
                                        <h4 class="nk-block-title">{{ $title }}</h4>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li class="nk-block-tools-opt d-none d-sm-block">
                                                        <a class="btn btn-primary" data-bs-toggle="modal" href="#addNew"><em class="icon ni ni-plus"></em><span>Add New</span></a>
                                                    </li>
                                                    <li class="nk-block-tools-opt d-block d-sm-none">
                                                        <a class="btn btn-icon btn-primary"  data-bs-toggle="modal" href="#addNew"><em class="icon ni ni-plus"></em></a>
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
                                                    <th>Title</th>
                                                    <th>Path</th>
                                                    <th>Action</th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($data as $item)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $item->title }}</td>
                                                        <td>{{ $item->path }}</td>


                                                        <td>
                                                            <a href="{{ route('admin.setting.page.builder', $item->id) }}" class="btn btn-warning">Page builder</a>
                                                            <a href="{{ route('page.show', $item->path) }}" class="btn btn-success">Preview</a>
                                                            @if($item->path != '/')
                                                            <a href="#" class="btn btn-success">Delete</a>
                                                            @endif
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



    <div class="modal fade" role="dialog" id="addNew">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title">Add New Complain</h5>

                    <form action="{{ route('admin.cancellation_reasons.store') }}" method="POST" enctype="multipart/form-data">
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


                        <div class="row gy-4 pt-4">

                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'reason','title' => 'Cancellation Reason'])


                            @include('admin.partials.form.select', ['attributes' => 'required' ,'colSize' => 'col-md-6', 'fieldName' => 'user_type', 'title' => 'User type','options' => '
    <option value="driver">Driver</option>
    <option value="user">User</option>
'])

                            @include('admin.partials.form.select', ['attributes' => 'required' ,'colSize' => 'col-md-6', 'fieldName' => 'is_active', 'title' => 'Status','options' => '
    <option value="1">Active</option>
    <option value="0">Disabled</option>
'])
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-lg btn-primary">Save </button>
                        </div>
                    </form>


                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->

    @foreach($data as $item)
        <div class="modal fade" role="dialog" id="update{{ $item->id }}">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                    <div class="modal-body modal-body-md">
                        <h5 class="title">Editing {{ $item->name }}</h5>

                        <form action="{{ route('admin.cancellation_reasons.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
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


                                @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'reason', 'value' => $item->reason, 'title' => 'Cancellation Reason'])


                                @include('admin.partials.form.select', ['attributes' => 'required' ,'colSize' => 'col-md-6', 'fieldName' => 'user_type', 'title' => 'User type','options' => '
        <option value="driver">Driver</option>
        <option value="user">User</option>
    '])

                                @include('admin.partials.form.select', ['attributes' => 'required' ,'colSize' => 'col-md-6', 'fieldName' => 'is_active', 'title' => 'Status','options' => '
        <option value="1">Active</option>
        <option value="0">Disabled</option>
    '])

                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-lg btn-primary">Update </button>
                            </div>
                        </form>


                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div><!-- .modal -->
    @endforeach

@endsection