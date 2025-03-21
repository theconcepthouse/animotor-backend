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
                                    <h4 class="title nk-block-title">Editing {{ $country->name }}</h4>
                                </div>

                                <div class="nk-block-head-content">
                                    <a href="{{ route('admin.countries.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                    <a href="{{ route('admin.countries.index') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                </div>
                            </div>

                            <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">

                                            <form action="{{ route('admin.countries.update', $country->id) }}" method="POST" enctype="multipart/form-data">
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
                                                @if(session()->has('success'))
                                                    <div class="alert alert-success">
                                                        {{ session()->get('success') }}
                                                    </div>
                                                @endif


                                                <div class="row gy-4">

                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => $country->name, 'fieldName' => 'name','title' => 'Country'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => $country->dial_code, 'fieldName' => 'dial_code','title' => 'Dial Code'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => $country->code, 'fieldName' => 'code','title' => 'Country Code'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => $country->currency_name, 'fieldName' => 'currency_name','title' => 'Currency name'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => $country->currency_code, 'fieldName' => 'currency_code','title' => 'Currency code'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => $country->currency_symbol, 'fieldName' => 'currency_symbol','title' => 'Currency Symbol'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => $country->currency_symbol, 'fieldName' => 'currency_symbol','title' => 'Currency Symbol'])

                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => $country->dial_min_length, 'fieldName' => 'dial_min_length','title' => 'Dial min length'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => $country->dial_max_length, 'fieldName' => 'dial_max_length','title' => 'Dial max length'])

                                                </div>


                                                <div class="form-group mt-3">
                                                    <button type="submit" class="btn btn-lg btn-primary">Update record </button>
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
