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
                                    <h4 class="title nk-block-title">{{ 'Add car' }}</h4>
                                </div>

                                <div class="nk-block-head-content">
                                    <a href="{{ route('admin.cars.index') }}" wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                    <a href="{{ route('admin.cars.index') }}" wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                </div>
                            </div>
                            <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">

                                            <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
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


                                                @include('admin.cars.form', ['car' => null, 'car_types' => $car_types, 'car_makes' => $car_makes])


                                                <div class="form-group mt-3">
                                                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
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


        {{--function populateModels() {--}}
        {{--    $('#make').on('change', function() {--}}
        {{--        var makeId = $(this).val();--}}
        {{--        if (makeId) {--}}
        {{--            $.ajax({--}}
        {{--                url: "{{ route('admin.api.get.models') }}?make_id=" + makeId,--}}
        {{--                type: 'GET',--}}
        {{--                dataType: 'json',--}}
        {{--                success: function(data) {--}}
        {{--                    $('#model').empty().append('<option value="">Select Model</option>');--}}
        {{--                    if (data.data.length > 0) {--}}
        {{--                        $.each(data.data, function(index, model) {--}}
        {{--                            $('#model').append('<option value="' + model.name + '">' + model.name + '</option>');--}}
        {{--                        });--}}
        {{--                    }--}}
        {{--                }--}}
        {{--            });--}}
        {{--        } else {--}}
        {{--            $('#model').empty().append('<option value="">Select Model</option>');--}}
        {{--        }--}}
        {{--    });--}}
        {{--}--}}

        function populateModels() {
            var makeElement = document.getElementById('make');
            var modelElement = document.getElementById('model');

            makeElement.addEventListener('change', function () {
                var makeId = this.value;
                if (makeId) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', "{{ route('admin.api.get.models') }}?make_id=" + makeId, true);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            var data = JSON.parse(xhr.responseText);
                            modelElement.innerHTML = '<option value="">Select Model</option>';
                            if (data.data.length > 0) {
                                data.data.forEach(function (model) {
                                    var option = document.createElement('option');
                                    option.value = model.name;
                                    option.text = model.name;
                                    modelElement.appendChild(option);
                                });
                            }
                        }
                    };
                    xhr.send();
                } else {
                    modelElement.innerHTML = '<option value="">Select Model</option>';
                }
            });
        }

        // Call the function after the DOM is loaded
        document.addEventListener('DOMContentLoaded', function () {
            populateModels();
        });


        document.addEventListener('livewire:navigated', function () {
            // Call the function when livewire:navigated event is triggered
            populateModels();

            $('#make').on('select2:select', function (e) {
                alert('heeeeeeeeeeeee')
            })
        });
    </script>




@endsection
