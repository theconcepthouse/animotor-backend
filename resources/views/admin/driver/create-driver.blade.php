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
                                    <a href="{{ route('admin.drivers') }}" wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                    <a href="{{ route('admin.drivers') }}" wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>

                                </div>
                            </div>
                            <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">

                                            <form action="{{ route('admin.store.driver') }}" method="POST" enctype="multipart/form-data">
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

{{--                                                 <input type="hidden" name="form_id" value="{{ $form->id }}">--}}
                                                 @include('admin.partials.form.text', ['attributes' => 'disabled', 'colSize' => 'col-md-4', 'value' => $role, 'fieldName' => 'role', 'type' => 'hidden','title' => ''])
                                                    <input name="role" type="hidden" value="{{ $role }}" />

                                                <div class="row gy-2">

                                                    <div class="row">
                                                    <div class="form-group col-md-4">
                                                    <label for="first_name">First name</label>
                                                    <input type="text" class="form-control" id="first_name"
                                                           name="first_name"
                                                            required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="last_name">Last name</label>
                                                    <input type="text" class="form-control" id="last_name"
                                                           name="last_name"
                                                          required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                           name="email"
                                                          required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" class="form-control" id="phone"
                                                           name="phone"
                                                          required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="work_phone">Work phone</label>
                                                    <input type="text" class="form-control" id="work_phone"
                                                           name="work_phone"
                                                           >
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="hire_type">Hire type</label>
                                                    <select class="form-control" id="hire_type" name="hire_type">
                                                        <option value="Social Domestic" >Social Domestic</option>
                                                        <option value="Rent to Buy" >Rent to Buy</option>
                                                        <option value="Credit Hire" >Credit Hire</option>
                                                        <option value="Insurance" >Insurance</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                           name="password"
                                                           >
                                                </div>

                                                </div>
                                                </div>


                                                <div class="form-group mt-3">
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
