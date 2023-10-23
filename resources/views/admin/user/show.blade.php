@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Users / <strong
                                        class="text-primary small">{{ $user->name }}</strong></h3>
                                <div class="nk-block-des text-soft">
                                    <ul class="list-inline">
                                        <li>Date Joined: <span
                                                class="text-base">{{ $user->created_at->format('d-M-Y') }}</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="nk-block-head-content">
                                <a href="{{ url()->previous() }}"
                                   class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                        class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                <a href="{{ url()->previous() }}"
                                   class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                        class="icon ni ni-arrow-left"></em></a>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-aside-wrap">
                                <div
                                    class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-md"
                                    data-content="userAside" data-toggle-screen="xxl" data-toggle-overlay="true"
                                    data-toggle-body="true">
                                    <div class="card-inner-group" data-simplebar>
                                        <div class="card-inner">
                                            <div class="user-card user-card-s2">
                                                <div class="user-avatar lg bg-primary">
                                                    <img src="{{ $user->avatar }}"/>
                                                </div>
                                                <div class="user-info">
                                                    @foreach($user->getRoles() as $item)
                                                        <div
                                                            class="badge bg-outline-light rounded-pill ucap">{{ $item }}</div>

                                                    @endforeach
                                                    <h5 class="text-capitalize">{{ $user->name }}</h5>
                                                    <span class="sub-text">{{ $user->email }}</span>
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->
                                        @if(hasWallet())
                                            <div class="card-inner">
                                                <div class="overline-title-alt mb-2"> Wallet Balance</div>
                                                <div class="profile-balance">
                                                    <div class="profile-balance-group gx-4">
                                                        <div class="profile-balance-sub">
                                                            <div class="profile-balance-amount">
                                                                <div class="number">{{ amt($user->balance) }} </div>
                                                            </div>

                                                        </div>
                                                        <div class="profile-balance-sub">
                                                        <span class="profile-balance-plus text-soft"><em
                                                                class="icon ni ni-plus"></em></span>
                                                            <div class="profile-balance-amount">
                                                                <div class="number">{{ $user->totalSpent() }}</div>
                                                            </div>
                                                            <div class="profile-balance-subtitle">Total spent</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                        @endif

                                        @if(hasTrips())
                                            @if($user->hasRole('driver'))
                                                <div class="card-inner">
                                                    <div class="row text-center">
                                                        <div class="col-4">

                                                                <div class="profile-stats">
                                                                    <span class="amount">{{ $user->driver_trips->count() }}</span>
                                                                    <span class="sub-text">Total Driver Trips</span>
                                                                </div>

                                                        </div>
                                                        <div class="col-4">
                                                            <div class="profile-stats">
                                                                    <span class="amount">{{ $user->driver_completed_trips->count() }}</span>
                                                                    <span class="sub-text">Driver Complete Trips</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="profile-stats">
                                                                <span class="amount">{{ $user->driver_cancelled_trips->count() }}</span>
                                                                <span class="sub-text">Total Driver cancelled</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .card-inner -->
                                            @endif
                                                @if($user->hasRole('rider'))
                                                <div class="card-inner">
                                                    <div class="row text-center">
                                                        <div class="col-4">
                                                                <div class="profile-stats">
                                                                    <span class="amount">{{ $user->trips->count() }}</span>
                                                                    <span class="sub-text">Total Trips</span>
                                                                </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="profile-stats">

                                                                    <span class="amount">{{ $user->completed_trips->count() }}</span>
                                                                    <span class="sub-text">Complete Trips</span>

                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="profile-stats">
                                                                <span class="amount">{{ $user->cancelled_trips->count() }}</span>
                                                                <span class="sub-text">Cancelled Trips</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .card-inner -->
                                            @endif
                                        @endif

                                        @if(hasRental())

                                                @if($user->hasRole('rider'))
                                                <div class="card-inner">
                                                    <div class="row text-center">
                                                        <div class="col-4">
                                                                <div class="profile-stats">
                                                                    <span class="amount">{{ $user->all_bookings->count() }}</span>
                                                                    <span class="sub-text">Total Booking</span>
                                                                </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="profile-stats">

                                                                    <span class="amount">{{ $user->completed_bookings->count() }}</span>
                                                                    <span class="sub-text">Completed Bookings</span>

                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="profile-stats">
                                                                <span class="amount">{{ $user->cancelled_bookings->count() }}</span>
                                                                <span class="sub-text">Cancelled Bookings</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .card-inner -->
                                            @endif
                                        @endif

                                        <div class="card-inner">
                                            <h6 class="overline-title-alt mb-2">Additional</h6>
                                            <div class="row g-3">
{{--                                                <div class="col-6">--}}
{{--                                                    <span class="sub-text">Last Login:</span>--}}
{{--                                                    <span>15 Feb, 2019 01:02 PM</span>--}}
{{--                                                </div>--}}

                                                <div class="col-6">
                                                    <span class="sub-text">Register At:</span>
                                                    <span> {{ $user->created_at->format('M d, Y') }}</span>
                                                </div>

                                                <div class="col-12">
                                                    <span class="sub-text">Push token:</span>
                                                    <span> {{ $user->push_token }}</span>
                                                </div>


                                            </div>
                                        </div><!-- .card-inner -->

                                    </div><!-- .card-inner -->
                                </div><!-- .card-aside -->

                                <div class="card-content">
                                    <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#personal-info"><em
                                                    class="icon ni ni-user"></em><span>Personal Information</span></a>
                                        </li>

                                        @if(canViewUserBookings())
                                            @if($user->hasRole('driver'))
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#car_info"><em
                                                            class="icon ni ni-meter"></em><span>Car Detail</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#documents"><em
                                                            class="icon ni ni-file-doc"></em><span>Documents</span></a>
                                                </li>
                                            @endif

                                            @if(hasTrips())
                                                    @if($user->hasRole('rider'))
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#rides"><em
                                                            class="icon ni ni-list-fill"></em><span>Ride History(rider) </span></a>
                                                </li>
                                                    @endif

                                                @if($user->hasRole('driver'))
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab" href="#driver_trips"><em
                                                                    class="icon ni ni-list-fill"></em><span>Ride History(driver) </span></a>
                                                        </li>
                                                @endif
                                            @endif

                                            @if(hasRental())
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#rentals"><em
                                                            class="icon ni ni-list-fill"></em><span>Booking History </span></a>
                                                </li>
                                            @endif

                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#transactions"><em
                                                            class="icon ni ni-list-fill"></em><span>Transactions </span></a>
                                                </li>

                                        @endif
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="personal-info">
                                            <div class="card-inner pt-0">
                                                <div class="nk-block">
                                                    <div class="nk-block-head">
                                                        <h5 class="title">Personal Information</h5>
                                                    </div><!-- .nk-block-head -->
                                                    <div class="profile-ud-list">

                                                        <div class="profile-ud-item">
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">First name</span>
                                                                <span
                                                                    class="profile-ud-value">{{ $user->first_name }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-ud-item">
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">Last name</span>
                                                                <span
                                                                    class="profile-ud-value">{{ $user->last_name }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-ud-item">
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">Gender</span>
                                                                <span
                                                                    class="profile-ud-value">{{ $user->gender }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-ud-item">
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">Mobile Number</span>
                                                                <span class="profile-ud-value">{{ $user->phone }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-ud-item">
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">Email Address</span>
                                                                <span class="profile-ud-value">{{ $user->email }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-ud-item">
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">Current region</span>
                                                                <span
                                                                    class="profile-ud-value">{{ $user?->region?->name ?? 'Not set' }}</span>
                                                            </div>

                                                        </div>
                                                        <div class="profile-ud-item">

                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">Status</span>
                                                                <span class="profile-ud-value">

                                                                    @if($user->status == 'approved')
                                                                        <span class="badge badge-dim bg-success">Approved</span>
                                                                    @else
                                                                        <span
                                                                            class="badge badge-dim bg-danger">{{ $user->status }}</span>
                                                                    @endif
                                                                </span>
                                                            </div>

                                                        </div>


                                                    </div><!-- .profile-ud-list -->
                                                    @if(hasMonify())
                                                        <div class="nk-block-head mt-4">
                                                            <h5 class="title">Bank Account Information</h5>
                                                        </div><!-- .nk-block-head -->

                                                        @if($user->monify_account)
                                                            @foreach($user->monify_account as $bank)
                                                                <div class="profile-ud-list">

                                                                    <div class="profile-ud-item shadow border-1">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">Bank name</span>
                                                                            <span class="profile-ud-value">{{ $bank->bankName }}</span>
                                                                        </div>
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">Account name</span>
                                                                            <span class="profile-ud-value">{{ $bank->accountName }}</span>
                                                                        </div>
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">Account number</span>
                                                                            <span class="profile-ud-value">{{ $bank->accountNumber }}</span>
                                                                        </div>
                                                                        {{--                                                            <div class="profile-ud wider">--}}
                                                                        {{--                                                                <span class="profile-ud-label">Bank code</span>--}}
                                                                        {{--                                                                <span class="profile-ud-value">{{ $bank->bankCode }}</span>--}}
                                                                        {{--                                                            </div>--}}
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <a href="{{ url()->current() }}?monify=true" class="btn btn-success">Add Monify Account</a>
                                                        @endif
                                                    @endif


                                                </div><!-- .nk-block -->
                                            </div>
                                        </div><!--tab pan -->

                                        @if(canViewUserBookings())
                                            <div class="tab-pane" id="car_info">
                                                <div class="card-inner pt-0">
                                                    <div class="nk-block">
                                                        <div class="nk-block-head">
                                                            <h5 class="title">Vehicle Information</h5>
                                                        </div><!-- .nk-block-head -->
                                                        <div class="profile-ud-list">

                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Vehicle type</span>
                                                                    <span
                                                                        class="profile-ud-value">{{ $user?->car?->type }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Vehicle make</span>
                                                                    <span
                                                                        class="profile-ud-value">{{ $user?->car?->make }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Vehicle model</span>
                                                                    <span
                                                                        class="profile-ud-value">{{ $user?->car?->model }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Gear type</span>
                                                                    <span
                                                                        class="profile-ud-value">{{ $user?->car?->gear }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Vehicle title</span>
                                                                    <span
                                                                        class="profile-ud-value">{{ $user?->car?->title }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Vehicle color</span>
                                                                    <span
                                                                        class="profile-ud-value">{{ $user?->car?->color }}</span>
                                                                </div>

                                                            </div>
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Year</span>
                                                                    <span
                                                                        class="profile-ud-value">{{ $user?->car?->color }}</span>
                                                                </div>

                                                            </div>
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Vehicle No</span>
                                                                    <span
                                                                        class="profile-ud-value">{{ $user?->car?->vehicle_no }}</span>
                                                                </div>

                                                            </div>
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Door</span>
                                                                    <span
                                                                        class="profile-ud-value">{{ $user?->car?->door }}</span>
                                                                </div>

                                                            </div>


                                                        </div><!-- .profile-ud-list -->

                                                    </div><!-- .nk-block -->
                                                </div>

                                            </div><!--tab pan -->

                                            @if(hasTrips())
                                                <div class="tab-pane" id="rides">
                                                    <div class="card-inner position-relative card-tools-toggle pt-0">

                                                        <div class="nk-block">
                                                            <div
                                                                class="card card-bordered border-left-0 border-right-0">
                                                                <div class="card-inner">
                                                                    <div id="DataTables_Table_1_wrapper"
                                                                         class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                                        <div class="datatable-wrap- my-3">
                                                                            <table class="datatable-init nowrap table">
                                                                                <thead>

                                                                                <tr>
                                                                                    <th>S/N</th>
                                                                                    <td>View</td>
                                                                                    <th>Service Area</th>
                                                                                    <th>Reference</th>
                                                                                    <th>Ride Type</th>
                                                                                    <th>Date</th>
                                                                                    <th>Rider Name</th>
                                                                                    <th>Driver Name</th>
                                                                                    <th>Trip Status</th>
                                                                                    <th>Grand Total</th>
                                                                                    <th>Driver Earned</th>
                                                                                    <th>Payment Status</th>
                                                                                    <th>Payment Method</th>
                                                                                    <th>Action</th>
                                                                                </tr>

                                                                                </thead>
                                                                                <tbody>
                                                                                @foreach($rides as $item)
                                                                                    @include('admin.partials.table.rides-table', ['item' => $item])
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div><!-- .card -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="driver_trips">
                                                    <div class="card-inner position-relative card-tools-toggle pt-0">

                                                        <div class="nk-block">
                                                            <div
                                                                class="card card-bordered border-left-0 border-right-0">
                                                                <div class="card-inner">
                                                                    <div id="DataTables_Table_1_wrapper"
                                                                         class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                                        <div class="datatable-wrap- my-3">
                                                                            <table class="datatable-init nowrap table">
                                                                                <thead>

                                                                                <tr>
                                                                                    <th>S/N</th>
                                                                                    <td>View</td>
                                                                                    <th>Service Area</th>
                                                                                    <th>Reference</th>
                                                                                    <th>Ride Type</th>
                                                                                    <th>Date</th>
                                                                                    <th>Rider Name</th>
                                                                                    <th>Driver Name</th>
                                                                                    <th>Trip Status</th>
                                                                                    <th>Grand Total</th>
                                                                                    <th>Driver Earned</th>
                                                                                    <th>Payment Status</th>
                                                                                    <th>Payment Method</th>
                                                                                    <th>Action</th>
                                                                                </tr>

                                                                                </thead>
                                                                                <tbody>
                                                                                @foreach($driver_trips as $item)
                                                                                    @include('admin.partials.table.rides-table', ['item' => $item])
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div><!-- .card -->
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if(hasRental())
                                                <div class="tab-pane" id="rentals">
                                                    <div class="card-inner position-relative card-tools-toggle pt-0">

                                                        <div class="nk-block">
                                                            <div
                                                                class="card card-bordered border-left-0 border-right-0">
                                                                <div class="card-inner">
                                                                    <div id="DataTables_Table_1_wrapper"
                                                                         class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                                        <div class="datatable-wrap- my-3">
                                                                            <table class="datatable-init nowrap table">
                                                                                <thead>

                                                                                <tr>
                                                                                    <th>Reference</th>
                                                                                    <th>Date</th>
                                                                                    <th>Rider Name</th>
                                                                                    <th>Driver Name</th>
                                                                                    <th>Trip Status</th>
                                                                                    <th>Payment Status</th>
                                                                                    <th>Payment Method</th>
                                                                                    <th>Action</th>
                                                                                </tr>

                                                                                </thead>
                                                                                <tbody>
                                                                                @foreach($rides as $item)
                                                                                    @include('admin.partials.table.rides-table', ['item' => $item])
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div><!-- .card -->
                                                        </div>
                                                    </div>
                                                </div> <!-- .tab-pane -->
                                            @endif

                                            <div class="tab-pane" id="transactions">
                                                    <div class="card-inner position-relative card-tools-toggle pt-0">

                                                        <div class="nk-block">
                                                            <div
                                                                class="card card-bordered border-left-0 border-right-0">
                                                                <div class="card-inner">
                                                                    <div id="DataTables_Table_1_wrapper"
                                                                         class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                                        <div class="datatable-wrap- my-3">
                                                                            <table class="datatable-init-export nowrap table" data-export-title="Export">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>S/N</th>
                                                                                    <th>Type</th>
                                                                                    <th>Amount</th>
                                                                                    <th>Description</th>
                                                                                    <th>Date</th>
                                                                                </tr>

                                                                                </thead>
                                                                                <tbody>
                                                                                @foreach($transactions as $item)
                                                                                    <tr>
                                                                                        <td>{{ $loop->index + 1 }}</td>
                                                                                        <td>{{ $item->type }}</td>
                                                                                        <td>{{ amt($item->amount) }}</td>
                                                                                        <td>{{ $item->meta['description'] }}</td>
                                                                                        <td>{{ $item->created_at }}</td>


                                                                                    </tr>
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div><!-- .card -->
                                                        </div>
                                                    </div>
                                                </div> <!-- .tab-pane -->


                                            <div class="tab-pane" id="documents">
                                                <div class="card-inner position-relative card-tools-toggle pt-0">

                                                    <div class="nk-block">
                                                        <div class="card card-bordered border-left-0 border-right-0">
                                                            <div class="card-inner-group">

                                                                <div class="card-inner p-0-">
                                                                    <div class="datatable-wrap- my-3">
                                                                        <table class="nowrap table">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>S/N</th>
                                                                                <th>Driver name</th>
                                                                                <th>Document name</th>
                                                                                <th>Expiry Data</th>
                                                                                <th>Status</th>
                                                                                <th>Comment</th>
                                                                                <th>Action</th>
                                                                            </tr>

                                                                            </thead>
                                                                            <tbody>
                                                                            @foreach($user?->documents as $item)
                                                                                <tr>
                                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                                    <td>{{ $user->name }}</td>
                                                                                    <td>{{ $item?->document?->name }}</td>

                                                                                    <td>
                                                                                        {{ $item->expiry_date ?? '-' }}
                                                                                    </td>

                                                                                    <td>
                                                                                        <span
                                                                                            class="badge badge-dim {{ $item->color }} btn-warning">{{ $item->status }}</span>
                                                                                    </td>

                                                                                    <td>
                                                                                        @if(strlen($item->comment) < 3)
                                                                                            -
                                                                                        @else
                                                                                            {{ \Illuminate\Support\Str::limit($item->comment, 15) }}
                                                                                        @endif

                                                                                    </td>

                                                                                    <td>


                                                                                        <div class="d-flex">
                                                                                            @if($item->file)
                                                                                                <a data-bs-toggle="modal"
                                                                                                   href="#viewImage{{ $item->id }}"
                                                                                                   class="btn btn-icon btn-outline-gray btn-round mx-1"><em
                                                                                                        class="icon ni ni-img-fill"></em></a>
                                                                                            @endif
                                                                                        </div>

                                                                                    </td>

                                                                                </tr>
                                                                            @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                </div><!-- .card-inner -->

                                                            </div><!-- .card-inner-group -->
                                                        </div><!-- .card -->
                                                    </div>
                                                </div>
                                            </div> <!-- .tab-pane -->
                                        @endif

                                    </div><!-- .tab-content -->
                                </div>

                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>


    @foreach($user?->documents as $item)
        <div class="modal fade" role="dialog" id="viewImage{{ $item->id }}">

            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                    <div class="modal-body modal-body-md">
                        <h5 class="title">{{ $user->name }} {{ $item?->document?->name }} image</h5>

                        <div class="row">
                            <img src="{{ $item->file }}"/>
                        </div>

                    </div>
                    <!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div>
    @endforeach

@endsection
