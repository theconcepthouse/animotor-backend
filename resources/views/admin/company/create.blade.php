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
                                    <h4 class="title nk-block-title">Add new company</h4>
                                </div>

                                <div class="nk-block-head-content">
                                    <a href="{{ route('admin.companies.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                    <a href="{{ route('admin.companies.index') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                </div>
                            </div>

                            <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">

                                            <form action="{{ route('admin.companies.store') }}" method="POST" enctype="multipart/form-data">
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

                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => old('name'), 'fieldName' => 'name','title' => 'Name'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-8', 'value' => old('address'), 'fieldName' => 'address','title' => 'Address'])

                                                    @include('admin.partials.form.select_w_object', ['attributes' => 'required', 'colSize' => 'col-md-4 mb-2','value' => old('country'), 'fieldName' => 'country','title' => 'Country','options' => $countries])

                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => old('state'), 'fieldName' => 'state','title' => 'State'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => old('city'), 'fieldName' => 'city','title' => 'City'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => old('postal_code'), 'fieldName' => 'postal_code','title' => 'Postal code'])

                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => old('tin'),  'fieldName' => 'tin','title' => 'Tax Identification Number'])

                                                </div>

                                                <hr/>
                                                <div class="row gy-2">
                                                    <h6>Contact person</h6>
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => old('contact_name'), 'fieldName' => 'contact_name','title' => 'Contact Name'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => old('contact_email'), 'fieldName' => 'contact_email','title' => 'Contact Email'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => old('contact_phone'), 'fieldName' => 'contact_phone','title' => 'Contact Phone'])

                                                </div>

                                                <hr/>
                                                <div class="row gy-2">
                                                    <h6>Owner Login Info</h6>
                                                @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-3', 'value' => old('owner'),  'fieldName' => 'owner','title' => 'Owner name'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-3', 'value' => old('email'), 'fieldName' => 'email','title' => 'Owner Email'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-3', 'value' => old('phone'), 'fieldName' => 'phone','title' => 'Owner Phone'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'password', 'colSize' => 'col-md-3', 'fieldName' => 'password','title' => 'password'])


                                                </div>


                                                <div class="form-group mt-3">
                                                    <button type="submit" class="btn btn-lg btn-primary">Save record </button>
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
