@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">{{ env('APP_NAME') }} dashboard</h3>

                            </div><!-- .nk-block-head-content -->

                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="row g-gs">
                            <div class="col-xxl-6">
                                <div class="row g-gs">

                                    <div class="col-md-12 col-xxl-12">
                                        <div class="row g-gs">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="card card-bordered">
                                                    <div class="card-inner">
                                                        <div class="card-title-group align-start mb-2">
                                                            <div class="card-title">
                                                                <h6 class="title">Approved drivers</h6>
                                                            </div>
                                                        </div>
                                                        <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                            <div class="nk-sale-data">
                                                                <span class="amount"> 0</span>
                                                                <a class="font-weight-semi-bold fs--1 text-nowrap" href="{{ route('admin.drivers.index',['status' => 'approved']) }}">see all<span class="icon ni ni-arrow-right ml-1" data-fa-transform="down-1"></span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .card -->
                                            </div><!-- .col -->
                                            <div class="col-sm-12 col-md-6">
                                                <div class="card card-bordered">
                                                    <div class="card-inner">
                                                        <div class="card-title-group align-start mb-2">
                                                            <div class="card-title">
                                                                <h6 class="title">Unapproved drivers</h6>
                                                            </div>
                                                        </div>
                                                        <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                            <div class="nk-sale-data">
                                                                <span class="amount text-danger"> 0</span>
                                                                <a class="font-weight-semi-bold fs--1 text-nowrap" href="{{ route('admin.drivers.index',['status' => 'unapproved']) }}">see all<span class="icon ni ni-arrow-right ml-1" data-fa-transform="down-1"></span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .card -->
                                            </div><!-- .col -->
                                            <div class="col-sm-12 col-md-4">
                                                <div class="card card-bordered">
                                                    <div class="card-inner">
                                                        <div class="card-title-group align-start mb-2">
                                                            <div class="card-title">
                                                                <h6 class="title">Total riders</h6>
                                                            </div>
                                                        </div>
                                                        <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                            <div class="nk-sale-data">
                                                                <span class="amount text-primary"> 0</span>
                                                                <a class="font-weight-semi-bold fs--1 text-nowrap" href="{{ route('admin.riders') }}">see all<span class="icon ni ni-arrow-right ml-1" data-fa-transform="down-1"></span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .card -->
                                            </div><!-- .col -->
                                            <div class="col-sm-12 col-md-4">
                                                <div class="card card-bordered">
                                                    <div class="card-inner">
                                                        <div class="card-title-group align-start mb-2">
                                                            <div class="card-title">
                                                                <h6 class="title">Total rides</h6>
                                                            </div>
                                                        </div>
                                                        <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                            <div class="nk-sale-data">
                                                                <span class="amount text-warning"> 0</span>
                                                                <a class="font-weight-semi-bold fs--1 text-nowrap" href="{{ route('admin.riders') }}">see all<span class="icon ni ni-arrow-right ml-1" data-fa-transform="down-1"></span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .card -->
                                            </div><!-- .col -->
                                            <div class="col-sm-12 col-md-4">
                                                <div class="card card-bordered">
                                                    <div class="card-inner">
                                                        <div class="card-title-group align-start mb-2">
                                                            <div class="card-title">
                                                                <h6 class="title">Total complains</h6>
                                                            </div>
                                                        </div>
                                                        <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                            <div class="nk-sale-data">
                                                                <span class="amount text-warning"> 0</span>
                                                                <a class="font-weight-semi-bold fs--1 text-nowrap" href="{{ route('admin.complains.index') }}">see all<span class="icon ni ni-arrow-right ml-1" data-fa-transform="down-1"></span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .card -->
                                            </div><!-- .col -->

                                        </div><!-- .row -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div><!-- .col -->
                            <div class="col-xxl-6">
                                <div class="card card-bordered h-100">
                                    <div class="card-inner">
                                        <div class="card-title-group align-start gx-3 mb-3">
                                            <div class="card-title">
                                                <h6 class="title">Rides Overview</h6>
                                                <p>This month rides overview. <a href="{{ route('admin.trips.index',['status'=>'completed']) }}">See all rides</a></p>
                                            </div>

                                        </div>
                                        <div class="nk-sale-data-group align-center justify-between gy-3 gx-5">
                                            <div class="nk-sale-data">
                                                <span class="amount">$82,944.60</span>
                                            </div>
                                            <div class="nk-sale-data">
                                                <span class="amount sm">2 <small>Total rides</small></span>
                                            </div>
                                        </div>
                                        <div class="nk-sales-ck large pt-4">
                                            <canvas class="sales-overview-chart" id="salesOverview"></canvas>
                                        </div>
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->


                            <div class="col-md-6 col-xxl-4">
                                <div class="card card-bordered card-full">
                                    <div class="card-inner-group">
                                        <div class="card-inner">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h6 class="title">Recent riders</h6>
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
                            <div class="col-md-6 col-xxl-4">
                                <div class="card card-bordered card-full">
                                    <div class="card-inner-group">
                                        <div class="card-inner">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h6 class="title">Recent drivers</h6>
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

                            <div class="col-lg-6 col-xxl-4">
                                <div class="card card-bordered h-100">
                                    <div class="card-inner border-bottom">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Notifications</h6>
                                            </div>
                                            <div class="card-tools">
                                                <a href="#" class="link">View All</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-inner">
                                        <div class="timeline">
                                            <h6 class="timeline-head">June, 2023</h6>
                                            <ul class="timeline-list">
                                                <li class="timeline-item">
                                                    <div class="timeline-status bg-primary is-outline"></div>
                                                    <div class="timeline-date">20 Jun <em class="icon ni ni-alarm-alt"></em></div>
                                                    <div class="timeline-data">
                                                        <h6 class="timeline-title">Submited KYC Application</h6>
                                                        <div class="timeline-des">
                                                            <p>Re-submitted KYC Application form.</p>
                                                            <span class="time">09:30am</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="timeline-item">
                                                    <div class="timeline-status bg-primary"></div>
                                                    <div class="timeline-date">20 June <em class="icon ni ni-alarm-alt"></em></div>
                                                    <div class="timeline-data">
                                                        <h6 class="timeline-title">Submited KYC Application</h6>
                                                        <div class="timeline-des">
                                                            <p>Re-submitted KYC Application form.</p>
                                                            <span class="time">09:30am</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="timeline-item">
                                                    <div class="timeline-status bg-pink"></div>
                                                    <div class="timeline-date">20 june <em class="icon ni ni-alarm-alt"></em></div>
                                                    <div class="timeline-data">
                                                        <h6 class="timeline-title">Submited KYC Application</h6>
                                                        <div class="timeline-des">
                                                            <p>Re-submitted KYC Application form.</p>
                                                            <span class="time">09:30am</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->



                            <div class="col-xxl-8">
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
                                                <div class="nk-tb-col tb-col-lg"><span>Ref</span></div>
                                                <div class="nk-tb-col"><span>Amount</span></div>
                                                <div class="nk-tb-col"><span class="d-none d-sm-inline">Status</span></div>
                                                <div class="nk-tb-col"><span>&nbsp;</span></div>
                                            </div>
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col">
                                                    <span class="tb-lead"><a href="#">#95954</a></span>
                                                </div>
                                                <div class="nk-tb-col tb-col-sm">
                                                    <div class="user-card">
                                                        <div class="user-avatar user-avatar-sm bg-purple">
                                                            <span>AB</span>
                                                        </div>
                                                        <div class="user-name">
                                                            <span class="tb-lead">Abu Bin Ishtiyak</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-sub">02/11/2020</span>
                                                </div>
                                                <div class="nk-tb-col tb-col-lg">
                                                    <span class="tb-sub text-primary">SUB-2309232</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub tb-amount">4,596.75 <span>USD</span></span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="badge badge-dot badge-dot-xs bg-success">Paid</span>
                                                </div>
                                                <div class="nk-tb-col nk-tb-col-action">
                                                    <div class="dropdown">
                                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                            <ul class="link-list-plain">
                                                                <li><a href="#">View</a></li>
                                                                <li><a href="#">Invoice</a></li>
                                                                <li><a href="#">Print</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col">
                                                    <span class="tb-lead"><a href="#">#95850</a></span>
                                                </div>
                                                <div class="nk-tb-col tb-col-sm">
                                                    <div class="user-card">
                                                        <div class="user-avatar user-avatar-sm bg-azure">
                                                            <span>DE</span>
                                                        </div>
                                                        <div class="user-name">
                                                            <span class="tb-lead">Desiree Edwards</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-sub">02/02/2020</span>
                                                </div>
                                                <div class="nk-tb-col tb-col-lg">
                                                    <span class="tb-sub text-primary">SUB-2309154</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub tb-amount">596.75 <span>USD</span></span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="badge badge-dot badge-dot-xs bg-danger">Canceled</span>
                                                </div>
                                                <div class="nk-tb-col nk-tb-col-action">
                                                    <div class="dropdown">
                                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                            <ul class="link-list-plain">
                                                                <li><a href="#">View</a></li>
                                                                <li><a href="#">Remove</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col">
                                                    <span class="tb-lead"><a href="#">#95812</a></span>
                                                </div>
                                                <div class="nk-tb-col tb-col-sm">
                                                    <div class="user-card">
                                                        <div class="user-avatar user-avatar-sm bg-warning">
                                                            <img src="./images/avatar/b-sm.jpg" alt="">
                                                        </div>
                                                        <div class="user-name">
                                                            <span class="tb-lead">Blanca Schultz</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-sub">02/01/2020</span>
                                                </div>
                                                <div class="nk-tb-col tb-col-lg">
                                                    <span class="tb-sub text-primary">SUB-2309143</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub tb-amount">199.99 <span>USD</span></span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="badge badge-dot badge-dot-xs bg-success">Paid</span>
                                                </div>
                                                <div class="nk-tb-col nk-tb-col-action">
                                                    <div class="dropdown">
                                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                            <ul class="link-list-plain">
                                                                <li><a href="#">View</a></li>
                                                                <li><a href="#">Invoice</a></li>
                                                                <li><a href="#">Print</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col">
                                                    <span class="tb-lead"><a href="#">#95256</a></span>
                                                </div>
                                                <div class="nk-tb-col tb-col-sm">
                                                    <div class="user-card">
                                                        <div class="user-avatar user-avatar-sm bg-purple">
                                                            <span>NL</span>
                                                        </div>
                                                        <div class="user-name">
                                                            <span class="tb-lead">Naomi Lawrence</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-sub">01/29/2020</span>
                                                </div>
                                                <div class="nk-tb-col tb-col-lg">
                                                    <span class="tb-sub text-primary">SUB-2305684</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub tb-amount">1099.99 <span>USD</span></span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="badge badge-dot badge-dot-xs bg-success">Paid</span>
                                                </div>
                                                <div class="nk-tb-col nk-tb-col-action">
                                                    <div class="dropdown">
                                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                            <ul class="link-list-plain">
                                                                <li><a href="#">View</a></li>
                                                                <li><a href="#">Invoice</a></li>
                                                                <li><a href="#">Print</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col">
                                                    <span class="tb-lead"><a href="#">#95135</a></span>
                                                </div>
                                                <div class="nk-tb-col tb-col-sm">
                                                    <div class="user-card">
                                                        <div class="user-avatar user-avatar-sm bg-success">
                                                            <span>CH</span>
                                                        </div>
                                                        <div class="user-name">
                                                            <span class="tb-lead">Cassandra Hogan</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-sub">01/29/2020</span>
                                                </div>
                                                <div class="nk-tb-col tb-col-lg">
                                                    <span class="tb-sub text-primary">SUB-2305564</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub tb-amount">1099.99 <span>USD</span></span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="badge badge-dot badge-dot-xs bg-warning">Due</span>
                                                </div>
                                                <div class="nk-tb-col nk-tb-col-action">
                                                    <div class="dropdown">
                                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                            <ul class="link-list-plain">
                                                                <li><a href="#">View</a></li>
                                                                <li><a href="#">Invoice</a></li>
                                                                <li><a href="#">Notify</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-inner-sm border-top text-center d-sm-none">
                                        <a href="#" class="btn btn-link btn-block">See History</a>
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->

                            <div class="col-md-6 col-xxl-4">
                                <div class="card card-bordered card-full">
                                    <div class="card-inner border-bottom">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Recent Activities</h6>
                                            </div>
                                            <div class="card-tools">
                                                <ul class="card-tools-nav">
                                                    <li><a href="#"><span>Cancel</span></a></li>
                                                    <li class="active"><a href="#"><span>All</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nk-activity">
                                        <li class="nk-activity-item">
                                            <div class="nk-activity-media user-avatar bg-success"><img src="./images/avatar/c-sm.jpg" alt=""></div>
                                            <div class="nk-activity-data">
                                                <div class="label">Keith Jensen requested to Widthdrawl.</div>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </li>
                                        <li class="nk-activity-item">
                                            <div class="nk-activity-media user-avatar bg-warning">HS</div>
                                            <div class="nk-activity-data">
                                                <div class="label">Harry Simpson placed a Order.</div>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </li>
                                        <li class="nk-activity-item">
                                            <div class="nk-activity-media user-avatar bg-azure">SM</div>
                                            <div class="nk-activity-data">
                                                <div class="label">Stephanie Marshall got a huge bonus.</div>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </li>
                                        <li class="nk-activity-item">
                                            <div class="nk-activity-media user-avatar bg-purple"><img src="./images/avatar/d-sm.jpg" alt=""></div>
                                            <div class="nk-activity-data">
                                                <div class="label">Nicholas Carr deposited funds.</div>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </li>
                                        <li class="nk-activity-item">
                                            <div class="nk-activity-media user-avatar bg-pink">TM</div>
                                            <div class="nk-activity-data">
                                                <div class="label">Timothy Moreno placed a Order.</div>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!-- .card -->
                            </div><!-- .col -->

                        </div><!-- .row -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>

@endsection
