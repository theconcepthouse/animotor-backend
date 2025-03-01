
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

         [
            'url' => route('admin.regions.index'),
            'route' => 'regions-read',
            'text' => 'Regions',
            'icon' => 'ni ni-globe',
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

//         $menuArray[] = [
//            'text' => 'Vehicle',
//             'url' => route('admin.vehicle.index'),
//            'icon' => 'ni ni-truck',
//            'route' => 'cars-read'
//        ];
        $menuArray[] = [
            'text' => 'Car',
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


//    $menuArray[] = [
//        'url' => route('admin.fleet.index'),
//        'text' => 'Fleet Planning',
//        'route' => 'cars-read',
//        'icon' => 'ni ni-calender-date',
//    ];
    $menuArray[] = [
        'url' => route('admin.fleetEvent'),
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
        'url' => route('admin.incident.index'),
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
        'url' => route('admin.rental.vehicle_defects'),
        'text' => 'Vehicle Inspection',
        'route' => 'cars-read',
        'icon' => 'ni ni-activity',
    ];
    $menuArray[] = [
        'url' => route('admin.workshop.index'),
        'text' => 'Workshops',
        'route' => 'cars-read',
        'icon' => 'ni ni-building',
    ];
    $menuArray[] = [
        'url' => route('admin.message.index'),
        'text' => 'Message',
        'route' => 'cars-read',
        'icon' => 'ni ni-mail',
    ];
    $menuArray[] = [
        'url' => route('admin.mailTracker.index'),
        'text' => 'Mail Tracker',
        'route' => 'cars-read',
        'icon' => 'ni ni-mail-fill',
    ];

    $menuArray[] = [
        'url' => route('admin.pcns.index'),
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
                                <svg width="146" height="31" viewBox="0 0 146 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M45.1548 19.34H39.5948L38.6748 22H35.7348L40.7548 8.02H44.0148L49.0348 22H46.0748L45.1548 19.34ZM44.3948 17.1L42.3748 11.26L40.3548 17.1H44.3948ZM62.8513 22H60.0513L53.7113 12.42V22H50.9113V8.02H53.7113L60.0513 17.62V8.02H62.8513V22ZM68.4183 8.04V22H65.6183V8.04H68.4183ZM91.1703 8.04V22H88.3703V12.92L84.6303 22H82.5103L78.7503 12.92V22H75.9503V8.04H79.1303L83.5703 18.42L88.0103 8.04H91.1703ZM98.8586 22.18C97.7919 22.18 96.8319 21.9467 95.9786 21.48C95.1253 21 94.4519 20.3267 93.9586 19.46C93.4786 18.5933 93.2386 17.5933 93.2386 16.46C93.2386 15.3267 93.4853 14.3267 93.9786 13.46C94.4853 12.5933 95.1719 11.9267 96.0386 11.46C96.9053 10.98 97.8719 10.74 98.9386 10.74C100.005 10.74 100.972 10.98 101.839 11.46C102.705 11.9267 103.385 12.5933 103.879 13.46C104.385 14.3267 104.639 15.3267 104.639 16.46C104.639 17.5933 104.379 18.5933 103.859 19.46C103.352 20.3267 102.659 21 101.779 21.48C100.912 21.9467 99.9386 22.18 98.8586 22.18ZM98.8586 19.74C99.3653 19.74 99.8386 19.62 100.279 19.38C100.732 19.1267 101.092 18.7533 101.359 18.26C101.625 17.7667 101.759 17.1667 101.759 16.46C101.759 15.4067 101.479 14.6 100.919 14.04C100.372 13.4667 99.6986 13.18 98.8986 13.18C98.0986 13.18 97.4253 13.4667 96.8786 14.04C96.3453 14.6 96.0786 15.4067 96.0786 16.46C96.0786 17.5133 96.3386 18.3267 96.8586 18.9C97.3919 19.46 98.0586 19.74 98.8586 19.74ZM109.953 13.22V18.58C109.953 18.9533 110.039 19.2267 110.213 19.4C110.399 19.56 110.706 19.64 111.133 19.64H112.433V22H110.673C108.313 22 107.133 20.8533 107.133 18.56V13.22H105.813V10.92H107.133V8.18H109.953V10.92H112.433V13.22H109.953ZM119.366 22.18C118.3 22.18 117.34 21.9467 116.486 21.48C115.633 21 114.96 20.3267 114.466 19.46C113.986 18.5933 113.746 17.5933 113.746 16.46C113.746 15.3267 113.993 14.3267 114.486 13.46C114.993 12.5933 115.68 11.9267 116.546 11.46C117.413 10.98 118.38 10.74 119.446 10.74C120.513 10.74 121.48 10.98 122.346 11.46C123.213 11.9267 123.893 12.5933 124.386 13.46C124.893 14.3267 125.146 15.3267 125.146 16.46C125.146 17.5933 124.886 18.5933 124.366 19.46C123.86 20.3267 123.166 21 122.286 21.48C121.42 21.9467 120.446 22.18 119.366 22.18ZM119.366 19.74C119.873 19.74 120.346 19.62 120.786 19.38C121.24 19.1267 121.6 18.7533 121.866 18.26C122.133 17.7667 122.266 17.1667 122.266 16.46C122.266 15.4067 121.986 14.6 121.426 14.04C120.88 13.4667 120.206 13.18 119.406 13.18C118.606 13.18 117.933 13.4667 117.386 14.04C116.853 14.6 116.586 15.4067 116.586 16.46C116.586 17.5133 116.846 18.3267 117.366 18.9C117.9 19.46 118.566 19.74 119.366 19.74ZM130 12.64C130.36 12.0533 130.827 11.5933 131.4 11.26C131.987 10.9267 132.654 10.76 133.4 10.76V13.7H132.66C131.78 13.7 131.114 13.9067 130.66 14.32C130.22 14.7333 130 15.4533 130 16.48V22H127.2V10.92H130V12.64ZM139.526 22.18C138.62 22.18 137.806 22.02 137.086 21.7C136.366 21.3667 135.793 20.92 135.366 20.36C134.953 19.8 134.726 19.18 134.686 18.5H137.506C137.56 18.9267 137.766 19.28 138.126 19.56C138.5 19.84 138.96 19.98 139.506 19.98C140.04 19.98 140.453 19.8733 140.746 19.66C141.053 19.4467 141.206 19.1733 141.206 18.84C141.206 18.48 141.02 18.2133 140.646 18.04C140.286 17.8533 139.706 17.6533 138.906 17.44C138.08 17.24 137.4 17.0333 136.866 16.82C136.346 16.6067 135.893 16.28 135.506 15.84C135.133 15.4 134.946 14.8067 134.946 14.06C134.946 13.4467 135.12 12.8867 135.466 12.38C135.826 11.8733 136.333 11.4733 136.986 11.18C137.653 10.8867 138.433 10.74 139.326 10.74C140.646 10.74 141.7 11.0733 142.486 11.74C143.273 12.3933 143.706 13.28 143.786 14.4H141.106C141.066 13.96 140.88 13.6133 140.546 13.36C140.226 13.0933 139.793 12.96 139.246 12.96C138.74 12.96 138.346 13.0533 138.066 13.24C137.8 13.4267 137.666 13.6867 137.666 14.02C137.666 14.3933 137.853 14.68 138.226 14.88C138.6 15.0667 139.18 15.26 139.966 15.46C140.766 15.66 141.426 15.8667 141.946 16.08C142.466 16.2933 142.913 16.6267 143.286 17.08C143.673 17.52 143.873 18.1067 143.886 18.84C143.886 19.48 143.706 20.0533 143.346 20.56C143 21.0667 142.493 21.4667 141.826 21.76C141.173 22.04 140.406 22.18 139.526 22.18Z" fill="#194685"/>
                                    <path d="M14.226 4.51198V0H0V31H14.226V26.488C11.3118 26.488 8.51693 25.3303 6.45632 23.2696C4.39567 21.209 3.23801 18.4142 3.23801 15.5C3.23801 12.5858 4.39567 9.79091 6.45632 7.7303C8.51693 5.66965 11.3118 4.51198 14.226 4.51198Z" fill="#194685"/>
                                    <path d="M14.2266 4.51172V26.4877C17.1408 26.4877 19.9357 25.33 21.9963 23.2694C24.057 21.2087 25.2146 18.414 25.2146 15.4997C25.2146 12.5855 24.057 9.79065 21.9963 7.73004C19.9357 5.66939 17.1408 4.51172 14.2266 4.51172Z" fill="#194685"/>
                                    </svg>

{{--                                <img class="logo-light logo-img" src="/icon/logo_md.png"alt="logo">--}}
{{--                                <img class="logo-dark logo-img" src="/icon/logo_md.png" srcset="/icon/logo_md.png 2x" alt="logo-dark">--}}
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
                        <div class="nk-footer-copyright"> &copy; {{ Date('Y') }} {{ settings('site_name', env('APP_NAME')) }}
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
