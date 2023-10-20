<div class="row g-gs mb-4">

    @if(hasRental())
    @include('admin.components.widgets.bookings')
    @endif

{{--    @include('admin.components.widgets.available_cars')--}}

    @if(hasTrips())
    @include('admin.components.widgets.trips')
    @endif


    <div class="col-md-4">
        <div class="card card-bordered card-full">
            <div class="card-inner">
                <div class="card-title-group align-start mb-0">
                    <div class="card-title">
                        <h6 class="title">Total Customers</h6>
                    </div>
                    <div class="card-tools">
                        <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Total Customers" data-bs-original-title="Total Customers"></em>
                    </div>
                </div>
                <div class="card-amount">
                    <span class="amount"> {{ $riders_count }} </span>
                </div>
                <div class="invest-data">

{{--                    <div class="invest-data-ck"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>--}}
{{--                        <canvas class="iv-data-chart chartjs-render-monitor" id="totalRoom" width="97" height="48" style="display: block;"></canvas>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div><!-- .card -->
    </div><!-- .col -->

    @if(hasTrips())
    <div class="col-md-4">
        <div class="card card-bordered card-full">
            <div class="card-inner">
                <div class="card-title-group align-start mb-0">
                    <div class="card-title">
                        <h6 class="title">Total Drivers</h6>
                    </div>
                    <div class="card-tools">
                        <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Total Drivers" data-bs-original-title="Total Room"></em>
                    </div>
                </div>
                <div class="card-amount">
                    <span class="amount"> {{ $drivers_count }} </span>
                </div>
                <div class="invest-data">
                    <div class="invest-data-amount g-2">
                        <div class="invest-data-history">
                            <div class="title">Approved Drivers</div>
                            <div class="amount">{{ $approved_drivers_count }}</div>
                        </div>
                        <div class="invest-data-history">
                            <div class="title">Unapproved Drivers</div>
                            <div class="amount">{{ $un_approved_drivers_count }}</div>
                        </div>
                    </div>
{{--                    <div class="invest-data-ck"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>--}}
{{--                        <canvas class="iv-data-chart chartjs-render-monitor" id="totalExpenses" width="110" height="48" style="display: block; width: 110px; height: 48px;"></canvas>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div><!-- .card -->
    </div><!-- .col -->
    @endif

    <div class="col-md-4">
        <div class="card card-bordered card-full">
            <div class="card-inner">
                <div class="card-title-group align-start mb-0">
                    <div class="card-title">
                        <h6 class="title">Total Complains</h6>
                    </div>
                    <div class="card-tools">
                        <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Total Complains" data-bs-original-title="Total Complains"></em>
                    </div>
                </div>
                <div class="card-amount">
                    <span class="amount"> {{ $total_complains }} </span>
                </div>
                <div class="invest-data">

{{--                    <div class="invest-data-ck"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>--}}
{{--                        <canvas class="iv-data-chart chartjs-render-monitor" id="totalExpenses" width="110" height="48" style="display: block; width: 110px; height: 48px;"></canvas>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div><!-- .card -->
    </div><!-- .col -->


</div>
