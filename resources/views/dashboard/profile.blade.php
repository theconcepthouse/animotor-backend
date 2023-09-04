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
                            <div class="per__ittle d-flex align-items-center">
                                <h5>
                                    Personal information
                                </h5>
{{--                                <a href="javascript:void(0)" class="edit d-flex align-items-center gap-2">--}}
{{--                        <span class="icon">--}}
{{--                           <img src="/assets/img/svg/edits.svg" alt="img">--}}
{{--                        </span>--}}
{{--                                    <span class="fz-18 fw-600">--}}
{{--                           Edit--}}
{{--                        </span>--}}
{{--                                </a>--}}
                            </div>
                            <ul class="personal__details__name">

                        <span class="namebold fz-18 fw-600">
                           Account balance
                        </span>
                                    <span class="text-capitalize">
                           {{ amt($user->balance) }}
                        </span>
                                </li>
                                <li>
                        <span class="namebold fz-18 fw-600">
                           Name
                        </span>
                                    <span class="text-capitalize">
                           {{ $user->name }}
                        </span>
                                </li>

                                <li>
                        <span class="namebold fz-18 fw-600">
                           Account Status
                        </span>
                                    <span class="actbe">
                           Active
                        </span>
                                </li>
                                <li>
                        <span class="namebold fz-18 fw-600">
                           Email
                        </span>
                                    <span>
                          {{ $user->email }}
                        </span>
                                </li>
                                <li>
                        <span class="namebold fz-18 fw-600">
                           Mobile
                        </span>
                                    <span>
                             {{ $user->full_phone }}
                        </span>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- order End -->

@endsection
