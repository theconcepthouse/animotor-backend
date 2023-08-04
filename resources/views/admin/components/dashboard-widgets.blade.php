<div class="row g-gs mb-4">

    @include('admin.components.widgets.bookings')
{{--    @include('admin.components.widgets.available_cars')--}}
    @include('admin.components.widgets.trips')


    <div class="col-md-4">
        <div class="card card-bordered card-full">
            <div class="card-inner">
                <div class="card-title-group align-start mb-0">
                    <div class="card-title">
                        <h6 class="title">Total Customers</h6>
                    </div>
                    <div class="card-tools">
                        <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Total Room" data-bs-original-title="Total Room"></em>
                    </div>
                </div>
                <div class="card-amount">
                    <span class="amount"> 312 </span>
                </div>
                <div class="invest-data">
                    <div class="invest-data-amount g-2">
                        <div class="invest-data-history">
                            <div class="title">Joined (This  Month)</div>
                            <div class="amount">913</div>
                        </div>
                        <div class="invest-data-history">
                            <div class="title">Joined (This Week)</div>
                            <div class="amount">125</div>
                        </div>
                    </div>
                    <div class="invest-data-ck"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas class="iv-data-chart chartjs-render-monitor" id="totalRoom" width="97" height="48" style="display: block;"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- .card -->
    </div><!-- .col -->
    <div class="col-md-4">
        <div class="card card-bordered card-full">
            <div class="card-inner">
                <div class="card-title-group align-start mb-0">
                    <div class="card-title">
                        <h6 class="title">Total Drivers</h6>
                    </div>
                    <div class="card-tools">
                        <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Total Room" data-bs-original-title="Total Room"></em>
                    </div>
                </div>
                <div class="card-amount">
                    <span class="amount"> 312 </span>
                </div>
                <div class="invest-data">
                    <div class="invest-data-amount g-2">
                        <div class="invest-data-history">
                            <div class="title">Joined (This  Month)</div>
                            <div class="amount">913</div>
                        </div>
                        <div class="invest-data-history">
                            <div class="title">Joined (This Week)</div>
                            <div class="amount">125</div>
                        </div>
                    </div>
                    <div class="invest-data-ck"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas class="iv-data-chart chartjs-render-monitor" id="totalExpenses" width="110" height="48" style="display: block; width: 110px; height: 48px;"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- .card -->
    </div><!-- .col -->
    <div class="col-md-4">
        <div class="card card-bordered card-full">
            <div class="card-inner">
                <div class="card-title-group align-start mb-0">
                    <div class="card-title">
                        <h6 class="title">Total complains</h6>
                    </div>
                    <div class="card-tools">
                        <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Total Room" data-bs-original-title="Total Room"></em>
                    </div>
                </div>
                <div class="card-amount">
                    <span class="amount"> 133 </span>
                </div>
                <div class="invest-data">
                    <div class="invest-data-amount g-2">
                        <div class="invest-data-history">
                            <div class="title">Feedback</div>
                            <div class="amount">4</div>
                        </div>
                        <div class="invest-data-history">
                            <div class="title">Testimonials</div>
                            <div class="amount">3</div>
                        </div>
                    </div>
                    <div class="invest-data-ck"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas class="iv-data-chart chartjs-render-monitor" id="totalExpenses" width="110" height="48" style="display: block; width: 110px; height: 48px;"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- .card -->
    </div><!-- .col -->


</div>
