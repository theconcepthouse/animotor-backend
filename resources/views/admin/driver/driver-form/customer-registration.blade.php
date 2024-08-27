@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md- mx-auto">

                        <div class="nk-block">

                            <div class="nk-block-between g-3">
                                <div class="nk-block-head-content mb-5">
                                    {{--                                    <h4 class="title nk-block-title">Create new {{ $role }}</h4>--}}
                                    <h4 class="title nk-block-title">New Customer Registration</h4>
                                </div>
                                <div class="nk-block-head-content">
                                    <a href="{{ route('admin.driverForm', ['driverId' => $driver->id, 'formId' => $form->id]) }}"
                                       wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                            class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                    <a href="{{ route('admin.driverForm', ['driverId' => $driver->id, 'formId' => $form->id]) }}"
                                       wire:navigate
                                       class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                            class="icon ni ni-arrow-left"></em></a>

                                </div>
                            </div>
                            <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">

                                        <div class="card-inner">

                                              <form action="{{ route('admin.submitDriverForm', $form->id) }}" method="POST" enctype="multipart/form-data">
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

                                                <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                                                <input type="hidden" name="form_id" value="{{ $form->id }}">

                                                <input name="role" type="hidden" value="driver">

                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                    <label for="first_name">First name</label>
                                                    <input type="text" class="form-control" id="first_name"
                                                           name="personal_details[first_name]"
                                                           value="{{ old('personal_details.first_name', $form->personal_details['first_name'] ?? '') }}" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="last_name">Last name</label>
                                                    <input type="text" class="form-control" id="last_name"
                                                           name="personal_details[last_name]"
                                                           value="{{ old('personal_details.last_name', $form->personal_details['last_name'] ?? '') }}" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                           name="personal_details[email]"
                                                           value="{{ old('personal_details.email', $form->personal_details['email'] ?? '') }}" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" class="form-control" id="phone"
                                                           name="personal_details[phone]"
                                                           value="{{ old('personal_details.phone', $form->personal_details['phone'] ?? '') }}" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="work_phone">Work phone</label>
                                                    <input type="text" class="form-control" id="work_phone"
                                                           name="personal_details[work_phone]"
                                                           value="{{ old('personal_details.work_phone', $form->personal_details['work_phone'] ?? '') }}">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="hire_type">Hire type</label>
                                                    <select class="form-control" id="hire_type" name="personal_details[hire_type]">
                                                        <option value="Social Domestic" {{ old('personal_details.hire_type', $form->personal_details['hire_type'] ?? '') == 'Social Domestic' ? 'selected' : '' }}>Social Domestic</option>
                                                        <option value="Rent to Buy" {{ old('personal_details.hire_type', $form->personal_details['hire_type'] ?? '') == 'Rent to Buy' ? 'selected' : '' }}>Rent to Buy</option>
                                                        <option value="Credit Hire" {{ old('personal_details.hire_type', $form->personal_details['hire_type'] ?? '') == 'Credit Hire' ? 'selected' : '' }}>Credit Hire</option>
                                                        <option value="Insurance" {{ old('personal_details.hire_type', $form->personal_details['hire_type'] ?? '') == 'Insurance' ? 'selected' : '' }}>Insurance</option>
                                                    </select>
                                                </div>

                                                </div>


                                                <div class="form-group mt-3">
                                                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>

@endsection
