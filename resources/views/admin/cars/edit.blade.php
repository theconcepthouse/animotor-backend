@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md- mx-auto">

                        <livewire:admin.cars.form :car="$car" :car_types="$car_types" :car_models="$car_models" :car_makes="$car_makes" />



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
            onChangeMake()
        });

        document.addEventListener('livewire:navigated', function () {
            $(document).ready(function() {
                onChangeMake()
            });
        });

        function onChangeMake() {
            $('#make').on('change', function() {
                var makeId = $(this).val();
                // alert(makeId)
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
            })
        }
    </script>



@endsection
