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
                                            <table class="datatable-init nowrap table" data-export-title="Export">
                                                <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name</th>
                                                    <th>Icon</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($data as $item)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>
                                                            @if($item->icon)
                                                                <img src="{{ $item->icon }}" height="30" />
                                                            @else
                                                                -
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @include('admin.components.toggle-switch', ['model' => "VehicleType", 'item' => $item, 'checked' => $item->is_active, 'field' => 'is_active'])

                                                        </td>

                                                        <td>

                                                            <a class="btn btn-warning btn-sm rounded" data-bs-toggle="modal" href="#update{{ $item->id }}"><em class="icon ni ni-edit"></em>
                                                                <span>Edit</span></a>

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
                    <h5 class="title">Add new type</h5>

                    <form action="{{ route('admin.vehicle_types.store') }}" method="POST" enctype="multipart/form-data">
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

                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-12', 'fieldName' => 'name','title' => 'Vehicle type name'])

                            @include('admin.partials.image-upload',['field' => 'icon','id' => 'icon_file', 'title' => 'Icon'])


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

                        <form action="{{ route('admin.vehicle_types.update', $item->id) }}" method="POST" enctype="multipart/form-data">
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

                                @include('admin.partials.form.text', ['attributes' => 'required', 'value' => $item->name,  'colSize' => 'col-md-12', 'fieldName' => 'name','title' => 'Vehicle type name'])

                                @include('admin.partials.image-upload',['field' => 'icon','id' => 'file_'.$item->id, 'image' => $item->icon, 'title' => 'Icon'])


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


@section('js')



@endsection
