@extends('dashboard.layout')

@section('style')
    <style>
        .report_incident  .form-control {
            border-radius: 50px;
            height: 60px;
            background-color: #ffffff;
        }
        .report_incident {
            background-color: #dfe2e6;
            border-radius: 40px;
            padding: 20px 30px;
        }

        .weather label {
            margin-right: 25px;
        }
        .weather input {
            margin-right: 3px;
        }

    </style>
@endsection

@section('content')

    @if(!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif



    <section class="signup__section bluar__shape__ form_border_10">
        <div class="container ">

            <div class="row align-items-center justify-content-between">

                <div class="col-12 d-flex justify-content-center mb-5">
                    <div class="justify-content-center text-center">
                        <h3>{{ $booking->car->company->name ?? 'Not Set' }}</h3>
                        <p class="mt-2">Company address : {{ $booking->car->company->company_address() ?? 'Not Set' }}.</p>
                    </div>
                </div>

                <div class="row overflow-auto">
                    <div class="step-form">
                        @foreach($steps as $item)
                            <div wire:key="{{ $item }}" wire:click="setStep({{ $loop->index + 1 }})"
                                 class="step {{ $step > $loop->index + 1 ? 'prev' : '' }} {{ $step == $loop->index + 1 ? 'active' : '' }}">
                                @if($step > $loop->index + 1)
                                    <img class="step_img" src="{{ asset('admin/assets/images/mark.png') }}" style="height: 30px"/>
                                @else
                                    <p>{{ $item }}</p>
                                @endif
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="col-md-12">

                    <form method="post" action="{{ route('rental.report_incident.store') }}" class="signup__form password__box pt__40">

                        @csrf

                        <input name="step" type="hidden" value="{{ $step }}" />
                        <input name="booking_id" type="hidden" value="{{ $booking_id }}" />
                        <input name="company_id" type="hidden" value="{{ $booking->company_id }}" />

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row g-4 report_incident">


                            @if($step == 1)
                                @include('advancerental::incidents.step_1')
                            @endif
                            @if($step == 2)
                                @include('advancerental::incidents.step_2')
                            @endif

                                @if($step == 3)
                                    @include('advancerental::incidents.step_3')
                                @endif

                                @if($step == 4)
                                    @include('advancerental::incidents.step_4')
                                @endif

                                @if($step == 5)
                                    @include('advancerental::incidents.step_5')
                                @endif

                                @if($step == 6)
                                    @include('advancerental::incidents.step_6')
                                @endif

                            <div class="col-lg-12">
                                <div class="d-flex justify-content-center">
                                    <div class="input__grp input_btn mt-3">
                                        <button type="submit" class="cmn__btn btn_rounded">
                               <span>
                                  {{ $step == 6 ? 'Submit' : 'Next' }}
                               </span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

    </section>


{{--    <div class="modal fade" id="termsModal">--}}
{{--        <div class="modal-dialog modal-lg">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header justify-content-center">--}}
{{--                    <h5 class="modal-title text-center">Warning</h5>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <!-- Accordion -->--}}
{{--                     <iframe src="<?php echo e(url('/accident_report_warning')); ?>?app" frameborder="0" style="width: 100%; height: 70vh;"></iframe>--}}


{{--                    <iframe src="{{ url('/accident_report_warning') }}?app" frameborder="0" style="width: 100%; height: 70vh;"></iframe>--}}

{{--                </div>--}}
{{--                <div class="modal-footer justify-content-center">--}}
{{--                    <button type="button" class="btn btn-success btn-lg" data-bs-dismiss="modal">Accept</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection

@section('js')
    @include('advancerental::partials.upload')

    @if($step == 1)
    <script>
        $(document).ready(function () {
            $('#termsModal').modal('show');
        });
    </script>
    @endif

@endsection
