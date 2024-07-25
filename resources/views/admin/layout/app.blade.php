
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
{{--    <meta name="author" content="HMO">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ settings('site_slogan') }}">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ settings('favicon') }}">
    <!-- Page Title  -->
    <title>{{ settings('site_name') }} | Dashboard</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashlite.css?ver=3.1.1') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('admin/assets/css/theme.css?ver=3.1.1') }}">

{{--    <link rel="stylesheet" href="/vendor/toastr/toastr.min.css">--}}
{{--    <link rel="stylesheet" href="/vendor/sweetalert/sweetalert.css">--}}


    @livewireStyles

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

            .features h5{
                font-weight: 100;
            }
            .features .content {
                background-color: #e5e9f2;
                /*margin: 0 10px;*/
                padding: 20px 10px;
                border-radius: 10px;
            }
        }

        .map-warper {
            height: 450px;
        }
        .map-warper #map-canvas {
            height: 100%;
            margin: 0px;
            padding: 0px;
            position: relative;
            overflow: hidden;
        }
        .nk-menu-icon .icon {
            font-size: 17px!important;
        }
        .nk-menu .active a {
            color: #fff;
            /*background-color: #1d2d40;*/
            /*border-radius: 5px;*/
            /*margin: 0 5px;*/
        }
        .search-in-menu {
            padding: 10px 18px 14px 22px;
        }
        .search-in-menu .form-control {
            background-color: #3c4d62;
            border-color: #3c4d62;
        }

        /* CSS */
        .image-picker {
            border: 1px dashed #ccc;
            position: relative;
            padding: 20px;
            min-height: 150px;
            cursor: pointer;

        }

        .picker_img{
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            opacity: 0.5;
            min-height: 150px;

        }

        .image-preview {
            display: none;
        }

        .dropzone-placeholder {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            /*color: #aaa;*/
            color: red;
            font-weight: 600;
        }



        .image-container {
            position: relative;
            display: inline-block;
        }

        .delete-icon {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 5px 8px;
            cursor: pointer;
        }

        .image-picker.active .dropzone-placeholder {
            display: none;
        }

        .image-picker.active .image-preview {
            display: block;
        }

        .my-editor {
            height: 100%;
            margin: 0;
            padding: 0;
        }



        .step-form {
            display: flex;
            justify-content: space-between;
            background-color: #f7f7f8;
            padding: 10px;
        }

        .step {
            flex: 1;
            text-align: center;
            padding: 10px;
            cursor: pointer;
            background-color: #e9ecef;
        }

        .step.active {
            background-color: #007bff;
            color: #ffffff;
        }
        .step.prev {
            background-color: #22D187;
            color: #ffffff;
        }

        .step:first-child {
            border-bottom-left-radius: 30px;
            border-top-left-radius: 30px;
        }
        .step:last-child {
            border-bottom-right-radius: 30px;
            border-top-right-radius: 30px;
        }

        .link-items li {
            cursor: pointer;
            padding: 5px 10px;
        }
        .invest-data-history .title {
            text-transform: capitalize;
        }

    </style>

    @yield('style')

    @stack('styles')

    <script>
        document.addEventListener('notify-success', (event) => {
            const message = event.detail.message;
            if(message){
                NioApp.Toast(message, 'success', {
                    position: 'top-right'
                });
            }
        });

          document.addEventListener('notify-error', (event) => {
            const message = event.detail.message;
            if(message){
                NioApp.Toast(message, 'error', {
                    position: 'top-right'
                });
            }
        });

        document.addEventListener('livewire:navigated', function () {
            initializeToggleSwitches();
            $('.lfm').filemanager('image');
        });


    </script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@php
    $menuArray = [
        [
            'url' => route('admin.dashboard'),
            'route' => 'admin-dashboard',
            'text' => 'Dashboard',
            'icon' => 'ni ni-dashboard-fill',
        ],

        [
            'url' => route('admin.user.admins'),
            'route' => 'admins-users',
            'text' => isOwner() ? 'Managers' : 'Admins',
            'icon' => 'ni ni-users-fill',
        ],

    ];
    if (hasTrips()) {
         $menuArray[] = [
        'url' => route('admin.drivers'),
        'route' => 'drivers-read',
        'text' => 'Drivers',
        'icon' => 'ni ni-users',
        ];
    }

    if (hasRental()) {
        $menuArray[] = [
            'url' => route('admin.rental.index'),
            'route' => 'rentals-read',
            'text' => 'Rental packages',
            'icon' => 'ni ni-view-x2',
        ];

         $menuArray[] = [
        'text' => 'Vehicle',
         'url' => route('admin.cars.index'),
        'icon' => 'ni ni-truck',
        'route' => 'cars-read'
    ];


//
    if (hasTrips()) {
        $menuArray[] = [
        'text' => 'Trips',
        'icon' => 'ni ni-tranx',
        'route' => 'trips-read',
        'submenu' => [
            [
                'url' => route('admin.trips.index', ['status' => 'pending']),
                'route' => 'trips-read',
                'text' => 'Pending',
            ],
            [
                'url' => route('admin.trips.index', ['status' => 'completed']),
                'text' => 'Completed',
                'route' => 'trips-read',
            ],
            [
                'url' => route('admin.trips.index', ['status' => 'scheduled']),
                'text' => 'Scheduled',
                'route' => 'trips-read',
            ],
            [
                'url' => route('admin.trips.index', ['status' => 'cancelled']),
                'text' => 'Cancelled',
                'route' => 'trips-read',
            ],
        ],
    ];
    }


    if(hasFleet()){
        $menuArray[] = [
        'url' => route('admin.companies.index'),
        'route' => 'companies-read',
        'text' => 'Companies',
        'icon' => 'ni ni-list-check',
        ];
    }


    $menuArray[] = [
        'url' => route('admin.complains.index'),
        'route' => 'complains-read',
        'text' => 'Complaints',
        'icon' => 'ni ni-file-docs',
    ];

    $menuArray[] = [
        'url' => route('admin.bookings.index'),
        'text' => 'Car Bookings',
        'route' => 'bookings-index',
        'icon' => 'ni ni-calendar-booking',
    ];


    $menuArray[] = [
        'url' => "#",
        'text' => 'Fleet Planning',
        'route' => 'cars-read',
        'icon' => 'ni ni-calender-date',
    ];

    $menuArray[] = [
        'url' => route('admin.rental.vehicle_checks'),
        'text' => 'Vehicle Checks',
        'route' => 'cars-read',
        'icon' => 'ni ni-calendar-check-fill',
    ];

    $menuArray[] = [
        'url' => route('admin.rental.vehicle_incidents'),
        'text' => 'Reported Incidents',
        'route' => 'cars-read',
        'icon' => 'ni ni-file-docs',
    ];

    $menuArray[] = [
        'url' => route('admin.rental.vehicle_defects'),
        'text' => 'Vehicle Defects',
        'route' => 'cars-read',
        'icon' => 'ni ni-linux-server',
    ];

    $menuArray[] = [
        'url' => route('admin.pcn.index'),
        'text' => 'PCNS',
        'route' => 'cars-read',
        'icon' => 'ni ni-note-add-fill',
    ];
    }

    $menuArray[] = [
        'text' => 'Configurations',
        'icon' => 'ni ni-coins',
        'route' => 'configurations',
        'submenu' => [
            [
                'url' => route('admin.settings.services'),
                'text' => 'Features activation',
                'route' => 'features-activation',
            ],
            [
                'url' => route('admin.roles.index'),
                'text' => 'User roles',
                'route' => 'roles-index',
            ],
            [
                'url' => route('admin.currencies.index'),
                'text' => 'Currencies',
                'route' => 'settings-services',
            ],
            [
                'url' => route('admin.vehicle_types.index'),
                'text' => 'Vehicle types',
                'route' => 'vehicle_types-read',
            ],
            [
                'url' => route('admin.vehicle_makes.index'),
                'text' => 'Vehicle makes',
                'route' => 'vehicle_makes-read',
            ],
            [
                'url' => route('admin.vehicle_models.index'),
                'text' => 'Vehicle models',
                'route' => 'vehicle_models-read',
            ],
            [
                'url' => route('admin.countries.index'),
                'route' => 'countries-read',
                'text' => 'Countries',
            ],
            [
                'url' => route('admin.documents.index'),
                'route' => 'documents-read',
                'text' => 'Documents',
            ],
            [
                'url' => route('admin.cancellation_reasons.index'),
                'text' => 'Cancellation Reasons',
                'route' => 'cancellation_reasons-read',
            ],
            [
                'url' => route('admin.faqs.index'),
                'text' => 'FAQs',
                'route' => 'faqs-read',
            ],
            [
                'url' => '#',
                'text' => 'Geofencing heat map',
            ],
            [
                'url' => '#',
                'text' => 'Translations',
            ],
        ],
    ];

    if (settings('enable_instant_ride') == 'yes') {
        $menuArray[] = [
            'url' => route('admin.services.index'),
            'text' => 'Services & Fees',
            'route' => 'services-read',
            'icon' => 'ni ni-invest',
        ];
        $menuArray[] = [
            'url' => route('admin.send.notification'),
            'text' => 'Send Notification',
            'route' => 'services-read',
            'icon' => 'ni ni-invest',
        ];
    }

    $menuArray[] = [
        'url' => route('admin.settings'),
        'text' => 'System Settings',
        'route' => 'settings-read',
        'icon' => 'ni ni-setting-alt-fill',
    ];


    $menuArray[] = [
        'url' => route('admin.activity.log'),
        'text' => 'Activity Log',
        'route' => 'settings-read',
        'icon' => 'ni ni-activity-round-fill',
    ];



    $menuArray[] = [
        'text' => 'CMS Section',
        'type' => 'heading',
        'route' => 'cms-setup',
    ];

    $menuArray[] = [
        'text' => 'CMS Setup',
        'icon' => 'ni ni-layers-fill',
        'route' => 'website-pages',
        'submenu' => [
            [
                'url' => route('admin.settings.theme'),
                'text' => 'Theme setting',
                'route' => 'settings-components',
            ],

            [
                'url' => route('admin.setting.pages'),
                'route' => 'settings-pages',
                'text' => 'Website Pages',
            ],
            [
                'url' => route('admin.settings.css'),
                'route' => 'settings-pages',
                'text' => 'Custom CSS',
            ],
            [
                'url' => route('admin.settings.head_foot'),
                'route' => 'settings-pages',
                'text' => 'Inject head & foot',
            ],
            [
                'url' => route('admin.settings.menu_setup'),
                'route' => 'settings-pages',
                'text' => 'Menu setup',
            ],
            [
                'url' => '#',
                'text' => 'Safety Page',
            ],
            [
                'url' => '#',
                'text' => 'Service Page',
            ],
            [
                'url' => '#',
                'text' => 'Privacy Page',
            ],
            [
                'url' => '#',
                'text' => 'Driver Register Page',
            ],
            [
                'url' => '#',
                'text' => 'Apply Page',
            ],
            [
                'url' => '#',
                'text' => 'How it works Page',
            ],
            [
                'url' => '#',
                'text' => 'Contact us Page',
            ],
            [
                'url' => '#',
                'text' => 'Playstore Page',
            ],
            [
                'url' => '#',
                'text' => 'Footer page Page',
            ],
            [
                'url' => '#',
                'text' => 'Color scheme',
            ],
        ],
    ];
@endphp


<body class="nk-body bg-lighter- npc-general has-sidebar {{ settings('is_dark') == 'yes' ? 'dark-mode' : '' }} ">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- sidebar @s -->
        <div class="nk-sidebar nk-sidebar-fixed is-dark  {{ settings('is_dark') == 'yes' ? 'is-dark-' : '' }}" data-content="sidebarMenu">
            <div class="nk-sidebar-element nk-sidebar-head">
                <div class="nk-menu-trigger">
                    <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                    <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                </div>
                <div class="nk-sidebar-brand">
                    <a href="{{ route('admin.dashboard') }}" class="logo-link nk-sidebar-logo">
                        <img class="logo-light logo-img" src="{{ settings('light_logo') }}"  alt="logo">
                        <img class="logo-dark logo-img" src="{{ settings('dark_logo') }}" alt="logo-dark">
                    </a>
                </div>
            </div><!-- .nk-sidebar-element -->

            <div class="nk-sidebar-element nk-sidebar-body">
                <div class="nk-sidebar-content">
                    <div class="nk-sidebar-menu" data-simplebar>


                        <ul class="nk-menu">
{{--                            <li class="nk-menu-item search-in-menu">--}}
{{--                                <input class="form-control" placeholder="search in menu" />--}}
{{--                            </li>--}}
                            @foreach ($menuArray as $menu)



                                @permission($menu['route'])


                            @if (isset($menu['type']) && $menu['type'] === 'heading')
                                    <li class="nk-menu-heading">
                                        <h6 class="overline-title text-primary-alt">{{ $menu['text'] }}</h6>
                                    </li>
                                @else
                                    @php
                                        $url = isset($menu['url']) ? $menu['url'] : '#';
                                    @endphp

{{--                                <p>{{ $menu['route'] }}</p>--}}
                                    <li class="nk-menu-item{{ isset($menu['submenu']) ? ' has-sub' : '' }}">
{{--                                        @if ($url)--}}
                                            <a  href="{{ $url }}" {{ isset($menu['submenu']) ? '' : 'wire:navigate_' }}  class="nk-menu-link{{ isset($menu['submenu']) ? ' nk-menu-toggle' : '' }}">
                                                @if (isset($menu['icon']))
                                                    <span class="nk-menu-icon"><em class="icon ni {{ $menu['icon'] }}"></em></span>
                                                @endif
                                                <span class="nk-menu-text">{{ $menu['text'] }} </span>
                                            </a>
{{--                                        @else--}}
{{--                                            <span class="nk-menu-text">{{ $menu['text'] }}</span>--}}
{{--                                        @endif--}}

                                        @if (isset($menu['submenu']))
                                            <ul class="nk-menu-sub">
                                                @foreach ($menu['submenu'] as $submenu)
                                                    @if(isset($submenu['route']))
                                                    @permission($submenu['route'])
                                                    @php
                                                        $submenuUrl = isset($submenu['url']) ? $submenu['url'] : '#';
                                                    @endphp
                                                    @if ($submenuUrl)
                                                        <li class="nk-menu-item">
                                                            <a  href="{{ $submenuUrl }}" wire:navigate_ class="nk-menu-link">
                                                                <span class="nk-menu-text">{{ $submenu['text'] }}</span>
                                                            </a>
                                                        </li>
                                                    @endif
                                                    @endpermission
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endif
                                @endpermission
                            @endforeach
                        </ul>


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


                        <div class="nk-header-news d-none d-xl-block">
                            <div class="nk-news-list">
                                <a class="nk-news-item" title="Open frontend" target="_blank" href="{{ url('/') }}">
                                    <div class="nk-news-icon">
                                        <em class="icon ni ni-globe"></em>
                                    </div>
                                </a>
                            </div>
                        </div>

{{--                        <div class="nk-header-news d-none d-xl-block">--}}
{{--                            <div class="nk-news-list">--}}
{{--                                <a class="nk-news-item btn btn-warning" href="#">--}}
{{--                                    <div class="nk-news-icon">--}}
{{--                                        <em class="icon ni ni-box"></em>--}}
{{--                                    </div>--}}
{{--                                    <div class="nk-news-text-">--}}
{{--                                        <p>Clear Cache</p>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}




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
                                                <li>
                                                    <a class="dark-switch-" href="{{ route('admin.settings.toggle_theme') }}"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a>
                                                </li>
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
                        <div class="nk-footer-copyright"> &copy; 2023 {{ settings('site_name', env('APP_NAME')) }}
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


<script  src="{{ asset('admin/assets/js/bundle.js?ver=3.1.1') }}"></script>

<script src="{{ asset('admin/assets/js/scripts.js?ver=3.1.1') }}"></script>



{{--<script src="{{ asset('admin/assets/js/bundle.js?ver=3.1.1') }}" data-navigate-track></script>--}}
<script src="{{ asset('admin/assets/js/charts/gd-default.js?ver=3.1.1') }}"></script>
<script src="{{ asset('admin/assets/js/libs/datatable-btns.js?ver=3.1.1') }}"></script>
<script src="{{ asset('admin/assets/js/libs/datatable-btns.js?ver=3.1.1') }}"></script>

<script src="./assets/js/example-toastr.js?ver=3.1.1"></script>

{{--<script src="./assets/js/bundle.js?ver=3.1.1"></script>--}}
{{--<script src="./assets/js/scripts.js?ver=3.1.1"></script>--}}
{{--<script src="./assets/js/libs/datatable-btns.js?ver=3.1.1"></script>--}}

{{--<script src="/vendor/sweetalert/sweetalert.min.js"></script>--}}

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="/vendor/toastr/toastr.min.js"></script>

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



@livewireScripts


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

{{--<script>--}}

{{--document.addEventListener('DOMContentLoaded', function () {--}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
        initializeToggleSwitches();
    });


    function initializeToggleSwitches() {
        let toggleSwitches = document.querySelectorAll('.custom-control-input');
        toggleSwitches.forEach(switchElement => {
            switchElement.addEventListener('change', function () {
                let isActive = this.checked;
                let modelType = this.dataset.model;
                let field = this.dataset.field;
                let modelId = this.dataset.modelId;

                axios.put(`/admin/api/toggle/${modelId}`, {
                    field: field,
                    model: modelType,
                    value: isActive,
                })
                    .then(response => {
                        // Handle success
                        if (response.data.success) {
                            NioApp.Toast('Status updated successfully', 'success', {
                                position: 'top-right'
                            });
                        } else {
                            // Handle other scenarios if needed
                        }
                    })
                    .catch(error => {
                        // Handle error if needed
                    });
            });
        });
    }

    function removeImage(deleteIcon) {
        const imageItem = deleteIcon.parentElement;
        const imageSrc = imageItem.querySelector('img').src;
        const imagesInput = document.querySelector('input[name="images[]"][value="' + imageSrc + '"]');

        if (imagesInput) {
            imagesInput.remove(); // Remove the hidden input field for the image
        }
        imageItem.remove(); // Remove the image container from the DOM
    }

</script>

<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>


<script>
    $('.lfm').filemanager('image');
</script>

@stack('scripts')

</body>

</html>
