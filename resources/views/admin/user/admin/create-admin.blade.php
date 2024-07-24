@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md- mx-auto">

                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-between g-3">
                                <div class="nk-block-head-content">
{{--                                    <h4 class="title nk-block-title">Create new {{ $role }}</h4>--}}
                                    <h4 class="title nk-block-title">New Customer Registration</h4>
                                </div>
                                <div class="nk-block-head-content">
                                    <a href="{{ request()->get('back_url') }}" wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                    <a href="{{ request()->get('back_url') }}" wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                </div>
                            </div>
                            <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">

                                            <form action="{{ route('admin.storeAdmin') }}" method="POST" enctype="multipart/form-data">
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
{{--                                                    @include('admin.partials.form.select_array', ['attributes' => 'required', 'colSize' => 'col-md-4', 'fieldName' => 'model','title' => 'Car model','options' => ['World Service']])--}}
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'fieldName' => 'first_name','title' => 'First Name'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'fieldName' => 'last_name','title' => 'Last Name'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'fieldName' => 'phone','type' => 'tel','title' => 'Mobile Number'])

                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'fieldName' => 'email','type' => 'email','title' => 'Email Address'])

                                                    @include('admin.partials.form.password', ['attributes' => 'required', 'colSize' => 'col-md-4', 'fieldName' => 'password','type' => 'password','title' => 'Password'])
                                                    @include('admin.partials.form.select_array', ['attributes' => 'required', 'colSize' => 'col-md-4', 'fieldName' => 'role','title' => 'Role','options' => ['admin','sales','IT', 'finance']])
                                                     @include('admin.partials.image-upload',['field' => 'image','id' => 'avatar','title' => 'Profile Picture'])
                                                    <br>
                                                    <input name="role" type="hidden" value="{{ $role }}" />

{{--                                                    @if($role == 'driver')--}}
{{--                                                        @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-3', 'fieldName' => 'title','title' => 'Car title'])--}}
{{--                                                        @include('admin.partials.form.select_w_object', ['attributes' => 'required', 'option_name' => 'name',  'colSize' => 'col-md-3', 'fieldName' => 'vehicle_type','title' => 'Car Type','options' => $car_types])--}}
{{--                                                        @include('admin.partials.form.select_w_object', ['attributes' => 'required', 'option_name' => 'name', 'colSize' => 'col-md-3', 'fieldName' => 'vehicle_make','title' => 'Car make','options' => $car_makes])--}}
{{--                                                        @include('admin.partials.form.select_w_object', ['attributes' => 'required', 'colSize' => 'col-md-3', 'fieldName' => 'model','title' => 'Car model','options' => $car_models])--}}
{{--                                                        @include('admin.partials.form.select_array', [ 'colSize' => 'col-md-3', 'fieldName' => 'gear','title' => 'Gear type', 'options' => ['Automatic','Manual']])--}}
{{--    --}}
{{--                                                        @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-3', 'fieldName' => 'color','title' => 'Car Color'])--}}
{{--                                                        @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'colSize' => 'col-md-3', 'fieldName' => 'year','title' => 'Car Year'])--}}
{{--                                                        @include('admin.partials.form.text', ['attributes' => 'required',  'colSize' => 'col-md-3', 'fieldName' => 'vehicle_no','title' => 'Car Number'])--}}
{{--                                                        @include('admin.partials.form.text', [ 'colSize' => 'col-md-3', 'fieldName' => 'door','title' => 'Door count'])--}}
{{--    --}}
{{--                                                        @include('admin.partials.image-upload',['field' => 'image','id' => 'car_image','title' => 'Car Image'])--}}
{{--                                                    @endif--}}
                                                </div>


                                                <div class="form-group mt-5">
                                                    <button type="submit" class="btn btn-lg btn-primary">Submit </button>
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
