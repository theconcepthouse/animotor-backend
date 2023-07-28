@extends('admin.layout.app')

@section('style')

@endsection

@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Custom CSS</h3>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered- card-stretch">
                            <form method="post" action="{{ route('admin.settings.css.store') }}">
                                @csrf
                                <textarea class="form-control" name="custom_css" rows="30">{{ $customCssContent }}</textarea>
                                <br>


                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-lg btn-primary">Save </button>
                                </div>

                            </form>
                        </div><!--card-->
                    </div><!--nk-block-->
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>


    <script>
        $('.lfm').filemanager('image');




        // Get all the radio inputs
        const radioInputs = document.querySelectorAll('.radio-input-form input[type="radio"]');

        // Attach click event listeners to each image
        radioInputs.forEach(input => {
            const image = input.nextElementSibling;
            image.addEventListener('click', () => {
                // When the image is clicked, check the associated radio input
                input.checked = true;
                updateImageBorders();
            });
        });

        // Function to update image borders based on the checked radio input
        function updateImageBorders() {
            radioInputs.forEach(input => {
                const image = input.nextElementSibling;
                image.style.borderColor = input.checked ? 'green' : 'transparent';
            });
        }

        updateImageBorders();
    </script>

@endsection
