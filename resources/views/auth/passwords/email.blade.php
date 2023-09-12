@extends('layouts.app')



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
                            Reset password
                        </h4>
                        <p class="head__pra mb__30">
                            Enter your email address to reset your password
                        </p>

                        <form method="post" action="{{ route('password.email') }}" class="signup__form">
                            @csrf

                            <div class="row g-4">

                                @if (session('status'))
                                    <div class="alert alert-success" >
                                        {{ session('status') }}
                                    </div>
                                @endif

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
                                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" id="email" placeholder="Your email here">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="input__grp">
                                        <button type="submit" class="cmn__btn">
                              <span>
                                {{ __('Send Password Reset Link') }}
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


