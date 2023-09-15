@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title"> <strong class="text-primary small">{{ $trip->reference }}</strong></h3>
                                <div class="nk-block-des text-soft">
                                    <ul class="list-inline">
                                        <li>Booked on : <span class="text-base">{{ $trip->created_at->format('d-M-Y H:i:s') }}</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="nk-block-head-content">
                                <a href="{{ url()->previous() }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                <a href="{{ route('admin.trip.delete',$trip->id) }}" class="btn btn-danger bg-white d-none d-sm-inline-flex"><span>Delete Trip</span></a>
                                <a href="{{ url()->previous() }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-aside-wrap">
                                <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-xxl" data-content="userAside" data-toggle-screen="xxl" data-toggle-overlay="true" data-toggle-body="true">
                                    <div class="card-inner-group" data-simplebar>
                                        <div class="card-inner">
                                            <div class="user-card user-card-s2">
                                                <div class="user-avatar lg bg-primary">
                                                     <img src="{{ $trip?->customer?->avatar }}" />
                                                </div>
                                                <div class="user-info">
                                                    <div class="badge bg-outline-light rounded-pill ucap">Customer</div>
                                                    <h5 class="text-capitalize">{{ $trip?->customer?->name }}</h5>
                                                    <span class="sub-text">{{ $trip?->customer?->email }}</span>
                                                    <span class="sub-text">{{ $trip?->customer?->phone }}</span>
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->
                                        <div class="card-inner">
                                            <div class="overline-title-alt mb-2"> From Address</div>
                                            <div class="profile-balance">
                                                <div class="profile-balance-group gx-4">
                                                    <div class="profile-balance-sub">
                                                        <div class="profile-balance-amount">
                                                            <div class="">
                                                                {{ $trip->origin }}
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->

                                        @if($trip->driver)
                                        <div class="card-inner">
                                            <div class="overline-title-alt mb-2"> Driver</div>
                                            <div class="profile-balance">
                                                <div class="profile-balance-group gx-4">
                                                    <div class="profile-balance-sub">
                                                        <div class="profile-balance-amount">
                                                            <div class="">
                                                                <a href="{{ route('admin.user.show', $trip->driver_id) }}">
                                                                    {{ $trip->driver->name }} ({{ $trip->driver->full_phone }})
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->
                                        @endif
                                        <div class="card-inner">
                                            <div class="row text-center">
                                                <div class="col-4">
                                                    <div class="profile-stats">
                                                        <span class="amount">{{ $trip->currency }}{{ $trip->grand_total }}</span>
                                                        <span class="sub-text">Grand Total</span>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="profile-stats">
                                                        <span class="amount">{{ $trip->currency }}{{ $trip->tax }}</span>
                                                        <span class="sub-text">Tax</span>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="profile-stats">
                                                        <span class="amount">{{ $trip->discount }} %</span>
                                                        <span class="sub-text">Discount</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->
                                    </div><!-- .card-inner -->
                                </div><!-- .card-aside -->

                                <div class="card-content">
                                    <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#info"><span>Other details</span></a>
                                        </li>

                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="info">
                                            <div class="card-inner pt-0">
                                                <div class="nk-block">
                                                    <div class="nk-block-head">
                                                        <h5 class="title">Personal Information</h5>
                                                    </div><!-- .nk-block-head -->
                                                    <div class="profile-ud-list">

                                                        <div class="profile-ud-item">
                                                        <div class="profile-ud wider">

                                                            <span class="profile-ud-label">Trip status</span>
                                                            <span class="profile-ud-value">{{ $trip->status }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-ud-item">
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">Payment status</span>
                                                                <span class="profile-ud-value">{{ $trip->payment_status }}</span>

                                                            </div>
                                                        </div>
                                                        <div class="profile-ud-item">
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">Payment method</span>
                                                                <span class="profile-ud-value">{{ $trip->payment_method }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-ud-item">
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">Ride Type</span>
                                                                <span class="profile-ud-value">{{ $trip->ride_type }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="profile-ud-item">
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">Service Type</span>
                                                                <span class="profile-ud-value">{{ $trip?->service?->name }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="profile-ud-item">
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">Service region</span>
                                                                <span class="profile-ud-value">{{ $trip?->region?->name ?? 'Not set' }}</span>
                                                            </div>
                                                        </div>

                                                    </div><!-- .profile-ud-list -->
                                                    <div class="nk-block-head mt-4">
                                                        <h5 class="title">Billing Information</h5>
                                                    </div><!-- .nk-block-head -->
                                                    <div class="profile-ud-list">

                                                        <div class="profile-ud-item">
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">Base price</span>
                                                                <span class="profile-ud-value">{{ $trip->currency }}{{ $trip->base_price }}</span>
                                                            </div>
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">Time price</span>
                                                                <span class="profile-ud-value">{{ $trip->currency }}{{ $trip->time_price }}</span>
                                                            </div>
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">Distance price</span>
                                                                <span class="profile-ud-value">{{ $trip->currency }}{{ $trip->distance_price }}</span>
                                                            </div>
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">Tax</span>
                                                                <span class="profile-ud-value">{{ $trip->currency }}{{ $trip->tax }}</span>
                                                            </div>
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">Discount</span>
                                                                <span class="profile-ud-value">{{ $trip->currency }}{{ $trip->discount }}</span>
                                                            </div>
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">Grand Total </span>
                                                                <span class="profile-ud-value">{{ $trip->currency }}{{ $trip->grand_total }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-block -->
                                            </div>
                                        </div><!--tab pan -->

                                    </div><!-- .tab-content -->
                                </div>

                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>


@endsection
