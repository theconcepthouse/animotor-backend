@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                     <div class="container mb-3 mt-4">
                         <h4>Driver Name: {{ $driver->name }}</h4>
                     </div>
                    <div class="components-preview wide-md- mx-auto">

                           <div class="nk-block">

                                 <div class="card card-bordered card-preview">
{{--                                      <div class="pull-right">--}}
{{--                                            <p>Driver's Name: {{ $user->name }}</p>--}}
{{--                                            <p>Driver Type: {{ $user->hire_type }}</p>--}}
{{--                                            <p>Driver Type: {{ $user->status }}</p>--}}
{{--                                       </div>--}}
                                    <div class="card-inner">
                                        <ul class="nav nav-tabs mt-n3" >
                                            <li class="nav-item "  >
                                                <a class="nav-link" href="{{ route('admin.form.index', $driver->id) }}" wire:navigate>Forms</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active btn btn-primary" href="{{ route('admin.addDocument', $driver->id) }}" wire:navigate>Documents</a>
                                            </li>
                                            <li class="nav-item" >
                                                <a class="nav-link"href="{{ route('admin.paymentHistory', $driver->id) }}" wire:navigate>Payment History</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" href="{{ route('admin.driverPcn', $driver->id) }}" wire:navigate >PCNs</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" href="{{ route('admin.notes', $driver->id) }}" wire:navigate>Notes</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" href="#" >History</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>


                                <div class="card card-bordered">
                                    <div class="card-inner-group">
                                        <div class="card-inner p-0">

                                           <div class="container col-lg-10 ">
                                                @if(session()->has('error'))
                                                    <div class="alert alert-danger">
                                                        {{ session()->get('error') }}
                                                    </div>
                                                @endif
                                                <div class="row">
                                                    @foreach($data as $item)
                                                        <div class="col-lg-6">
                                                            <div class="card card-bordered mb-2">
                                                                <div class="card-inner">
                                                                    <h5 class="card-title">{{ $item?->document?->name }} </h5>
                                                                    <a data-bs-toggle="modal" href="#update{{ $item->id }}"  style="margin-left: 80%; font-size: 20px"><i class="ni ni-upload-cloud ml-5"></i></a>

                                                                    <p class="card-text">License No: {{ $item?->driving_license_number ?? '-' }} </p>
                                                                    <p class="card-text">Expiry Date: {{ $item->expiry_date ?? '-' }} </p>

                                                                   <div style="margin-left: 80%" class="pull-right">
                                                                        <a data-bs-toggle="modal" href="#viewImage{{ $item->id }}" style="margin-right: 20px; font-size: 20px"><i class="ni ni-eye"></i></a>
                                                                        <a data-bs-toggle="modal" href="#viewImage{{ $item->id }}" style=" font-size: 20px"><i class="ni ni-download"></i></a>
                                                                   </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endforeach

                                                </div>

                                               <a data-bs-toggle="modal" class="btn btn-primary m-3" href="#addDoc" >Add New</a>

                                           </div>

                                            <!-- .nk-tb-list -->
                                        </div>

                                    </div>
                                </div>
                            </div>



                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>



     <div class="modal fade" tabindex="-1" id="addDoc" >
        <div class="modal-dialog" role="document">
              <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                   <form action="{{ route('admin.addNewDoc') }}" method="POST">
                       @csrf
                       <input name="driver_id" value="{{ $driver->id }}" type="hidden">
                       <div class="form-group">
                           <select name="document_id" id="" class="form-control">
                               @foreach($all_docs as $item)
                                   <option value="{{ $item->id }}">{{ $item->name }}</option>
                               @endforeach
                           </select>
                       </div>
                       <button type="submit" class="btn btn-primary ">Add New</button>

                   </form>

                </div><!-- .modal-body -->
            </div>
            <!-- .modal-content -->
        </div>
    </div>


    @foreach($data as $item)

    <div class="modal fade" tabindex="-1" id="update{{ $item->id }}" >
        <div class="modal-dialog" role="document">
              <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title">Upload document</h5>
                    <form action="{{ route('admin.storeDocument') }}" method="POST" enctype="multipart/form-data">
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
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <div class="row gy-4 pt-4">


                            @include('admin.partials.form.text', ['attributes' => 'disabled', 'colSize' => 'col-md-12', 'fieldName' => 'name','value' => $item?->document?->name, 'title' => 'Document name'])

                            <input name="document_id" value="{{ $item->id }}" type="hidden">
                            <input name="driver_id" value="{{ $driver->id }}" type="hidden">

                            @include('admin.partials.image-upload',['field' => 'file', 'image' => $item->file,'id' => 'file'.$item->id,'title' => 'Document'])

                            @include('admin.partials.form.text', [ 'colSize' => 'col-md-12',  'fieldName' => 'driving_license_number','value' => $item?->driving_license_number, 'title' => 'License No'])

                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input data-date-format="yyyy-mm-dd" value="{{ old('expiry_date', $item->expiry_date) }}" name="expiry_date" type="text" class="date-picker form-control  @error('expiry_date') error @enderror form-control-xl form-control-outlined" id="expiry_date">
                                        <label class="form-label-outlined" for="expiry_date">Expiry Date</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-lg btn-primary">Save </button>
                        </div>
                    </form>


                </div><!-- .modal-body -->
            </div>
            <!-- .modal-content -->
        </div>
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
        </div>
        <!-- .modal-dialog -->
    </div>

    @endforeach

@endsection

@section('js')


@endsection
