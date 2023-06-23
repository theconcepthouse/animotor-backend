
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="HMO">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="HMO">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/fav.png') }}">
    <!-- Page Title  -->
    <title>{{ env('APP_NAME') }} | Dashboard</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashlite.css?ver=3.1.1') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('admin/assets/css/theme.css?ver=3.1.1') }}">

{{--    <link rel="stylesheet" href="/vendor/toastr/toastr.min.css">--}}
    <link rel="stylesheet" href="/vendor/sweetalert/sweetalert.css">

    @yield('style')

    <style>
        /*290*/
        @media (min-width: 1200px){

            .nk-sidebar {
                overflow: hidden;
                transform: translateX(0);
                width: 240px;
            }

            .nk-sidebar + .nk-wrap > .nk-header-fixed, .nk-sidebar-overlay + .nk-wrap > .nk-header-fixed {
                left: 240px;
            }

            .nk-sidebar + .nk-wrap, .nk-sidebar-overlay + .nk-wrap {
                padding-left: 240px;
            }
        }
    </style>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- sidebar @s -->
        <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
            <div class="nk-sidebar-element nk-sidebar-head">
                <div class="nk-menu-trigger">
                    <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                    <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                </div>
                <div class="nk-sidebar-brand">
                    <a href="{{ route('admin.dashboard') }}" class="logo-link nk-sidebar-logo">
                        <img class="logo-light logo-img" src="{{ asset('default/logo.png') }}"  alt="logo">
                        <img class="logo-dark logo-img" src="/icon/logo_md.png" alt="logo-dark">
                    </a>
                </div>
            </div><!-- .nk-sidebar-element -->

            <div class="nk-sidebar-element nk-sidebar-body">
                <div class="nk-sidebar-content">
                    <div class="nk-sidebar-menu" data-simplebar>
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

{{--                            <li class="nk-menu-item">--}}
{{--                                <a href="html/crm/admins" class="nk-menu-link">--}}
{{--                                    <span class="nk-menu-icon"><em class="icon ni ni-task-fill-c"></em></span>--}}
{{--                                    <span class="nk-menu-text">Manage fleets</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}

                            <!-- .nk-menu-item -->

                            <li class="nk-menu-item">
                                <a href="{{ route('admin.regions.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-globe"></em></span>
                                    <span class="nk-menu-text">Regions</span>
                                </a>
                            </li><!-- .nk-menu-item -->


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



                            <li class="nk-menu-item">
                                <a href="{{ route('admin.riders') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-user-list-fill"></em></span>
                                    <span class="nk-menu-text">Riders</span>
                                </a>
                            </li><!-- .nk-menu-item -->


{{--                            <li class="nk-menu-item has-sub">--}}
{{--                                <a href="#" class="nk-menu-link nk-menu-toggle">--}}
{{--                                    <span class="nk-menu-icon"><em class="icon ni ni-growth-fill"></em></span>--}}
{{--                                    <span class="nk-menu-text">Reports</span>--}}
{{--                                </a>--}}
{{--                                <ul class="nk-menu-sub">--}}
{{--                                    <li class="nk-menu-item">--}}
{{--                                        <a href="html/crm/dealing-info.html" class="nk-menu-link"><span class="nk-menu-text">User report Info</span></a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nk-menu-item">--}}
{{--                                        <a href="html/crm/client-report.html" class="nk-menu-link"><span class="nk-menu-text">Driver report</span></a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nk-menu-item">--}}
{{--                                        <a href="html/crm/expense-report.html" class="nk-menu-link"><span class="nk-menu-text">Owner report</span></a>--}}
{{--                                    </li>   <li class="nk-menu-item">--}}
{{--                                        <a href="html/crm/expense-report.html" class="nk-menu-link"><span class="nk-menu-text">Financial report</span></a>--}}
{{--                                    </li>--}}
{{--                                </ul><!-- .nk-menu-sub -->--}}
{{--                            </li>--}}

                            <!-- .nk-menu-item -->



                            <li class="nk-menu-item">
                                <a href="{{ route('admin.complains.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                    <span class="nk-menu-text">Complaints</span>
                                </a>
                            </li><!-- .nk-menu-item -->


                            <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                    <span class="nk-menu-text">Configurations</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item"><a href="{{ route('admin.roles.index') }}" class="nk-menu-link"><span class="nk-menu-text">User roles</span></a></li>
{{--                                    <li class="nk-menu-item"><a href="{{ route('admin.regions.index') }}" class="nk-menu-link"><span class="nk-menu-text">Service regions</span></a></li>--}}
                                    <li class="nk-menu-item"><a href="{{ route('admin.vehicle_types.index') }}" class="nk-menu-link"><span class="nk-menu-text">Vehicle types</span></a></li>
                                    <li class="nk-menu-item"><a href="{{ route('admin.vehicle_makes.index') }}" class="nk-menu-link"><span class="nk-menu-text">Vehicle makes</span></a></li>
                                    <li class="nk-menu-item"><a href="{{ route('admin.vehicle_models.index') }}" class="nk-menu-link"><span class="nk-menu-text">Vehicle models</span></a></li>
                                    <li class="nk-menu-item"><a href="{{ route('admin.countries.index') }}" class="nk-menu-link"><span class="nk-menu-text">Countries</span></a></li>
                                    <li class="nk-menu-item"><a href="{{ route('admin.documents.index') }}" class="nk-menu-link"><span class="nk-menu-text">Documents</span></a></li>
                                    <li class="nk-menu-item"><a href="{{ route('admin.cancellation_reasons.index') }}" class="nk-menu-link"><span class="nk-menu-text">Cancellation Reasons</span></a></li>
{{--                                    <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">Owner needed docs</span></a></li>--}}
{{--                                    <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">Fleet needed docs</span></a></li>--}}
{{--                                    <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">Rental package type</span></a></li>--}}
{{--                                    <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">Emergency number</span></a></li>--}}
                                    <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">Geofencing heat map</span></a></li>
                                    <li class="nk-menu-item"><a href="#" class="nk-menu-link"><span class="nk-menu-text">Translations</span></a></li>

                                </ul><!-- .nk-menu-sub -->
                            </li><!-- .nk-menu-item -->


{{--                            <li class="nk-menu-item">--}}
{{--                                <a href="#" class="nk-menu-link">--}}
{{--                                    <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>--}}
{{--                                    <span class="nk-menu-text">Manage owners</span>--}}
{{--                                </a>--}}
{{--                            </li><!-- .nk-menu-item -->--}}



                            <li class="nk-menu-item">
                                <a href="{{ route('admin.services.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-invest"></em></span>
                                    <span class="nk-menu-text">Services & Fees</span>
                                </a>
                            </li><!-- .nk-menu-item -->


                            <!--                                <li class="nk-menu-item">-->
                            <!--                                    <a href="html/crm/support.html" class="nk-menu-link">-->
                            <!--                                        <span class="nk-menu-icon"><em class="icon ni ni-chat-circle-fill"></em></span>-->
                            <!--                                        <span class="nk-menu-text">Support</span>-->
                            <!--                                    </a>-->
                            <!--                                </li>&lt;!&ndash; .nk-menu-item &ndash;&gt;-->
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
                                        <a href="#" class="nk-menu-link"><span class="nk-menu-text">Home page</span></a>
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

                        </ul><!-- .nk-menu -->
                    </div><!-- .nk-sidebar-menu -->
                </div><!-- .nk-sidebar-content -->
            </div><!-- .nk-sidebar-element -->


        </div>
        <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <div class="nk-header nk-header-fixed is-light">
                <div class="container-fluid">
                    <div class="nk-header-wrap">
                        <div class="nk-menu-trigger d-xl-none ms-n1">
                            <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                        </div>
                        <div class="nk-header-brand d-xl-none">
                            <a href="/admin/dashboard" class="logo-link">
                                <img class="logo-light logo-img" src="/icon/logo_md.png"alt="logo">
                                <img class="logo-dark logo-img" src="/icon/logo_md.png" srcset="/icon/logo_md.png 2x" alt="logo-dark">
                            </a>
                        </div><!-- .nk-header-brand -->

                        <div class="nk-header-tools">
                            <ul class="nk-quick-nav">

                                <li class="dropdown user-dropdown">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                        <div class="user-toggle">
                                            <div class="user-avatar sm">
                                                <em class="icon ni ni-user-alt"></em>
                                            </div>
                                            <div class="user-info d-none d-md-block">
                                                <div class="user-status text-uppercase">{{ auth()->user()->role() }}</div>
                                                <div class="user-name dropdown-indicator text-uppercase">{{ auth()->user()->name }}</div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                                        <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                            <div class="user-card">
                                                <div class="user-avatar">
                                                    <span>AB</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="lead-text">{{ auth()->user()->name }}</span>
                                                    <span class="sub-text">{{ auth()->user()->email }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
{{--                                                <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>--}}
                                                <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">

                                                <li>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        <em class="icon ni ni-signout"></em><span>Sign out</span>
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li><!-- .dropdown -->

                            </ul><!-- .nk-quick-nav -->
                        </div><!-- .nk-header-tools -->
                    </div><!-- .nk-header-wrap -->
                </div><!-- .container-fliud -->
            </div>
            <!-- main header @e -->

            <!-- content @s -->
           @yield('content')
            <!-- content @e -->

            <!-- footer @s -->
            <div class="nk-footer">
                <div class="container-fluid">
                    <div class="nk-footer-wrap">
                        <div class="nk-footer-copyright"> &copy; 2023 {{ env('APP_NAME') }}
                        </div>

                    </div>
                </div>
            </div>
            <!-- footer @e -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- select region modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="region">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title mb-4">Select Your Country</h5>
                <div class="nk-country-region">
                    <ul class="country-list text-center gy-2">
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/arg.png" alt="" class="country-flag">
                                <span class="country-name">Argentina</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/aus.png" alt="" class="country-flag">
                                <span class="country-name">Australia</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/bangladesh.png" alt="" class="country-flag">
                                <span class="country-name">Bangladesh</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/canada.png" alt="" class="country-flag">
                                <span class="country-name">Canada <small>(English)</small></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/china.png" alt="" class="country-flag">
                                <span class="country-name">Centrafricaine</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/china.png" alt="" class="country-flag">
                                <span class="country-name">China</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/french.png" alt="" class="country-flag">
                                <span class="country-name">France</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/germany.png" alt="" class="country-flag">
                                <span class="country-name">Germany</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/iran.png" alt="" class="country-flag">
                                <span class="country-name">Iran</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/italy.png" alt="" class="country-flag">
                                <span class="country-name">Italy</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/mexico.png" alt="" class="country-flag">
                                <span class="country-name">México</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/philipine.png" alt="" class="country-flag">
                                <span class="country-name">Philippines</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/portugal.png" alt="" class="country-flag">
                                <span class="country-name">Portugal</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/s-africa.png" alt="" class="country-flag">
                                <span class="country-name">South Africa</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/spanish.png" alt="" class="country-flag">
                                <span class="country-name">Spain</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/switzerland.png" alt="" class="country-flag">
                                <span class="country-name">Switzerland</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/uk.png" alt="" class="country-flag">
                                <span class="country-name">United Kingdom</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="./images/flags/english.png" alt="" class="country-flag">
                                <span class="country-name">United State</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- .modal-content -->
    </div><!-- .modla-dialog -->
</div><!-- .modal -->
<!-- JavaScript -->


<script src="{{ asset('admin/assets/js/bundle.js?ver=3.1.1') }}"></script>
<script src="{{ asset('admin/assets/js/scripts.js?ver=3.1.1') }}"></script>
<script src="{{ asset('admin/assets/js/charts/gd-default.js?ver=3.1.1') }}"></script>
<script src="{{ asset('admin/assets/js/libs/datatable-btns.js?ver=3.1.1') }}"></script>
<script src="{{ asset('admin/assets/js/libs/datatable-btns.js?ver=3.1.1') }}"></script>


{{--<script src="./assets/js/bundle.js?ver=3.1.1"></script>--}}
{{--<script src="./assets/js/scripts.js?ver=3.1.1"></script>--}}
{{--<script src="./assets/js/libs/datatable-btns.js?ver=3.1.1"></script>--}}

<script src="/vendor/sweetalert/sweetalert.min.js"></script>

{{--<script src="/vendor/toastr/toastr.min.js"></script>--}}

@yield('js')

@if (session('success'))
    <script>
        "use strict";
        $(document).ready(function () {
            swal("Success!", "{{ session('success') }}", "success");
        });
    </script>
@endif

@if (session('alert'))
    <script>
        "use strict";
        $(document).ready(function () {
            swal("Opps!", "{{ session('alert') }}", "error");
        });
    </script>
@endif
@if (session('failure'))
    <script>
        "use strict";
        $(document).ready(function () {
            swal("Opps!", "{{ session('failure') }}", "error");
        });
    </script>
@endif




</body>

</html>
