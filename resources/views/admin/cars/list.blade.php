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
                                                        <a class="btn btn-primary" href="{{ route('admin.cars.create') }}"><em class="icon ni ni-plus"></em><span>Add New</span></a>
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
                                                    <th>Image</th>
                                                    <th>Title</th>
                                                    <th>Make</th>
                                                    <th>Is Available</th>
                                                    <th>Model</th>
                                                    <th>Type</th>
                                                    <th>Vehicle no</th>
                                                    <th>Year</th>
                                                    <th>Action</th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($data as $item)
                                                    <tr>
                                                        <td>
                                                            <img src="{{ $item->image }}" height="30" />
                                                        </td>
                                                        <td>{{ $item->title }}</td>
                                                        <td>{{ $item->make }}</td>
                                                        <td>
                                                            @if($item->is_available)
                                                                <span class="badge badge-dim bg-success">Yes</span>
                                                            @else
                                                                <span class="badge badge-dim bg-danger">No</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->model }}</td>
                                                        <td>{{ $item->type }}</td>
                                                        <td>{{ $item->vehicle_no }}</td>
                                                        <td>{{ $item->year }}</td>


                                                        <td>

                                                            <ul class="nk-tb-actions gx-1">
                                                                <li>
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li><a href="{{ route('admin.cars.edit',$item->id) }}"><em class="icon ni ni-edit"></em><span>Edit Item</span></a></li>
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



    <div class="modal fade" role="dialog" id="addNew">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="rental">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title">Add new rental package</h5>

                    <form action="{{ route('admin.rental.store') }}" method="POST" enctype="multipart/form-data">
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

                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'name','title' => 'Rental name'])


                            @include('admin.partials.form.select', ['attributes' => 'required' ,'colSize' => 'col-md-6', 'fieldName' => 'is_active', 'title' => 'Status','options' => '
    <option value="1">Active</option>
    <option value="0">Disabled</option>
'])
                            @include('admin.partials.form.text', ['attributes' => 'required','type' => 'number','colSize' => 'col-md-6', 'fieldName' => 'min_days','title' => 'Min days'])
                            @include('admin.partials.form.text', ['attributes' => 'required','type' => 'number','colSize' => 'col-md-6', 'fieldName' => 'max_days','title' => 'Max days'])

                            @include('admin.partials.form.text', ['attributes' => 'required','type' => 'number','colSize' => 'col-md-6', 'fieldName' => 'price_per_day','title' => 'Price per day'])

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

    @foreach($data as $item)
    <div class="modal fade" role="dialog" id="update{{ $item->id }}">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="rental">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title">Editing {{ $item->name }}</h5>

                    <form action="{{ route('admin.rental.update', $item->id) }}" method="POST" enctype="multipart/form-data">
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


                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'value' => $item->name, 'fieldName' => 'name','title' => 'Rental name'])


                            @include('admin.partials.form.select', ['attributes' => 'required' ,'colSize' => 'col-md-6','value' => $item->is_active, 'fieldName' => 'is_active', 'title' => 'Status','options' => '
    <option value="1">Active</option>
    <option value="0">Disabled</option>
'])
                            @include('admin.partials.form.text', ['attributes' => 'required','type' => 'number','colSize' => 'col-md-6', 'value' => $item->min_days, 'fieldName' => 'min_days','title' => 'Min days'])
                            @include('admin.partials.form.text', ['attributes' => 'required','type' => 'number','colSize' => 'col-md-6', 'fieldName' => 'max_days', 'value' => $item->max_days,'title' => 'Max days'])

                            @include('admin.partials.form.text', ['attributes' => 'required','type' => 'number','colSize' => 'col-md-6', 'value' => $item->price_per_day, 'fieldName' => 'price_per_day','title' => 'Price per day'])


                            @include('admin.partials.form.textarea', [ 'colSize' => 'col-md-12', 'value' => $item->description, 'fieldName' => 'description','title' => 'Description'])

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
