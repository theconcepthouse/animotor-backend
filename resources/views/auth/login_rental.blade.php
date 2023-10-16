
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ settings('site_name') }}">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ settings('favicon') }}">
    <!-- Page Title  -->
    <title>Login | {{ settings('site_name', env('APP_NAME')) }} Dashboard </title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashlite.css?ver=3.1.1') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('admin/assets/css/theme.css?ver=3.1.1') }}">

    <style>

        @media (min-width: 576px){
            .nk-auth-body {
                padding: 4rem 7rem;
            }
            .wide-xs {
                max-width: 720px !important;
            }
        }

    </style>
</head>

<body class="nk-body bg-gray-100 npc-general pg-auth">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- wrap @s -->
        <div class="nk-wrap nk-wrap-nosidebar">
            <!-- content @s -->
            <div class="nk-content ">
                <div class="nk-block nk-block-middle nk-auth-body  wide-xs shadow bg-white">
                    <div class="brand-logo pb-4 text-center">
                        <a href="/" class="logo-link">
                            <img height="150" src="{{ settings('light_logo',asset('default/logo.png')) }}" />
{{--                            <h3 style="font-weight: bolder" class="text-capitalize">{{ env('APP_NAME') }}</h3>--}}
                            {{--                            <img class="logo-light logo-img logo-img-lg" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">--}}
                            {{--                            <img class="logo-dark logo-img logo-img-lg" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">--}}
                            {{--                        --}}
                        </a>
                    </div>
                    <div class="card card-bordered">
                        <div class="card-inner card-inner-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title text-center">Login to get started</h4>

                                </div>
                            </div>
                            <form action="{{ route('login') }}" method="POST">
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
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="default-01">Email</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input type="email" name="email" class="form-control form-control-lg" id="default-01" placeholder="Enter your email address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="password">Password</label>
                                        @if (Route::has('password.request'))
                                            <a class="link link-primary link-sm" href="{{ route('password.request') }}">
                                                {{ __('Forgot password?') }}
                                            </a>
                                        @endif
                                    </div>
                                    <div class="form-control-wrap">
                                        <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter your password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-lg btn-primary btn-block">Sign in</button>
                                </div>
                            </form>

                            <div class="form-note-s2 text-center pt-4">
                               <p>OR</p>

                                <a href="/register" class="btn btn-lg btn-primary">Sign Up</a>

                                <p class="mt-3">By signing in you agree to our <a href="/terms">Terms & Conditions</a>  and <a href="/privacy"> Privacy Policy</a></p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- wrap @e -->
        </div>
        <!-- content @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="{{ asset('admin/assets/js/bundle.js?ver=3.1.1') }}"></script>
<script src="{{ asset('admin/assets/js/scripts.js?ver=3.1.1') }}"></script>
<!-- select region modal -->

<script>
    $(document).ready(function() {
        // Select the password input field
        var passwordInput = $('#password');

        // Listen for keyup events on the password input
        passwordInput.on('keyup', function() {
            // Get the current value of the input
            var inputValue = $(this).val();

            // Remove spaces from the input value
            var trimmedValue = inputValue.replace(/\s/g, '');

            // Update the input field with the trimmed value
            $(this).val(trimmedValue);
        });
    });
</script>
</body>
</html>
