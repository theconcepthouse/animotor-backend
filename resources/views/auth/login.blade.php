@extends('layouts.app')

@section('page_title','Login')

@section('content')

    @if(!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif

    <!-- signUp here -->
    <section class="signup__section bluar__shape___">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-6 col-lg-6">
                    <div class="signup__boxes">
                        <h4>
                            Sign in to {{ settings('site_name') }}
                        </h4>
                        <p class="head__pra mb__30">
                            Sign in to your account
                        </p>
                        <form method="post" action="{{ route('login') }}" class="signup__form">
                            @csrf

                            <div class="row g-4">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="col-lg-12">
                                    <div class="input__grp">
                                        <label for="email">Enter Your Email ID</label>
                                        <div class="form-group mt-2">
                                            <input class="form-control" type="email" name="email" value="{{ old('email') }}" id="email" placeholder="Your email here">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input__grp password-toggle">
                                        <label for="pass">Enter Your Password</label>
                                        <div class="form-group mt-2">
                                        <input class="form-control" name="password" type="password" id="password"  placeholder="Your Password">
                                        <div class="toggle-btn" id="togglePassword">
                                            <i class="fa fa-eye"></i>

                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('password.request') }}" class="forgot">
                                    Forgot Password?
                                </a>
                                <div class="col-lg-12">
                                    <div class="input__grp">
                                        <button type="submit" class="cmn__btn">
                              <span>
                                 Sign In
                              </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="signup__thumb">
                        <img src="/assets/img/signup/signup.png" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- signUp End -->


@endsection
