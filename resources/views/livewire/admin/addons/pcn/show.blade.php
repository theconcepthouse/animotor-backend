<div class="nk-block nk-block-lg">

    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">{{ __('admin.pcns') }}</h4>
            </div>


            <div class="nk-block-head-content">
                <a href="{{ url()->previous() }}" wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                <a href="{{ url()->previous() }}" wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
            </div>
        </div>

    </div>


    <div class="row">

        <div class="col-lg-12 mt-3">

                    <div class="card- card-bordered-">
                        <div class="card-inner shadow bg-white">
                            <div class="row">

                                <div class="col-3">
                                    <h6>{{ __('admin.pcn_no') }}</h6>
                                    <p>{{ $item->pcn_no }}</p>
                                    <h5 class="card-title btn btn-warning rounded">{{ $item->vrm }}</h5>
                                    <p><strong>{{ __('admin.make') }} : {{ $item?->car->make }}</strong></p>
                                    <p><strong>{{ __('admin.model') }} : {{ $item?->car->model }}</strong></p>

                                   <p><strong>{{ __('admin.date_time') }}</strong></p>
                                    <p>{{ $item->date_time }}</p>

                                   <p><strong>{{ __('admin.status') }}</strong></p>
                                    <p>{{ $item->status }}</p>


                                </div>
                                <div class="col-6 px-5">

                                    <div style="margin-top: 50px" class="d-flex mt-3 justify-content-between">
                                        <div>
                                            <p><strong>{{ __('admin.offence_type') }}</strong>
                                                <br/>
                                                {{ $item->offence_type }}
                                            </p>
                                        </div>
                                        <div>
                                            <p><strong>{{ __('admin.location') }}</strong>
                                                <br>
                                                {{ $item->location }}
                                            </p>
                                        </div>
                                    </div>
                                    <div style="margin-top: 50px" class="d-flex mt-6 justify-content-between">
                                        <p><strong>{{ __('admin.payment_deadline') }}</strong>
                                            <br/>
                                            {{ $item->payment_dead_line }}
                                        </p>

                                        <p><strong>{{ __('admin.appeal_dead_line') }}</strong>
                                            <br/>
                                            {{ $item->appeal_dead_line }}
                                        </p>
                                    </div>
                                     <div style="margin-top: 50px" class="mt-6">
                                        <p><strong>{{ __('admin.notice_issue_date') }}</strong>
                                            <br/>
                                            {{ $item->notice_issue_date }}
                                        </p>

                                    </div>

                                </div>


                                <div class="col-3">

                                    <a target="_blank" href="/admin/assets/images/file.png">
                                        <img src="/admin/assets/images/file.png" />
                                    </a>

                                </div>

                            </div>


                        </div>
                    </div>
            </div>


        <div class="col-12 mt-5">
            <div class="card-inner shadow bg-white">
                <div class="row">

                    <div class="col-2">
                        <p><strong>{{ __('admin.driver_first_name') }} </strong></p>
                        <p>{{ $item?->booking?->customer?->first_name }}</p>

                        <p><strong>{{ __('admin.phone_number') }} </strong></p>
                        <p>{{ $item?->booking?->customer?->full_phone }}</p>


                    </div>
                    <div class="col-2">
                        <p><strong>{{ __('admin.driver_last_name') }} </strong></p>
                        <p>{{ $item?->booking?->customer?->first_name }}</p>
                    </div>
                    <div class="col-8 px-5">

                        <div style="margin-top: 50px" class="d-flex mt-3 justify-content-between">
                            <div>
                                <p><strong>{{ __('admin.hire_agreement_no') }}</strong>
                                    <br/>
                                    {{ $item->booking->confirmation_no }}
                                </p>
                            </div>
                            <div>
                                <p><strong>{{ __('admin.agreement_start_date') }}</strong>
                                    <br>
                                    {{ $item?->booking?->pick_up_date }}
                                </p>
                            </div>
                            <div>
                                <p><strong>{{ __('admin.agreement_end_date') }}</strong>
                                    <br>
                                    {{ $item?->booking?->drop_off_date }}
                                </p>
                            </div>
                        </div>

                    </div>


                </div>


            </div>
        </div>

        <div class="col-md-12 mt-5">
            <h5>{{ __('admin.pcn_status_history') }}</h5>

            <div class="card card-bordered mt-2">
                <div class="card-inner  bg-white">
                    <div class="row">

                        <div class="col-12">
                            <h6>10 August 2023</h6>
                            <p><strong>Notice of Debt Registration issued</strong></p>
                            <p>A debt has been registered and an order for recovery has been issued</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
