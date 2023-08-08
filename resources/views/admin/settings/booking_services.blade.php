@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Features activation</h3>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered card-stretch">
                            <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#general"><em class="icon ni ni-laptop"></em><span>General settings</span></a>
                                </li>



                                {{--                                <li class="nav-item">--}}
                                {{--                                    <a class="nav-link" data-bs-toggle="tab" href="#email"><em class="icon ni ni-mail-fill"></em><span>Email settings </span> </a>--}}
                                {{--                                </li>--}}
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="general">

                                    @section('hide')
                                    <div class="card-inner pt-0">
                                        <h4 class="title nk-block-title">Booking service </h4>
                                        <p>Configure your booking services here.</p>

                                        <form action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">

                                            <input name="active_setting" value="back" type="hidden">
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
                                                <br/>
                                            @endif

                                            <div class="row g-3 align-center-">

                                                @include('admin.partials.form.select_array', ['attributes' => 'required' ,'colSize' => 'col-md-12', 'value' => settings('enable_rental'), 'fieldName' => 'enable_rental', 'title' => 'Enable Rental','options' => ['yes','no']])
                                                @include('admin.partials.form.select_array', ['attributes' => 'required' ,'colSize' => 'col-md-12', 'value' => settings('enable_instant_ride'), 'fieldName' => 'enable_instant_ride', 'title' => 'Enable Instant Ride','options' => ['yes','no']])
                                                @include('admin.partials.form.select_array', ['attributes' => 'required' ,'colSize' => 'col-md-12', 'value' => settings('enable_fleet'), 'fieldName' => 'enable_fleet', 'title' => 'Enable Fleet','options' => ['yes','no']])
                                                @include('admin.partials.form.select_array', ['attributes' => 'required' ,'colSize' => 'col-md-12', 'value' => settings('map_home_screen'), 'fieldName' => 'map_home_screen', 'title' => 'Map Home Screen','options' => ['no','yes']])


                                            </div>

                                            <div class="row g-3">
                                                <div class="col-lg-7">
                                                    <div class="form-group mt-2">
                                                        <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    @endsection
                                    <div class="card-inner pt-0">
                                        <div class="row features">
                                            @foreach($settings as $item)
                                                <div class="col-3">
                                                    <div class="mt-3 content d-flex flex-row justify-content-between  align-center">
                                                        <h5 class="">{{ convertToWord($item) }}</h5>

                                                        <div class="custom-control custom-switch">
                                                            <input
                                                                data-model-id="1_{{ $item }}" data-model="Setting"  {{ settings($item) == 'yes' ? 'checked' : '' }}  data-field="{{ $item }}" type="checkbox" class="custom-control-input" id="customSwitch{{ $item }}">
                                                            <label class="custom-control-label" for="customSwitch{{ $item }}"></label>
                                                        </div>
                                                </div>

                                            </div>
                                            @endforeach
                                        </div>
                                    </div>



                                </div><!--tab pan -->


                            </div><!-- .tab-content -->
                        </div><!--card-->
                    </div><!--nk-block-->
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')


@endsection
