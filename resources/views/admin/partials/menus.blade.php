<ul class="nk-menu">
    <li class="nk-menu-item">
        <a href="{{ route('admin.dashboard') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
            <span class="nk-menu-text">Dashboard</span>
        </a>
    </li><!-- .nk-menu-item -->

    <li class="nk-menu-item">
        <a href="{{ route('admin.user.admins') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
            <span class="nk-menu-text">Admins</span>
        </a>
    </li><!-- .nk-menu-item -->


    <li class="nk-menu-item">
        <a href="{{ route('admin.regions.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-globe"></em></span>
            <span class="nk-menu-text">Regions</span>
        </a>
    </li><!-- .nk-menu-item -->


    @if(settings('enable_instant_ride') == 'yes')

        <li class="nk-menu-item has-sub">
            <a href="#" class="nk-menu-link nk-menu-toggle">
                <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                <span class="nk-menu-text">Trips</span>
            </a>
            <ul class="nk-menu-sub">
                <li class="nk-menu-item">
                    <a href="{{ route('admin.trips.index',['status' => 'pending']) }}" class="nk-menu-link"><span class="nk-menu-text">Pending</span></a>
                </li>
                <li class="nk-menu-item">
                    <a href="{{ route('admin.trips.index',['status' => 'completed']) }}" class="nk-menu-link"><span class="nk-menu-text">Completed</span></a>
                </li>
                <li class="nk-menu-item">
                    <a href="{{ route('admin.trips.index', ['status' => 'scheduled']) }}" class="nk-menu-link"><span class="nk-menu-text">Scheduled </span></a>
                </li>
                <li class="nk-menu-item">
                    <a href="{{ route('admin.trips.index',['status' => 'cancelled']) }}" class="nk-menu-link"><span class="nk-menu-text">Cancelled</span></a>
                </li>
            </ul><!-- .nk-menu-sub -->
        </li><!-- .nk-menu-item -->

        <li class="nk-menu-item has-sub">
            <a href="#" class="nk-menu-link nk-menu-toggle">
                <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                <span class="nk-menu-text">Drivers</span>
            </a>
            <ul class="nk-menu-sub">
                <li class="nk-menu-item">
                    <a href="{{ route('admin.drivers.index',['status' => 'approved']) }}" class="nk-menu-link"><span class="nk-menu-text">Active</span></a>
                </li>
                <li class="nk-menu-item">
                    <a href="{{ route('admin.drivers.index',['status' => 'unapproved']) }}" class="nk-menu-link"><span class="nk-menu-text">Inactive</span></a>
                </li>

                <li class="nk-menu-item">
                    <a href="{{ route('admin.drivers.index', ['status' => 'online']) }}" class="nk-menu-link"><span class="nk-menu-text">Online</span></a>
                </li>
                <li class="nk-menu-item">
                    <a href="html/crm/organizations.html" class="nk-menu-link"><span class="nk-menu-text">Withdrawal requests</span></a>
                </li>
                <li class="nk-menu-item">
                    <a href="{{ route('admin.drivers.index', ['status' => 'negative_balance']) }}" class="nk-menu-link"><span class="nk-menu-text">Negative balance</span></a>
                </li>
            </ul><!-- .nk-menu-sub -->
        </li><!-- .nk-menu-item -->

    @endif



    <li class="nk-menu-item">
        <a href="{{ route('admin.riders') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-user-list-fill"></em></span>
            <span class="nk-menu-text">Customers</span>
        </a>
    </li><!-- .nk-menu-item -->



    <li class="nk-menu-item">
        <a href="{{ route('admin.companies.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-list-check"></em></span>
            <span class="nk-menu-text">Companies</span>
        </a>
    </li><!-- .nk-menu-item -->

    <li class="nk-menu-item">
        <a href="{{ route('admin.complains.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
            <span class="nk-menu-text">Complaints</span>
        </a>
    </li><!-- .nk-menu-item -->

    @if(settings('enable_rental') == 'yes')
        <li class="nk-menu-item">
            <a href="{{ route('admin.rental.index') }}" class="nk-menu-link">
                <span class="nk-menu-icon"><em class="icon ni ni-view-x2"></em></span>
                <span class="nk-menu-text">Rental packages</span>
            </a>
        </li><!-- .nk-menu-item -->

        <li class="nk-menu-item">
            <a href="{{ route('admin.cars.index') }}" class="nk-menu-link">
                <span class="nk-menu-icon"><em class="icon ni ni-layout-fill"></em></span>
                <span class="nk-menu-text">Cars</span>
            </a>
        </li><!-- .nk-menu-item -->


        <li class="nk-menu-item has-sub">
            <a href="#" class="nk-menu-link nk-menu-toggle">
                <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                <span class="nk-menu-text">Car Bookings</span>
            </a>
            <ul class="nk-menu-sub">

                <li class="nk-menu-item">
                    <a href="{{ route('admin.bookings.index',['status' => 'all']) }}" class="nk-menu-link"><span class="nk-menu-text">All rentals</span></a>
                </li>

                <li class="nk-menu-item">
                    <a href="{{ route('admin.bookings.index',['status' => 'completed']) }}" class="nk-menu-link"><span class="nk-menu-text">Completed</span></a>
                </li>

                <li class="nk-menu-item">
                    <a href="{{ route('admin.bookings.index', ['status' => 'pending']) }}" class="nk-menu-link"><span class="nk-menu-text">Pending</span></a>
                </li>
                <li class="nk-menu-item">
                    <a href="{{ route('admin.bookings.index', ['status' => 'cancelled']) }}" class="nk-menu-link"><span class="nk-menu-text">Cancelled</span></a>
                </li>

            </ul><!-- .nk-menu-sub -->
        </li><!-- .nk-menu-item -->
    @endif

    <li class="nk-menu-item has-sub">
        <a href="#" class="nk-menu-link nk-menu-toggle">
            <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
            <span class="nk-menu-text">Configurations</span>
        </a>
        <ul class="nk-menu-sub">
            <li class="nk-menu-item"><a href="{{ route('admin.settings.services') }}" class="nk-menu-link"><span class="nk-menu-text">Booking types</span></a></li>

            <li class="nk-menu-item"><a href="{{ route('admin.roles.index') }}" class="nk-menu-link"><span class="nk-menu-text">User roles</span></a></li>
            <li class="nk-menu-item"><a href="{{ route('admin.vehicle_types.index') }}" class="nk-menu-link"><span class="nk-menu-text">Vehicle types</span></a></li>
            <li class="nk-menu-item"><a href="{{ route('admin.vehicle_makes.index') }}" class="nk-menu-link"><span class="nk-menu-text">Vehicle makes</span></a></li>
            <li class="nk-menu-item"><a href="{{ route('admin.vehicle_models.index') }}" class="nk-menu-link"><span class="nk-menu-text">Vehicle models</span></a></li>
            <li class="nk-menu-item"><a href="{{ route('admin.countries.index') }}" class="nk-menu-link"><span class="nk-menu-text">Countries</span></a></li>
            <li class="nk-menu-item"><a href="{{ route('admin.documents.index') }}" class="nk-menu-link"><span class="nk-menu-text">Documents</span></a></li>
            <li class="nk-menu-item"><a href="{{ route('admin.cancellation_reasons.index') }}" class="nk-menu-link"><span class="nk-menu-text">Cancellation Reasons</span></a></li>
            <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">Geofencing heat map</span></a></li>
            <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">Translations</span></a></li>

        </ul><!-- .nk-menu-sub -->
    </li><!-- .nk-menu-item -->


    @if(settings('enable_instant_ride') == 'yes')
        <li class="nk-menu-item">
            <a href="{{ route('admin.services.index') }}" class="nk-menu-link">
                <span class="nk-menu-icon"><em class="icon ni ni-invest"></em></span>
                <span class="nk-menu-text">Services & Fees</span>
            </a>
        </li><!-- .nk-menu-item -->
    @endif
    <li class="nk-menu-item">
        <a href="{{ route('admin.settings') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-setting-alt-fill"></em></span>
            <span class="nk-menu-text">System Settings</span>
        </a>
    </li><!-- .nk-menu-item -->
    <li class="nk-menu-heading">
        <h6 class="overline-title text-primary-alt">CMS Setup</h6>
    </li><!-- .nk-menu-item -->
    <li class="nk-menu-item has-sub">
        <a href="#" class="nk-menu-link nk-menu-toggle">
            <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
            <span class="nk-menu-text">Website pages</span>
        </a>
        <ul class="nk-menu-sub">
            <li class="nk-menu-item">
                <a href="{{ route('admin.setting.components') }}" class="nk-menu-link"><span class="nk-menu-text">Theme components</span></a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route('admin.setting.pages') }}" class="nk-menu-link"><span class="nk-menu-text">CMS Pages</span></a>
            </li>
            <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">Safety Page</span></a></li>
            <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">Service Page</span></a></li>
            <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">Privacy Page</span></a></li>
            <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">Driver Register Page</span></a></li>
            <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">Apply  Page</span></a></li>
            <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">How it works  Page</span></a></li>
            <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">Contact us Page</span></a></li>
            <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">Playstore Page</span></a></li>
            <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">Footer page Page</span></a></li>
            <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">Color scheme</span></a></li>
        </ul><!-- .nk-menu-sub -->
    </li><!-- .nk-menu-item -->

    <li class="nk-menu-item has-sub">
        <a href="#" class="nk-menu-link nk-menu-toggle">
            <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
            <span class="nk-menu-text">Legal</span>
        </a>
        <ul class="nk-menu-sub">
            <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">DMV Page</span></a></li>
            <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">Compliance Page</span></a></li>
            <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">Terms Page</span></a></li>
        </ul><!-- .nk-menu-sub -->
    </li><!-- .nk-menu-item -->

</ul>
