@extends('layouts.dash')


@section('content')


    <!-- order here -->
    <section class="personal__information pt-120 pb__60">
        <div class="container">
            <div class="row justify-content-center">
                @include('dashboard.partials.sidebar')

                <div class="col-md-9">
                    <div class="personal__infobody">
                        <div class="personal__info__box">
                            <div class="per__ittle border__bottom pb__20 d-flex align-items-center">
                                <h5>
                                    Wallet top up
                                </h5>
                            </div>
                            <div class="debit__creadit d-flex align-items-center">



                                @if(auth()->user()->monify)
                                    <div class="row">
                                    <div class="col-12">
                                        <h5>Virtual accounts</h5>
                                    </div>
                                    @foreach(auth()->user()->monify as $item)
                                    <div class="col-12">
                                        <div class="bank_info">
                                            <h6>{{ $item?->bankName }}</h6>
                                            <p>{{ $item?->accountName }}</p>
                                            <p>{{ $item?->accountNumber }}</p>
                                        </div>

                                    </div>
                                    @endforeach
                                    </div>
                                @endif

                                <div class="row">

                                    <form method="post" action="{{ route('payment.init') }}" class="signup__form pt__40">
                                        @csrf
                                        <div class="row g-4">
                                            <div class="col-md-12">
                                                <div class="input__grp">
                                                    <label for="fname">Amount</label>
                                                    <input required type="number" name="amount" min="100" placeholder="">
                                                    <input required type="hidden" name="user_id" value="{{ auth()->id() }}">
                                                    <input required type="hidden" name="web_user" value="{{ url()->current() }}">
                                                    <div>@error('first_name') <span class="text-danger">{{ $message }}</span> @enderror</div>
                                                </div>
                                            </div>
                                             <div class="col-md-12">
                                                <div class="input__grp">
                                                    <label for="fname">Payment method</label>
                                                    <select required name="payment_method" class="form-control">
                                                        @if(is_array($active_methods) && in_array('paystack', $active_methods))
                                                        <option value="paystack">Paystack</option>
                                                        @endif
                                                            @if(is_array($active_methods) && in_array('flutterwave', $active_methods))
                                                            <option value="flutterwave">Flutterwave</option>
                                                            @endif
                                                    </select>
                                                    <div>@error('first_name') <span class="text-danger">{{ $message }}</span> @enderror</div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <button type="submit" class="cmn__btn">
                                        <span>
                                            Online payment
                                        </span>
                                                </button>
                                            </div>

                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- order End -->

@endsection
