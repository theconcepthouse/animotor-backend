@extends('admin.layout.app')

@section('title', 'Permissions')

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
                                        <h4 class="nk-block-title">Permissions</h4>
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
                                            <table class="datatable-init- nowrap table">

                                            <thead>
                                    <tr>
                                        <th class="th">Id</th>
                                        <th class="th">Name/Code</th>
                                        <th class="th">Display Name</th>
                                        <th class="th">Description</th>
                                        <th class="th"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td class="td text-sm leading-5 text-gray-900">
                                                {{$permission->getKey()}}
                                            </td>
                                            <td class="td text-sm leading-5 text-gray-900">
                                                {{$permission->name}}
                                            </td>
                                            <td class="td text-sm leading-5 text-gray-900">
                                                {{$permission->display_name}}
                                            </td>
                                            <td class="td text-sm leading-5 text-gray-900">
                                                {{$permission->description}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                                <a data-bs-toggle="modal" href="#update{{ $permission->id }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                            </table>
                                        </div>
                                    </div>

                                    {!! $permissions->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" role="dialog" id="addNew">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="rental">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title">Add Permission</h5>

                    <form action="{{ route('admin.permission.store') }}" method="POST" enctype="multipart/form-data">
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

                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'name','title' => 'Name'])

                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'display_name','title' => 'Display Name'])

                            @include('admin.partials.form.textarea', [ 'colSize' => 'col-md-12', 'fieldName' => 'description','title' => 'Description'])

                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-lg btn-primary">Save </button>
                        </div>
                    </form>


                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->

    @foreach($permissions as $item)
        <div class="modal fade" role="dialog" id="update{{ $item->id }}">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="rental">
                <div class="modal-content">
                    <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                    <div class="modal-body modal-body-md">
                        <h5 class="title">Editing {{ $item->name }}</h5>

                        <form action="{{ route('admin.permission.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
{{--                            @method('PATCH')--}}
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

                                @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'value' => $item->name, 'fieldName' => 'name','title' => 'Name'])

                                @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'value' => $item->display_name, 'fieldName' => 'display_name','title' => 'Display Name'])

                                @include('admin.partials.form.textarea', [ 'colSize' => 'col-md-12', 'fieldName' => 'description', 'value' => $item->description, 'title' => 'Description'])

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
