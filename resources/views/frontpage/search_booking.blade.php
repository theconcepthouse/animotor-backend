@extends('frontpage.layout')


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
                            Manage my booking
                        </h4>
                        <p class="head__pra mb__30">
                            Just fill in your details to confirm a quote - or to view. change or cancel a booking.
                        </p>
                        <form method="post" action="{{ route('search_booking') }}" class="signup__form">
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

                                    @if(session()->has('error'))
                                        <div class="alert alert-danger alert-dismissible mb-4">
                                            <p>  {{ session()->get('error') }}</p>
                                        </div>

                                    @endif





                                <div class="col-lg-12">
                                    <div class="input__grp">
                                        <label for="email">Enter Your Email</label>
                                        <div class="form-group">
                                            <input type="email" required class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Your email here">
                                        </div>
                                    </div>
                                </div>



                                    <div class="col-lg-12">
                                    <div class="input__grp">
                                        <label for="reference">Booking reference number</label>
                                        <div class="form-group">
                                            <input required type="text" class="form-control" name="reference" value="{{ old('reference') }}" id="reference" placeholder="Your booking reference here">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="input__grp">
                                        <button type="submit" class="cmn__btn">
                              <span>
                                 Find my booking
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
                        <img src="{{ asset('assets/img/booking/search.png') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- signUp End -->


@endsection
