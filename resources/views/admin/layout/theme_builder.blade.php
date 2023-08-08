<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ settings('site_name') }} | Template</title>

    <link rel="shortcut icon" href="/assets_init/img/favicon.png">

    <link rel="stylesheet" href="/assets_init/css/bootstrap.min.css">

    <link rel="stylesheet" href="/assets_init/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets_init/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="/assets_init/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="/assets_init/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="/assets_init/plugins/aos/aos.css">

    <link rel="stylesheet" href="/assets_init/css/feather.css">

    <link rel="stylesheet" href="/assets_init/css/owl.carousel.min.css">

    <link rel="stylesheet" href="/assets_init/css/style.css">

    @yield('style')

</head>
<body>
<div class="main-wrapper">

    <header class="header">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a id="mobile_btn" href="javascript:void(0);">
                        <span class="bar-icon">
<span></span>
<span></span>
<span></span>
</span>
                    </a>
                    <a href="#" class="navbar-brand logo">
                        <img style="height: 50px" src="{{ settings('light_logo',asset('default/logo.png')) }}" class="img-fluid" alt="Logo">
                    </a>
                    <a href="#" class="navbar-brand logo-small">
                        <img style="height: 50px" src="{{ settings('light_logo',asset('default/logo.png')) }}" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="main-menu-wrapper">
                    <div class="menu-header">
                        <a href="#" class="menu-logo">
                            <img style="height: 50px" src="{{ settings('light_logo',asset('default/logo.png')) }}" class="img-fluid" alt="Logo">
                        </a>
                        <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i></a>
                    </div>
                    <ul class="main-nav">

                        <li class="login-link">
                            <a href="register.html">Sign Up</a>
                        </li>
                        <li class="login-link">
                            <a data-bs-toggle="modal" href="#addNew">Add Component</a>
                        </li>
                    </ul>
                </div>
                <ul class="nav header-navbar-rht">
                    <li class="nav-item">
                        <a class="nav-link header-login" data-bs-toggle="modal" href="#addNew"><span><i class="fa-regular fa-plus"></i></span>Add Component</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link header-reg" href="{{ route('admin.dashboard') }}"><span><i class="fa-solid fa-close"></i></span>Exit builder</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>



    @yield('content')


    <div class="modal fade" role="dialog" id="addNew">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md" style="background-color: #e2e4e9;">
                    <h5 class="title">Add component</h5>

                    <form action="{{ route('admin.setting.component.store') }}" method="POST" enctype="multipart/form-data">
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


                        <div class="row gy-4 pt-4">

                           @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-12',  'fieldName' => 'title','title' => 'Component Title'])
                           @include('admin.partials.form.textarea', ['attributes' => 'required', 'colSize' => 'col-md-12',  'fieldName' => 'content','title' => 'Component Content'])


                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-lg btn-primary">Save </button>
                        </div>
                    </form>


                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->


</div>

<div class="progress-wrap active-progress">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewbox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;"></path>
    </svg>
</div>


<script src="/assets_init/js/jquery-3.6.4.min.js"></script>

<script src="/assets_init/js/bootstrap.bundle.min.js"></script>

<script src="/assets_init/js/jquery.waypoints.js"></script>
<script src="/assets_init/js/jquery.counterup.min.js"></script>

<script src="/assets_init/plugins/select2/js/select2.min.js"></script>

<script src="/assets_init/plugins/aos/aos.js"></script>

<script src="/assets_init/js/backToTop.js"></script>

<script src="/assets_init/plugins/moment/moment.min.js"></script>
<script src="/assets_init/js/bootstrap-datetimepicker.min.js"></script>

<script src="/assets_init/js/owl.carousel.min.js"></script>

<script src="/assets_init/js/script.js"></script>


<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

@yield('js')




</body>
</html>
