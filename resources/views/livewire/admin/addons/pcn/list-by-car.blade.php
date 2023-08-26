<div class="nk-block nk-block-lg">

    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">{{ __('admin.pcns') }}</h4>
            </div>


            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-search"></em>
                                    </div>
                                    <input wire:model.live="search" type="text" class="form-control" id="default-04" placeholder="PCN number search">
                                </div>
                            </li>

                        </ul>
                    </div>
                </div><!-- .toggle-wrap -->
            </div><!-- .nk-block-head-content -->

        </div>

    </div>


    <div class="row">
        @foreach($data as $item)
            <div class="col-lg-4 mt-3">
                <a wire:navigate href="{{ route('admin.pcn.show', $item->id) }}">
                    <div class="card card-bordered">
                        <div class="card-inner bg-white">
                            <h5 class="card-title btn btn-warning rounded">{{ $item->vrm }}</h5>
                            <div class="d-flex mt-3 justify-content-between">
                                <div>
                                    <p><strong>{{ __('admin.pcn_no') }}</strong>
                                        <br/>
                                        {{ $item->pcn_no }}
                                    </p>
                                </div>
                                <div>
                                    <p><strong>{{ __('admin.date_time') }}</strong>
                                        <br>
                                        {{ $item->date_time }}
                                    </p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p><strong>{{ __('admin.offence_type') }}</strong>
                                    <br/>
                                    {{ $item->offence_type }}
                                </p>

                                <p><strong>{{ __('admin.location') }}</strong>
                                    <br/>
                                    {{ $item->location }}
                                </p>
                            </div>


                            <div class="d-flex mt-3 justify-content-between">
                                <div>
                                    <p><strong>{{ __('admin.notice_issue_date') }}</strong>
                                        <br/>
                                        {{ $item->notice_issue_date }}
                                    </p>
                                </div>
                                <div>
                                    <p><strong>{{ __('admin.driver_name') }}</strong>
                                        <br/>
                                        {{ $item?->booking?->customer?->name }}
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex mt-3 justify-content-between">
                                <div>
                                    <p><strong>{{ __('admin.payment_deadline') }}</strong>
                                        <br/>
                                        <span class="text-danger">{{ $item->payment_dead_line }}</span>
                                    </p>
                                </div>
                                <div>
                                    <p><strong>{{ __('admin.appeal_dead_line') }}</strong>
                                        <br/><span class="text-danger">{{ $item?->appeal_dead_line }}</span></p>
                                </div>
                            </div>

                            <div class="mt-3">
                                <p><strong>{{ __('admin.status') }}</strong></p>
                                <p>{{ $item->status }}</p>
                            </div>

                        </div>
                    </div>
                </a>
        </div>
        @endforeach

        <div class="col-12 mt-5">

            <div class="d-flex mt-2">
                {!! $data->links() !!}
            </div>
        </div>
    </div>

</div>
