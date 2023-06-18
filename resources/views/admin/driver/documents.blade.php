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
                                        <a href="{{ route('admin.drivers.index',['status' => 'all']) }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>


                                    </div><!-- .nk-block-head-content -->

                                </div>

                            </div>

                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="datatable-wrap- my-3">
                                            <table class="nowrap table">
                                                <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Driver name</th>
                                                    <th>Document name</th>
                                                    <th>Expiry Data</th>
                                                    <th>Status</th>
                                                    <th>Comment</th>
                                                    <th>Action</th>
                                                    <th>Approve</th>
{{--                                                    <th>Action</th>--}}
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($data as $item)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $driver->name }}</td>
                                                        <td>{{ $item?->document?->name }}</td>

                                                        <td>
                                                            {{ $item->expiry_date ?? '-' }}
                                                        </td>

                                                        <td>
                                                                <span class="badge badge-dim {{ $item->color }} btn-warning">{{ $item->status }}</span>
                                                        </td>

                                                        <td>
                                                            @if(strlen($item->comment) < 3)
                                                                -
                                                            @else
                                                                {{ \Illuminate\Support\Str::limit($item->comment, 15) }}
                                                            @endif

                                                        </td>

{{--                                                        <td>--}}
{{--                                                            @if($item->status)--}}
{{--                                                            <span class="badge badge-dim bg-success">Active</span>--}}
{{--                                                            @else--}}
{{--                                                                <span class="badge badge-dim bg-danger">Inactive</span>--}}
{{--                                                            @endif--}}
{{--                                                        </td>--}}

                                                        <td>


                                                            <div class="d-flex">
                                                                <a data-bs-toggle="modal" href="#update{{ $item->id }}" class="btn btn-icon btn-outline-gray btn-round mx-1"><em class="icon ni ni-edit"></em></a>
                                                               @if($item->file)
                                                                <a data-bs-toggle="modal" href="#viewImage{{ $item->id }}" class="btn btn-icon btn-outline-gray btn-round mx-1"><em class="icon ni ni-img-fill"></em></a>
                                                                @endif
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <a  data-bs-toggle="modal" href="#update{{ $item->id }}" class="btn btn-outline-primary mx-1">Update</a>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="8" class="mt-4">
                                                        <div class="mt-4">
                                                            @if($driver->status == 'active')
                                                                <a  href="{{ route('admin.user.update.status',['id' => $driver->id,'status' => 'disapproved']) }}" class="btn btn-danger mx-1 float-end">Disapprove driver</a>
                                                            @else
                                                                <a  href="{{ route('admin.user.update.status',['id' => $driver->id,'status' => 'approved']) }}" class="btn btn-success mx-1 float-end">Approve driver</a>
                                                            @endif
                                                        </div>

                                                    </td>
                                                </tr>
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

    @foreach($data as $item)


    <div class="modal fade" role="dialog" id="update{{ $item->id }}">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title">Update document</h5>
                    <form action="{{ route('admin.driver.document.update') }}" method="POST" enctype="multipart/form-data">
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


                            @include('admin.partials.form.text', ['attributes' => 'disabled', 'colSize' => 'col-md-12', 'fieldName' => 'name','value' => $item?->document?->name, 'title' => 'Document name'])

                            <input name="document_id" value="{{ $item->id }}" type="hidden">
                            <input name="driver_id" value="{{ $driver->id }}" type="hidden">

                            @include('admin.partials.image-upload',['field' => 'file', 'image' => $item->file,'id' => 'file'.$item->id,'title' => 'Document'])

                            @include('admin.partials.form.textarea', [ 'colSize' => 'col-md-12',  'fieldName' => 'comment','value' => $item?->comment, 'title' => 'Comment / Message'])

                            @include('admin.partials.form.select_array', ['attributes' => 'required', 'id' => $item->id,'colSize' => 'col-md-12', 'fieldName' => 'status','value' => $item->status, 'title' => 'Status','options' => ['approved','rejected','pending','not uploaded']])

                            @if($item?->document?->has_expiry_date)
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input data-date-format="yyyy-mm-dd" value="{{ old('expiry_date', $item->expiry_date) }}" name="expiry_date" type="text" class="date-picker form-control  @error('expiry_date') error @enderror form-control-xl form-control-outlined" id="expiry_date">
                                        <label class="form-label-outlined" for="expiry_date">Expiry Date</label>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>





                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-lg btn-primary">Update </button>
                        </div>
                    </form>


                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div>

    <div class="modal fade" role="dialog" id="viewImage{{ $item->id }}">

        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title">{{ $driver->name }} {{ $item?->document?->name }} image</h5>

                    <div class="row">
                        <img src="{{ $item->file }}" />
                    </div>

                </div>
                <!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div>

    @endforeach

@endsection

@section('js')

    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>


    <script>
        $('.lfm').filemanager('image');
    </script>

@endsection
