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
                                        <h4 class="nk-block-title">{{ __('admin.app.title') }}</h4>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li class="nk-block-tools-opt d-none d-sm-block">
                                                        <a class="btn btn-primary" data-bs-toggle="modal" href="#addNew"><em class="icon ni ni-plus"></em><span>{{ __('admin.app.add_new') }}</span></a>
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
                                            <table class="datatable-init-export nowrap table" data-export-title="{{ __('admin.app.export_title') }}">
                                                <thead>
                                                <tr>
                                                    <th>{{ __('admin.app.sn') }}</th>
                                                    <th>{{ __('admin.app.title') }}</th>
                                                    <th>{{ __('admin.app.make') }}</th>
                                                    <th>{{ __('admin.app.is_available') }}</th>
                                                    <th>{{ __('admin.app.model') }}</th>
                                                    <th>{{ __('admin.app.type') }}</th>
                                                    <th>{{ __('admin.app.vehicle_no') }}</th>
                                                    <th>{{ __('admin.app.year') }}</th>
                                                    <th>{{ __('admin.app.action') }}</th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($data as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->title }}</td>
                                                        <td>{{ $item->make }}</td>
                                                        <td>
                                                            @if($item->is_available)
                                                                <span class="badge badge-dim bg-success">{{ __('admin.app.yes') }}</span>
                                                            @else
                                                                <span class="badge badge-dim bg-danger">{{ __('admin.app.no') }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->model }}</td>
                                                        <td>{{ $item->type }}</td>
                                                        <td>{{ $item->vehicle_no }}</td>
                                                        <td>{{ $item->year }}</td>


                                                        <td>

                                                            <a class="btn btn-warning btn-sm rounded" wire:navigate href="{{ route('admin.cars.edit',$item->id) }}"><em class="icon ni ni-edit"></em><span>{{ __('admin.app.edit_item') }}</span></a>

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
                    <h5 class="title">{{ __('admin.app.add_new_car') }}</h5>

                    <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
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

                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'title','title' => __('admin.app.title')])


                            @include('admin.partials.form.select', ['attributes' => 'required' ,'colSize' => 'col-md-6', 'fieldName' => 'make', 'title' => __('admin.app.make'),'options' => '
    <option value="make1">{{ __('admin.app.make1') }}</option>
    <option value="make2">{{ __('admin.app.make2') }}</option>
'])

                            @include('admin.partials.form.select', ['attributes' => 'required' ,'colSize' => 'col-md-6', 'fieldName' => 'is_available', 'title' => __('admin.app.is_available'),'options' => '
    <option value="1">{{ __('admin.app.yes') }}</option>
    <option value="0">{{ __('admin.app.no') }}</option>
'])

                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'model','title' => __('admin.app.model')])

                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'type','title' => __('admin.app.type')])

                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'vehicle_no','title' => __('admin.app.vehicle_no')])

                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'year','title' => __('admin.app.year')])

                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-lg btn-primary">{{ __('admin.app.save') }}</button>
                        </div>
                    </form>


                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->

@endsection
