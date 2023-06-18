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
                                    <h4 class="title nk-block-title">Editing {{ $subscriber->organisation_name }}</h4>
                                </div>
                            </div>
                            <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">

                                            <form action="{{ route('admin.subscriber.store') }}" method="POST" enctype="multipart/form-data">
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
                                                    <div class="col-lg-6 col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input value="{{ old('organisation_name', $subscriber->organisation_name) }}" name="organisation_name" type="text" class="form-control  @error('organisation_name') error @enderror  form-control-xl form-control-outlined" id="organisation_name">
                                                                <label class="form-label-outlined" for="organisation_name">Organisation Name</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input value="{{ old('contact_person', $subscriber->contact_person) }}" name="contact_person" type="text" class="form-control @error('contact_person') error @enderror  form-control-xl form-control-outlined" id="contact_person">
                                                                <label class="form-label-outlined" for="last_name">Contact person</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input value="{{ old('email', $subscriber->email) }}" name="email" type="text" class="form-control  @error('email') error @enderror form-control-xl form-control-outlined" id="email">
                                                                <label class="form-label-outlined" for="email">Email Address</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input value="{{ old('phone', $subscriber->phone) }}" name="phone" type="text" class="form-control  @error('phone') error @enderror form-control-xl form-control-outlined" id="phone">
                                                                <label class="form-label-outlined" for="phone">Mobile Number</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-sm-12">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input value="{{ old('address', $subscriber->address) }}" name="address" type="text" class="form-control  @error('address') error @enderror form-control-xl form-control-outlined" id="address">
                                                                <label class="form-label-outlined" for="address">Address</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input data-date-format="yyyy-mm-dd" value="{{ old('contract_date', $subscriber->contract_date) }}" name="contract_date" type="text" class="date-picker form-control  @error('contract_date') error @enderror form-control-xl form-control-outlined" id="contract_date">
                                                                <label class="form-label-outlined" for="contract_date">Contracted Date</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <select name="status" class="form-select js-select2" data-ui="xl" id="status">
                                                                    <option {{ $subscriber->status == 'active' ? 'selected' : '' }} value="active">Active</option>
                                                                    <option {{ $subscriber->status == 'disabled' ? 'selected' : '' }} value="disabled">Disabled</option>
                                                                </select>
                                                                <label class="form-label-outlined" for="status">Status</label>
                                                            </div>
                                                        </div>
                                                    </div>

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
