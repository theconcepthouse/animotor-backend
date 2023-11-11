@if(hasRental())
<div class="col-md-4">
    <div class="card card-bordered card-full">
        <div class="card-inner">
            <div class="card-title-group align-start mb-0">
                <div class="card-title">
                    <h6 class="title text-">Total Car Booking</h6>
                </div>
                <div class="card-tools">
                    <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Total Car Booking" data-bs-original-title="Total Car Booking"></em>
                </div>
            </div>
            <div class="card-amount">
                <span class="amount text-primary"> {{ show_item($bookingsStatistics['total']) }} </span>

            </div>
            <div class="invest-data">
                <div class="invest-data-amount g-2">
                    <div class="invest-data-history">
                        <div class="title">This Month</div>
                        <div class="amount">{{ show_item($bookingsStatistics['this_month']) }}</div>
                    </div>
                    <div class="invest-data-history">
                        <div class="title">This Week</div>
                        <div class="amount">{{ show_item($bookingsStatistics['this_week']) }}</div>
                    </div>
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
                    <h6 class="title text-">Pending Bookings</h6>
                </div>
                <div class="card-tools">
                    <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Pending Car Booking" data-bs-original-title="Pending Car Booking"></em>
                </div>
            </div>
            <div class="card-amount">
                <span class="amount text-primary"> {{ show_item($bookingsStatistics['pending']) }} </span>

            </div>
            <div class="invest-data">
                <div class="invest-data-amount g-2">
                    <div class="invest-data-history">
                        <div class="title">Today</div>
                        <div class="amount">{{ show_item($bookingsStatistics['pending_today']) }}</div>
                    </div>
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
                    <h6 class="title text-">Cancelled Bookings</h6>
                </div>
                <div class="card-tools">
                    <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Pending Car Booking" data-bs-original-title="Pending Car Booking"></em>
                </div>
            </div>
            <div class="card-amount">
                <span class="amount text-primary"> {{ show_item($bookingsStatistics['cancelled']) }} </span>

            </div>
        </div>
    </div><!-- .card -->
</div><!-- .col -->
@endif
