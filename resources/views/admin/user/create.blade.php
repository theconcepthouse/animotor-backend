@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md- mx-auto">

                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="title nk-block-title">Create new {{ $role }}</h4>
                                </div>
                            </div>
                            <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">

                                            <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
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
                                                @if(session()->has('success'))
                                                    <div class="alert alert-success">
                                                        {{ session()->get('success') }}
                                                    </div>
                                                @endif


                                                <div class="row gy-4">
                                                    @include('admin.partials.form.select_w_object', ['attributes' => 'required', 'colSize' => 'col-md-4', 'fieldName' => 'region_id','title' => 'Service Area','options' => $regions])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'fieldName' => 'first_name','title' => 'First Name'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'fieldName' => 'last_name','title' => 'Last Name'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'fieldName' => 'phone','type' => 'tel','title' => 'Phone'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'fieldName' => 'email','type' => 'email','title' => 'Email Address'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'fieldName' => 'password','title' => 'Password'])
                                                    @include('admin.partials.form.text', ['attributes' => 'disabled', 'colSize' => 'col-md-4', 'value' => $role, 'fieldName' => 'role','title' => 'Role'])
                                                    @include('admin.partials.form.select_array', ['attributes' => 'required', 'colSize' => 'col-md-4', 'fieldName' => 'gender','title' => 'Gender','options' => ['male','female','others']])

                                                    @include('admin.partials.image-upload',['field' => 'avatar','id' => 'image','title' => 'Profile Pics'])

                                                    <input name="role" type="hidden" value="{{ $role }}" />

                                                    @if($role == 'driver')
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-3', 'fieldName' => 'title','title' => 'Car title'])
                                                    @include('admin.partials.form.select_w_object', ['attributes' => 'required', 'option_name' => 'name',  'colSize' => 'col-md-3', 'fieldName' => 'vehicle_type','title' => 'Car Type','options' => $car_types])
                                                    @include('admin.partials.form.select_w_object', ['attributes' => 'required', 'option_name' => 'name', 'colSize' => 'col-md-3', 'fieldName' => 'vehicle_make','title' => 'Car make','options' => $car_makes])
                                                    @include('admin.partials.form.select_w_object', ['attributes' => 'required', 'colSize' => 'col-md-3', 'fieldName' => 'model','title' => 'Car model','options' => $car_models])
                                                    @include('admin.partials.form.select_array', [ 'colSize' => 'col-md-3', 'fieldName' => 'gear','title' => 'Gear type', 'options' => ['Automatic','Manual']])

                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-3', 'fieldName' => 'color','title' => 'Car Color'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'colSize' => 'col-md-3', 'fieldName' => 'year','title' => 'Car Year'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required',  'colSize' => 'col-md-3', 'fieldName' => 'vehicle_no','title' => 'Car Number'])
                                                    @include('admin.partials.form.text', [ 'colSize' => 'col-md-3', 'fieldName' => 'door','title' => 'Door count'])

                                                    @include('admin.partials.image-upload',['field' => 'image','id' => 'car_image','title' => 'Car Image'])
                                                    @endif
                                                </div>


                                                <div class="form-group mt-3">
                                                    <button type="submit" class="btn btn-lg btn-primary">Save </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .nk-block -->


                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        // Fetch and populate models based on selected make
        $(document).ready(function() {
            $('#vehicle_make').on('change', function() {
                var makeId = $(this).val();
                if (makeId) {
                    $.ajax({
                        url: "{{ route('admin.api.get.models') }}?make_id=" + makeId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#model').empty().append('<option value="">Select Model</option>');
                            if (data.data.length > 0) {
                                $.each(data.data, function(index, model) {
                                    $('#model').append('<option value="' + model.name + '">' + model.name + '</option>');
                                });
                            }
                        }
                    });
                } else {
                    $('#model').empty().append('<option value="">Select Model</option>');
                }
            });
        });
    </script>



@endsection
