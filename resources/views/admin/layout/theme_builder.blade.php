<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ settings('site_name') }} | Template</title>

    <link rel="shortcut icon" href="/assets/img/favicon.png">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="/assets/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="/assets/plugins/aos/aos.css">

    <link rel="stylesheet" href="/assets/css/feather.css">

    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">

    <link rel="stylesheet" href="/assets/css/style.css">

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
                            <a href="login.html">Add Component</a>
                        </li>
                    </ul>
                </div>
                <ul class="nav header-navbar-rht">
                    <li class="nav-item">
                        <a class="nav-link header-login" href="login.html"><span><i class="fa-regular fa-plus"></i></span>Add Component</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link header-reg" href="{{ route('admin.dashboard') }}"><span><i class="fa-solid fa-close"></i></span>Exit builder</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>



    @yield('content')

</div>

<div class="progress-wrap active-progress">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewbox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;"></path>
    </svg>
</div>


<script src="/assets/js/jquery-3.6.4.min.js"></script>

<script src="/assets/js/bootstrap.bundle.min.js"></script>

<script src="/assets/js/jquery.waypoints.js"></script>
<script src="/assets/js/jquery.counterup.min.js"></script>

<script src="/assets/plugins/select2/js/select2.min.js"></script>

<script src="/assets/plugins/aos/aos.js"></script>

<script src="/assets/js/backToTop.js"></script>

<script src="/assets/plugins/moment/moment.min.js"></script>
<script src="/assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="/assets/js/owl.carousel.min.js"></script>

<script src="/assets/js/script.js"></script>


<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

@yield('js')




</body>
</html>
