@extends('layouts.app')





@section('content')

    @if(!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif

    <section class="signup__section bluar__shape">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-6 col-lg-6">
                    <div class="signup__boxes">
                        <h4>
                            {{ __('Reset Password') }}
                        </h4>
                        <p class="head__pra mb__30">
                            Enter your email address to reset your password
                        </p>

                        <form method="post" action="{{ route('password.update') }}" class="signup__form">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

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
                                        <input value="{{ $email ?? old('email') }}" type="email" name="email" id="email" placeholder="Your email here">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="input__grp">
                                        <label for="password">New password</label>
                                        <input type="password" name="password" id="password" placeholder="Your new password">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input__grp">
                                        <label for="password">Confirm password</label>
                                        <input type="password" name="password_confirmation" id="password" required placeholder="Confirm password">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="input__grp">
                                        <button type="submit" class="cmn__btn">
                              <span>
                                 {{ __('Reset Password') }}
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

@endsection

