
<div class="col-md-3">
    <div class="card card-bordered card-full">
        <div class="card-inner">
            <div class="card-title-group align-start mb-0">
                <div class="card-title">
                    <h6 class="title text-uppercase-">Total Trips Request</h6>
                </div>
                <div class="card-tools">
                    <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Total Trip Request" data-bs-original-title="Total Booking"></em>
                </div>
            </div>
            <div class="card-amount">
                <span class="amount text-primary"> {{ show_item($tripsStatistics['total']) }} </span>

            </div>
            <div class="invest-data">
                <div class="invest-data-amount g-2">
                    <div class="invest-data-history">
                        <div class="title">This Month</div>
                        <div class="amount">{{ show_item($tripsStatistics['this_month']) }}</div>
                    </div>
                    <div class="invest-data-history">
                        <div class="title">This Week</div>
                        <div class="amount">{{ show_item($tripsStatistics['this_week']) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .card -->
</div><!-- .col -->

<div class="col-md-3">
    <div class="card card-bordered card-full">
        <div class="card-inner">
            <div class="card-title-group align-start mb-0">
                <div class="card-title">
                    <h6 class="title text-uppercase-">Pending Trips Request</h6>
                </div>
                <div class="card-tools">
                    <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Pending Trips Request" data-bs-original-title="Total Booking"></em>
                </div>
            </div>
            <div class="card-amount">
                <span class="amount text-primary"> {{ show_item($tripsStatistics['pending_trips']) }} </span>

            </div>
            <div class="invest-data">
                <div class="invest-data-amount g-2">
                    <div class="invest-data-history">
                        <div class="title">Cancelled Trips</div>
                        <div class="amount">{{ show_item($tripsStatistics['this_month']) }}</div>
                    </div>
                    <div class="invest-data-history">
                        <div class="title">Completed Today</div>
                        <div class="amount">{{ show_item($tripsStatistics['this_week']) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .card -->
</div><!-- .col -->

