@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Settings</h3>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered card-stretch">
                            <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                <li class="nav-item">
                                    <a class="nav-link {{ $active == 'general' ? 'active' : '' }}" data-bs-toggle="tab" href="#general"><em class="icon ni ni-laptop"></em><span>General settings</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $active == 'smtp' ? 'active' : '' }}" data-bs-toggle="tab" href="#smtp"><em class="icon ni ni-user-alt"></em><span>SMTP</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  {{ $active == 'app' ? 'active' : '' }}" data-bs-toggle="tab" href="#app"><em class="icon ni ni-mobile"></em><span>Mobile App setting </span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  {{ $active == 'api' ? 'active' : '' }}" data-bs-toggle="tab" href="#api"><em class="icon ni ni-code"></em><span>Firebase, MAP & SMS API settings </span></a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link  {{ $active == 'payment-methods' ? 'active' : '' }}" data-bs-toggle="tab" href="#payment-methods"><em class="icon ni ni-money"></em><span>Payment Methods </span></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link  {{ $active == 'license' ? 'active' : '' }}" data-bs-toggle="tab" href="#license"><em class="icon ni ni-money"></em><span>License </span></a>
                                </li>

                                @if(settings('enable_mobile_slider') == 'yes')
                                <li class="nav-item">
                                    <a class="nav-link  {{ $active == 'slider' ? 'active' : '' }}" data-bs-toggle="tab" href="#slider"><em class="icon ni ni-img-fill"></em><span>Mobile Slider </span></a>
                                </li>
                                @endif

                                @if(hasTrips())
                                <li class="nav-item">
                                    <a class="nav-link  {{ $active == 'trip' ? 'active' : '' }}" data-bs-toggle="tab" href="#trip"><em class="icon ni ni-bookmark"></em><span>Trip Setting </span></a>
                                </li>
                                @endif

{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" data-bs-toggle="tab" href="#email"><em class="icon ni ni-mail-fill"></em><span>Email settings </span> </a>--}}
{{--                                </li>--}}
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane {{ $active == 'general' ? 'active' : '' }}" id="general">
                                    @include('admin.settings.partials.general')
                                </div><!--tab pan -->
                                <div class="tab-pane {{ $active == 'smtp' ? 'active' : '' }}" id="smtp">
                                    @include('admin.settings.partials.smtp')

                                </div><!--tab pan -->
                                <div class="tab-pane  {{ $active == 'app' ? 'active' : '' }}" id="app">
                                    @include('admin.settings.partials.app')

                                </div> <!-- .tab-pane -->
                                <div class="tab-pane  {{ $active == 'payment-methods' ? 'active' : '' }}" id="payment-methods">
                                    @include('admin.settings.partials.payment-methods')

                                </div> <!-- .tab-pane -->
                               <div class="tab-pane  {{ $active == 'api' ? 'active' : '' }}" id="api">
                                    @include('admin.settings.partials.api')
                                </div> <!-- .tab-pane -->


                                <div class="tab-pane  {{ $active == 'license' ? 'active' : '' }}" id="license">
                                    @include('admin.settings.partials.license')
                                </div> <!-- .tab-pane -->

                                <div class="tab-pane  {{ $active == 'slider' ? 'active' : '' }}" id="slider">
                                    @include('admin.settings.partials.slider')
                                </div> <!-- .tab-pane -->
                                <div class="tab-pane  {{ $active == 'trip' ? 'active' : '' }}" id="trip">
                                    @include('admin.settings.partials.trip')
                                </div> <!-- .tab-pane -->

                            </div><!-- .tab-content -->
                        </div><!--card-->
                    </div><!--nk-block-->
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')


@endsection
