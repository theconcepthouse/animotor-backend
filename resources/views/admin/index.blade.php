@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">


                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Hi, {{ auth()->user()->name }}</h3>
                                <div class="nk-block-des text-soft">
                                    <p>Welcome to
                                        {{ isOwner() ? auth()->user()->company->name : settings('site_name', env('APP_NAME')) }} dashboard
                                    </p>
                                </div>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                   @section('hide')
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-bs-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span class="d-none d-md-inline">Last</span> 30 Days</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><span>Last 30 Days</span></a></li>
                                                            <li><a href="#"><span>Last 6 Months</span></a></li>
                                                            <li><a href="#"><span>Last 1 Years</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Reports</span></a></li>
                                        </ul>
                                    </div>
                                    @endsection
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div>


                    @if(isAdmin())
                        @include('admin.components.widgets.alerts')

                    @endif

                    <div class="nk-block">


                        @include('admin.components.dashboard-widgets')

                    </div>


                    <div class="nk-block">
                        <div class="row g-gs">
                            <div class="col">
                                <div class="card card-bordered card-full">
                                    <div class="card-inner-group">
                                        <div class="card-inner">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h6 class="title">Recent Customers</h6>
                                                </div>
                                                <div class="card-tools">
                                                    <a href="{{ route('admin.riders') }}" class="link">View All</a>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach($riders as $item)
                                        <div class="card-inner card-inner-md">
                                            <div class="user-card">
                                                <div class="user-avatar bg-primary-dim">
                                                    <img src="{{ $item->avatar }}" />
                                                </div>
                                                <div class="user-info">
                                                    <span class="lead-text">{{ $item->name }}</span>
                                                    <span class="sub-text">{{ $item->email }}</span>
                                                </div>
                                                <div class="user-action">
                                                    <a href="{{ route('admin.user.show', $item->id) }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1"><em class="icon ni ni-eye"></em></a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @if(count($riders) < 1)
                                            <div class="card-inner card-inner-md">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <span class="lead-text">No riders yet</span>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                            @if(hasTrips())
                            <div class="col">
                                <div class="card card-bordered card-full">
                                    <div class="card-inner-group">
                                        <div class="card-inner">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h6 class="title">Recent Drivers</h6>
                                                </div>
                                                <div class="card-tools">
                                                    <a href="{{ route('admin.drivers.index',['status' => 'unapproved']) }}" class="link">View All</a>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach($drivers as $item)
                                        <div class="card-inner card-inner-md">

                                            <div class="user-card">
                                                <div class="user-avatar bg-primary-dim">
                                                    <img src="{{ $item->avatar }}" />
                                                </div>
                                                <div class="user-info">
                                                    <span class="lead-text">{{ $item->name }}</span>
                                                    <span class="sub-text">{{ $item->email }}</span>
                                                </div>
                                                <div class="user-action">
                                                    <a href="{{ route('admin.user.show', $item->id) }}" class="btn btn-sm btn-icon btn-outline-gray btn-round mx-1"><em class="icon ni ni-eye"></em></a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @if(count($drivers) < 1)
                                            <div class="card-inner card-inner-md">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <span class="lead-text">No drivers yet</span>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div><!-- .card -->
                            </div>
                            @endif

                        </div><!-- .row -->

                        <div class="row g-gs mt-4">
                            @if(hasTrips())
                            <div class="col">
                                <div class="card card-bordered card-full">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title"><span class="me-2">Recent rides</span> <a href="{{ route('admin.trips.index',['status' => 'all']) }}" class="link d-none d-sm-inline">See History</a></h6>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-inner p-0 border-top">
                                        <div class="nk-tb-list nk-tb-orders">
                                            <div class="nk-tb-item nk-tb-head">
                                                <div class="nk-tb-col"><span>Order No.</span></div>
                                                <div class="nk-tb-col tb-col-sm"><span>Customer</span></div>
                                                <div class="nk-tb-col tb-col-md"><span>Date</span></div>
                                                <div class="nk-tb-col"><span>Amount</span></div>
                                                <div class="nk-tb-col"><span class="d-none d-sm-inline">Status</span></div>
                                                <div class="nk-tb-col"><span>&nbsp;</span></div>
                                            </div>
                                            @foreach($rides as $item)
                                                <div class="nk-tb-item">
                                                    <div class="nk-tb-col">
                                                        <span class="tb-lead"><a href="#">#{{ $item->reference }}</a></span>
                                                    </div>
                                                    <div class="nk-tb-col tb-col-sm">
                                                        <div class="user-card">
                                                            <div class="user-avatar user-avatar-sm bg-purple">
                                                                <img src="{{ $item?->customer?->avatar }}" />
                                                            </div>
                                                            <div class="user-name">
                                                                <span class="tb-lead">{{ $item?->customer?->name }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-col tb-col-md">
                                                        <span class="tb-sub">{{ $item->created_at->format('Y-m-d H:i:s') }}</span>
                                                    </div>

                                                    <div class="nk-tb-col">
                                                        <span class="tb-sub tb-amount">{{ $item->grand_total }}</span>
                                                    </div>
                                                    <div class="nk-tb-col">
                                                        <span>{{ $item->status }}</span>
                                                    </div>
                                                    <div class="nk-tb-col">
                                                        <a href="{{ route('admin.trip.show', $item->id) }}">View</a>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="card-inner-sm border-top text-center d-sm-none">
                                        <a href="#" class="btn btn-link btn-block">See History</a>
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                            @endif

{{--                            @section('hide')--}}
                            <div class="col">
                                <div class="card card-bordered card-full">
                                    <div class="card-inner border-bottom">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Recent Activities</h6>
                                            </div>
                                            <div class="card-tools">
                                                <ul class="card-tools-nav">
                                                    <li class="active"><a href="{{ route('admin.activity.log') }}"><span>All</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nk-activity">
                                        @foreach(\App\Models\ActivityLog::latest()->limit(5)->get() as $item)
                                            <li class="nk-activity-item">
                                                <div class="nk-activity-media user-avatar bg-success"><img src="./images/avatar/c-sm.jpg" alt=""></div>
                                                <div class="nk-activity-data">
                                                    <div class="label">{{ $item->info }}</div>
                                                    <span class="time">{{ $item->created_at }}</span>
                                                </div>
                                            </li>

                                        @endforeach

                                    </ul>
                                </div><!-- .card -->
                            </div><!-- .col -->
{{--                            @endsection--}}
                        </div>
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('admin/assets/js/charts/chart-hotel.js?ver=3.1.1') }}"></script>
@endsection
