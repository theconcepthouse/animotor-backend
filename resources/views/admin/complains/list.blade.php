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
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="datatable-wrap- my-3">
                                            <table class="datatable-init-export nowrap table" data-export-title="Export">
                                                <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Trip ID</th>
                                                    <th>Driver</th>
                                                    <th>Rider</th>
                                                    <th>Complain By</th>
                                                    <th>Subject</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($data as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->ride_id }}</td>
                                                        <td>{{ optional($item->ride)->driver?->name }}</td>
                                                        <td>{{ optional($item->ride)->rider?->name }}</td>
                                                        <td>{{ $item->by }}</td>
                                                        <td>{{ $item->subject }}</td>

                                                        <td>
                                                            @if($item->status == 'resolved')
                                                                <span class="badge badge-dim bg-success">Resolved</span>
                                                            @else
                                                                <span class="badge badge-dim bg-danger">{{ $item->status }}</span>
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
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title">Add New Complain</h5>

                    <form action="{{ route('admin.complains.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf



                        <div class="row gy-4 pt-4">

                            <div class="col-md-6">
                                 <div class="form-group">
                                    <div class="form-control-wrap">
                                        <select name="ride_id" id="trip" class="form-select js-select2" data-ui="xl">
                                            @foreach($trips as $value => $label)
                                                <option value="{{ $value }}">{{ __($label) }}</option>
                                            @endforeach
                                        </select>
                                        <label class="form-label-outlined" for="trip">Trip ID</label>
                                    </div>
                                 </div>
                            </div>
                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'driver','title' => 'Driver'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'rider','title' => 'Rider'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'by','title' => 'Complain By'])
                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'subject','title' => 'Subject'])

                            @include('admin.partials.form.select', ['attributes' => 'required' ,'colSize' => 'col-md-6', 'fieldName' => 'status', 'title' => 'Status',
                                'options' => ['1' => 'Active', '0' => 'Disabled']])
                            <div class="col-md-12">
                                 <div class="form-group">
                                    <div class="form-control-wrap">
                                        <label class="form-label-" for="complain">Complain</label>
                                         <textarea name="complain" id="complain" cols="5" rows="5" class="form-control"></textarea>
                                    </div>
                                 </div>
                            </div>

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


                            @include('admin.partials.form.select', ['attributes' => 'required' ,'colSize' => 'col-md-6', 'fieldName' => 'user_type', 'title' => 'User type',
'options' => ['driver' => 'Driver', 'user' => 'user']])

                            @include('admin.partials.form.select', ['attributes' => 'required' ,'colSize' => 'col-md-6', 'fieldName' => 'is_active', 'title' => 'Status',
'options' => ['1' => 'Active', '0' => 'Disabled']])

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
