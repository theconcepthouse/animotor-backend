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
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Region</th>
                                                    <th>Base Price</th>
                                                    <th>Min Fare</th>
                                                    <th>Discount</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($data as $item)
                                                    <tr>
                                                        <td>
                                                            <img height="30" width="30" src="{{ $item->image }}" />
                                                        </td>

                                                        <td>{{ $item->name }}</td>

                                                        <td>{{ optional($item->region)->name }}</td>

                                                        <td>{{ $item->price }}</td>

                                                        <td>{{ $item->min_fare }}</td>
                                                        <td>{{ $item->discount }}%</td>

                                                        <td>
                                                            @if($item->is_active)
                                                                <span class="badge badge-dim bg-success">Active</span>
                                                            @else
                                                                <span class="badge badge-dim bg-danger">Disabled</span>
                                                            @endif
                                                        </td>


                                                        <td>

                                                            <ul class="nk-tb-actions gx-1">
                                                                <li>
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li><a  data-bs-toggle="modal" href="#update{{ $item->id }}"><em class="icon ni ni-edit"></em><span>Edit Item</span></a></li>
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
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title">Add New Service</h5>

                    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
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

                            @include('admin.partials.form.select_w_object', ['attributes' => 'required' ,'colSize' => 'col-md-6', 'fieldName' => 'region_id', 'title' => 'Service Region','options' => $regions])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6',  'fieldName' => 'name','title' => 'Service name'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'capacity', 'title' => 'Capacity'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'price', 'title' => 'Base Fare'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'min_fare', 'title' => 'Minimum Fare'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'min_distance', 'title' => 'Minimum Distance'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'distance_price', 'title' => 'Price per distance'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'time_price', 'title' => 'Price per minutes'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'wait_time_limit', 'title' => 'Free waiting time(in minutes)'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'wait_price', 'title' => 'Price Per minute wait'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'cancellation_fee', 'title' => 'Cancellation fee'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'fieldName' => 'payment_methods', 'title' => 'Payment methods'])
                            @include('admin.partials.form.select_array', ['attributes' => 'required', 'fieldName' => 'commission_type', 'title' => 'Commission Type', 'options' => ['flat','percentage']])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'commission', 'title' => 'Commission'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'discount', 'title' => 'Discount (in %)'])

                            @include('admin.partials.form.select', ['attributes' => 'required' ,'colSize' => 'col-md-6', 'fieldName' => 'is_active', 'title' => 'Status','options' => '
<option value="1">Active</option>
<option value="0">Disabled</option>
'])

                            @include('admin.partials.image-upload',['field' => 'image','id' => 'image','title' => 'Image'])


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
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title">Editing {{ $item->name }}</h5>

                    <form action="{{ route('admin.services.update', $item->id) }}" method="POST" enctype="multipart/form-data">
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


                            @include('admin.partials.form.select_w_object', ['attributes' => 'required', 'value' => $item->region_id ,'colSize' => 'col-md-6', 'fieldName' => 'region_id',  'id' => $item->id, 'title' => 'Service Region','options' => $regions])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'value' => $item->name, 'fieldName' => 'name','title' => 'Service name'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'capacity', 'value' => $item->capacity, 'title' => 'Capacity'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'price', 'value' => $item->price, 'title' => 'Base Fare'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'min_fare', 'value' => $item->min_fare,'title' => 'Minimum Fare'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'min_distance','value' => $item->min_distance, 'title' => 'Minimum Distance'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'distance_price', 'value' => $item->distance_price, 'title' => 'Price per distance'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'time_price', 'value' => $item->time_price, 'title' => 'Price per minutes'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'wait_time_limit', 'value' => $item->wait_time_limit, 'title' => 'Free waiting time(in minutes)'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'wait_price', 'value' => $item->wait_price, 'title' => 'Price Per minute wait'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'cancellation_fee', 'value' => $item->cancellation_fee, 'title' => 'Cancellation fee'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'fieldName' => 'payment_methods', 'value' => $item->payment_methods, 'title' => 'Payment methods'])
                            @include('admin.partials.form.select_array', ['attributes' => 'required', 'fieldName' => 'commission_type', 'value' => $item->commission_type, 'title' => 'Commission Type', 'options' => ['flat','percentage']])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'commission', 'value' => $item->commission, 'title' => 'Commission'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'fieldName' => 'discount', 'value' => $item->discount, 'title' => 'Discount (in %)'])

                            @include('admin.partials.form.select', ['attributes' => 'required' ,'colSize' => 'col-md-6', 'fieldName' => 'is_active', 'value' => $item->is_active, 'title' => 'Status','options' => '
<option value="1">Active</option>
<option value="0">Disabled</option>
'])

                            @include('admin.partials.image-upload',['field' => 'image','id' => 'image', 'image' => $item->image,'title' => 'Image'])

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

    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>


    <script>
        $('.lfm').filemanager('image');
    </script>

@endsection
