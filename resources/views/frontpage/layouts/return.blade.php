
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
    <link rel="stylesheet" href="/vendor/sweetalert/sweetalert.css">


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

        .menu_item img{
            margin-right: 20px;
            width: 30px;
            height: 30px;
            flex-shrink: 0;
        }

        .menu_item .lead-text {
            /*font-size: 1.075rem;*/
            /*font-weight: 700;*/
            color: #2D3748;
            font-family: Poppins;
            display: block;

            font-size: 18px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .menu_item .active{
            color: #194685
        }

        .step_menu .active {
            color: #194685
        }

        .step_menu .active .lead-text {
            color: #194685!important;
        }

        .nk-stepper-nav li {
            cursor: pointer;
        }
        .step_content {
            background-color: #e5e9f2;
            height: 100vh;
            position: absolute;
            margin-top: -50px;
            padding-top: 50px;
            padding-left: 50px;
            right: 0;
        }

        .step_content .nk-stepper-content {
            max-width: 500px;
        }

        .step_content .back {
            cursor: pointer;
        }

        .step_content .back p {
            color: #718096;
        }
        .step_content .nxt_button {
            border-radius: 50px;
            padding-left: 50px;
            padding-right: 50px;
            margin-left: 20px;
        }
        .step_content .full_button {
            border-radius: 50px;
            padding-left: 50px;
            padding-right: 50px;
            width: 100%;
            display: block;
        }
        .step_content .prev_button {
            border-radius: 50px;
            padding-left: 50px;
            padding-right: 50px;
        }

        .full_page {
            background-color: lightgray; /* Just for visualization */
            height: 100%;
            position: absolute;
            right: 0;
        }

    </style>


    @yield('style')

</head>

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

    $menuArray[] = [
        'text' => 'Drivers',
        'icon' => 'ni ni-users-fill',
        'route' => 'drivers-read',
        'submenu' => [
            [
                'url' => route('admin.drivers.index', ['status' => 'approved']),
                'text' => 'Active',
                'route' => 'drivers-read',
            ],
            [
                'url' => route('admin.drivers.index', ['status' => 'unapproved']),
                'text' => 'Inactive',
                'route' => 'drivers-read',

            ],
            [
                'url' => route('admin.drivers.index', ['status' => 'online']),
                'text' => 'Online',
                'route' => 'drivers-read',
            ],
            [
                'url' => 'html/crm/organizations.html',
                'route' => 'drivers-read',
                'text' => 'Withdrawal requests',
            ],
            [
                'url' => route('admin.drivers.index', ['status' => 'negative_balance']),
                'text' => 'Negative balance',
                 'route' => 'drivers-read',
            ],
        ],
    ];
}

    $menuArray[] = [
        'url' => route('admin.riders'),
        'route' => 'users-read',
        'text' => 'Customers',
        'icon' => 'ni ni-user-list-fill',
    ];

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

    if (hasRental()) {
        $menuArray[] = [
            'url' => route('admin.rental.index'),
            'route' => 'rentals-read',
            'text' => 'Rental packages',
            'icon' => 'ni ni-view-x2',
        ];

         $menuArray[] = [
        'text' => 'Fleet Management',
         'url' => route('admin.cars.index'),
        'icon' => 'ni ni-layout-fill',
        'route' => 'cars-read'
    ];

    $menuArray[] = [
        'text' => 'Car Bookings',
        'icon' => 'ni ni-users-fill',
        'route' => 'bookings-index',
        'submenu' => [
            [
                'url' => route('admin.bookings.index', ['status' => 'all']),
                'route' => 'bookings-index',
                'text' => 'All Rentals',
            ],
            [
                'url' => route('admin.bookings.index', ['status' => 'completed']),
                'route' => 'bookings-index',
                'text' => 'Completed',
            ],
            [
                'url' => route('admin.bookings.index', ['status' => 'pending']),
                'route' => 'bookings-index',
                'text' => 'Pending',
            ],
            [
                'url' => route('admin.bookings.index', ['status' => 'cancelled']),
                'route' => 'bookings-index',
                'text' => 'Cancelled',
            ],
            // Add more Car Bookings submenu items here as required
        ],
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
                'route' => 'settings-services',
            ],
            [
                'url' => route('admin.roles.index'),
                'text' => 'User roles',
                'route' => 'roles-index',
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
                'text' => 'Faqs',
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
    }

    $menuArray[] = [
        'url' => route('admin.settings'),
        'text' => 'System Settings',
        'route' => 'settings-read',
        'icon' => 'ni ni-setting-alt-fill',
    ];

    $menuArray[] = [
        'text' => 'CMS Section',
        'type' => 'heading',
        'route' => 'cms-setup',
    ];

    $menuArray[] = [
        'text' => 'CMS setup',
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

        <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">

            <!-- content @s -->
            @yield('content')
            <!-- content @e -->

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


{{--<script src="{{ asset('admin/assets/js/bundle.js?ver=3.1.1') }}" data-navigate-track></script>--}}
<script src="{{ asset('admin/assets/js/bundle.js?ver=3.1.1') }}"></script>
<script src="{{ asset('admin/assets/js/scripts.js?ver=3.1.1') }}"></script>
<script src="{{ asset('admin/assets/js/charts/gd-default.js?ver=3.1.1') }}"></script>
<script src="{{ asset('admin/assets/js/libs/datatable-btns.js?ver=3.1.1') }}"></script>
<script src="{{ asset('admin/assets/js/libs/datatable-btns.js?ver=3.1.1') }}"></script>

<script src="./assets/js/example-toastr.js?ver=3.1.1"></script>

{{--<script src="./assets/js/bundle.js?ver=3.1.1"></script>--}}
{{--<script src="./assets/js/scripts.js?ver=3.1.1"></script>--}}
{{--<script src="./assets/js/libs/datatable-btns.js?ver=3.1.1"></script>--}}

<script src="/vendor/sweetalert/sweetalert.min.js"></script>

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



{{--@livewireScripts--}}


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

{{--<script>--}}

{{--document.addEventListener('DOMContentLoaded', function () {--}}

<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        initializeToggleSwitches();

        Livewire.on('init-lfm', () => {
            $('.lfm').filemanager('image');
        })
    });

    document.addEventListener('livewire:navigated', function () {
        initializeToggleSwitches();
        $('.lfm').filemanager('image');
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



<script>
    $('.lfm').filemanager('image');
</script>

@yield('js')

</body>

</html>
