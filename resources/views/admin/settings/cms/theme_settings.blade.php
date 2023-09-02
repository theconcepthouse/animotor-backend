@extends('admin.layout.app')

@section('style')
    <style>
        .radio-input-form {
            display: flex;
            flex-wrap: wrap;
        }

        .nav img {
            width: 100%;
        }
        .radio-input-form label {
            margin: 10px;
            cursor: pointer;
        }

        .radio-input-form img {
            border: 2px solid transparent;
            transition: border-color 0.2s ease;
        }

        .radio-input-form input[type="radio"] {
            display: none;
        }

        .radio-input-form input[type="radio"]:checked + img {
            border-color: green;
        }
    </style>
@endsection

@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Theme setting</h3>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered card-stretch">
                            <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                <li class="nav-item">
                                    <a class="nav-link {{ $active == 'nav' ? 'active' : '' }}" data-bs-toggle="tab" href="#nav"><em class="icon ni ni-laptop"></em><span>Nav Style</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $active == 'home_banner' ? 'active' : '' }}" data-bs-toggle="tab" href="#home_banner"><em class="icon ni ni-code"></em><span>Home Banner</span></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ $active == 'footer' ? 'active' : '' }}" data-bs-toggle="tab" href="#footer"><em class="icon ni ni-code"></em><span>Footer setting</span></a>
                                </li>
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link  {{ $active == 'app' ? 'active' : '' }}" data-bs-toggle="tab" href="#app"><em class="icon ni ni-mobile"></em><span>Mobile App setting </span></a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link  {{ $active == 'payment-methods' ? 'active' : '' }}" data-bs-toggle="tab" href="#payment-methods"><em class="icon ni ni-money"></em><span>Payment Methods </span></a>--}}
{{--                                </li>--}}


                                {{--                                <li class="nav-item">--}}
                                {{--                                    <a class="nav-link" data-bs-toggle="tab" href="#email"><em class="icon ni ni-mail-fill"></em><span>Email settings </span> </a>--}}
                                {{--                                </li>--}}
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane {{ $active == 'nav' ? 'active' : '' }}" id="nav">
                                    @include('admin.settings.partials.nav')
                                </div><!--tab pan -->
                                <div class="tab-pane {{ $active == 'home_banner' ? 'active' : '' }}" id="home_banner">
                                    @include('admin.settings.partials.home_banner')

                                </div><!--tab pan -->

                              <div class="tab-pane {{ $active == 'footer' ? 'active' : '' }}" id="footer">
                                    @include('admin.settings.partials.footer')

                                </div><!--tab pan -->








                                <div class="tab-pane  {{ $active == 'app' ? 'active' : '' }}" id="app">
                                    @include('admin.settings.partials.app')

                                </div> <!-- .tab-pane -->
                                <div class="tab-pane  {{ $active == 'payment-methods' ? 'active' : '' }}" id="payment-methods">
                                    @include('admin.settings.partials.payment-methods')

                                </div> <!-- .tab-pane -->
                                <div class="tab-pane" id="email">
                                    <div class="card-inner pt-0">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">Email-Settings</h4>
                                                <p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
                                            </div>
                                        </div>
                                        <div class="row g-gs">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">E-mail to Lead</label>
                                                    <ul class="custom-control-group g-3 align-center">
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="lead-dis">
                                                                <label class="custom-control-label" for="lead-dis">About Discount</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="lead-pro">
                                                                <label class="custom-control-label" for="lead-pro">About Product</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="lead-det">
                                                                <label class="custom-control-label" for="lead-det">Product Details</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- .col -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">E-mail to Customers</label>
                                                    <ul class="custom-control-group g-3 align-center">
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="cus-dis">
                                                                <label class="custom-control-label" for="cus-dis">About Discount</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="cus-pro">
                                                                <label class="custom-control-label" for="cus-pro">About Product</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="cus-det">
                                                                <label class="custom-control-label" for="cus-det">Product Details</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- .col -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">E-mail to Employee</label>
                                                    <ul class="custom-control-group g-3 align-center">
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="emp-holiday">
                                                                <label class="custom-control-label" for="emp-holiday">Holiday</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="emp-policy">
                                                                <label class="custom-control-label" for="emp-policy">Updated Policy</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="emp-salary">
                                                                <label class="custom-control-label" for="emp-salary">About Salary</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- .col -->
                                            <div class="col-sm-6 col-lg-4">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <div class="form-icon form-icon-right">
                                                            <em class="icon ni ni-search"></em>
                                                        </div>
                                                        <input type="text" class="form-control" id="default-04" placeholder="E-mail from a name">
                                                    </div>
                                                </div>
                                            </div><!-- .col -->
                                        </div> <!-- .row -->
                                        <div class="row g-3">
                                            <div class="col-lg-7">
                                                <div class="form-group mt-2">
                                                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                </div>
                                            </div><!-- .col -->
                                        </div><!-- .row -->
                                    </div>
                                </div><!-- .tab-pane -->
                            </div><!-- .tab-content -->
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
