<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

function convertRouteToPermission($routeName): string
{
    $permission = str_replace('admin.', '', $routeName);
    $permission = str_replace('.', '-', $permission);
    return '@permission(' . $permission . ')';
}

function isOwner(): bool
{
    if(auth()->user()->hasRole('owner|manager')){
        return true;
    }
    return false;
}

function isAdmin(): bool
{
    if(auth()->user()->hasRole('superadmin|admin')){
        return true;
    }
    return false;
}

function canViewUserBookings(): bool
{
    if(auth()->user()->hasRole('superadmin|admin')){
        return true;
    }
    return false;
}

function companyId(): string
{
   return auth()?->user()?->company_id;
}

function hasTrips(): bool
{
   return settings('enable_instant_ride') == 'yes';
}

function hasMonify(): bool
{
   return env('HAS_MONIFY', false);
}

function hasFleet(): bool
{
   return settings('enable_fleet') == 'yes';
}

function hasRental(): bool
{
   return settings('enable_rental') == 'yes';
}

if (!function_exists('dynamic_include')) {
    function dynamic_include($view)
    {
        $viewPath = resource_path('views/' . $view . '.blade.php');

        if (file_exists($viewPath)) {
            return view($view);
        }

        return "<p>NOT FOUND</p>";
    }
}

if(!function_exists('format_coordiantes')){
    function format_coordiantes($coordinates): array
    {
        $data = [];
        foreach ($coordinates as $coord) {
            $data[] = (object)['lat' => $coord[1], 'lng' => $coord[0]];
        }
        return $data;
    }
}

if(!function_exists('show_item')){
    function show_item($item): int
    {

        if(is_int($item)){
            return $item;
        }else{
            return 0;
        }

    }
}

function convertToWord($input): string
{
    return ucwords(str_replace('_', ' ', $input));
}

function isApiSet(): bool
{
    if(strlen(env('FIREBASE_API_KEY')) > 3 && strlen(env('MAP_API_KEY')) > 3 && strlen(env('FIREBASE_PROJECT_ID')) > 3){
        return true;
    }else{
        return false;
    }
}

function isPaymentMethodSet(): bool
{
    $active_methods = settings('active_methods', 'none');

    if(strlen($active_methods) > 3){
        return true;
    }

    return false;

}

function removeDuplicatePhotos($photos_array, $new): string
{
    if(!$photos_array){
        return '';
    }
    if(count($photos_array) < 1){
        return $new;
    }
    $new_array = explode(',', $new);

    $all_photos = array_unique(array_merge($photos_array, $new_array));

    return implode(',', $all_photos);

}

function listTime(): array
{

    $time = Carbon::createFromTime(0, 0, 0);

    $endTime = Carbon::createFromTime(23, 30, 0);

    $timeStrings = [];

    while ($time <= $endTime) {
        $timeStrings[] = $time->format('H:i');
        $time->addMinutes(30);
    }

    return $timeStrings;

}

function amt($amt): string
{
    return '$'.number_format($amt);
}

function getUniqueBookingNumber(): float|int|string
{
    $currentTimestamp = now()->timestamp;
    $milliseconds = round(microtime(true) * 10);

    return $currentTimestamp + $milliseconds;
}

function getUniqueReferenceCode(): string
{
    return substr(settings('site_name', 'TRIP'), 0, 4).'-BOOKING-'.date('Hm').'-'.mt_rand(100,999);

}

function menuItems(){
    $menu_items = settings('frontpage_menu','default');
    if(is_string($menu_items)){
        $menus = json_decode(settings('frontpage_menu','default'), true);
    }else{
        $menus = [];
    }
    return $menus;
}


function imageStringArray($images): array
{
    if(!$images){
        return [];
    }
    return explode(',', $images);
}

function customRound($number): int
{
    $remainder = $number % 100;

    if ($remainder > 50) {
        // Round up to the nearest hundred
        return $number + (100 - $remainder);
    } else {
        // Round down to the nearest hundred
        return $number - $remainder;
    }
}

if (!function_exists('formatImagesError')) {
    function formatImagesError($fieldName): string
    {
        return ucfirst(str_replace('_', ' ', str_replace('images.', '', $fieldName)));
    }
}

if (!function_exists('formatArrayError')) {
    function formatArrayError($text, $field): string
    {
        return ucfirst(str_replace('_', ' ', str_replace($field, '', $text)));
    }
}

    function default_footer(): string
{
    return <<<HTML
    <footer class="footer__section bg_section pt-120">
    <div class="container">
        <div class="footer__wrapper">
            <div class="footer__top pb-120">
                <div class="row gy-5 gx-5">
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="1s">
                        <div class="footer__widget">
                            <div class="widget__head mb__20">
                                <a href="#" class="footer__logo">
                                    <img style="max-height: 70px; width: auto" src="/assets/img/logo/icon.png" alt="logo">
                                </a>
                            </div>
                            <p class="pratext mb__20 fz-18">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry...
                            </p>
                            <ul class="social d-flex gap-3">
                                <li>
                                    <a href="javascript:void(0)" class="social__icon">
                                        <img src="/assets/img/svg/facebook.svg" alt="svg">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="social__icon">
                                        <img src="/assets/img/svg/instagram.svg" alt="svg">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="social__icon">
                                        <img src="/assets/img/svg/twitter.svg" alt="svg">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="social__icon">
                                        <img src="/assets/img/svg/ball.svg" alt="svg">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="footer__widget">
                            <div class="widget__head mb__20">
                                <h4 class="fz-24 pratext">
                                    Quick Links
                                </h4>
                            </div>
                            <div class="widget__link">
                                <a href="#" class="link fz-18 pratext">
                                    Home
                                </a>
                                <a href="#" class="link fz-18 pratext">
                                    About
                                </a>
                                <a href="#" class="link fz-18 pratext">
                                    Rechage & Bill Payment
                                </a>
                                <a href="#" class="link fz-18 pratext">
                                    Booking
                                </a>
                                <a href="#" class="link fz-18 pratext">
                                    Contact
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="1.7s">
                        <div class="footer__widget">
                            <div class="widget__head mb__20">
                                <h4 class="fz-24 pratext">
                                    Address
                                </h4>
                            </div>
                            <div class="widget__link">
                                <a href="javascript:void(0)" class="link fz-18 pratext">
                          <span class="d-block">
                           (480) 555-0103
                          </span>
                                    <span>
                           (406) 555-0120
                          </span>
                                </a>

                                <a href="javascript:void(0)" class="link fz-18 pratext">
                                    285 Great North Road, Grey Lynn, Auckland 1021
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="1.9s">
                        <div class="footer__widget">
                            <div class="widget__head mb__20">
                                <h4 class="fz-24 pratext">
                                    Newsletter
                                </h4>
                            </div>
                            <div class="widget__link">
                                <p class="fz-18 pratext mb__30">
                                    Subscribe our newsletter to get our latest update & news
                                </p>
                                <form action="javacript:void(0)" class="d-flex justify-content-between">
                                    <input type="email" placeholder="Your mail address">
                                    <button type="submit" class="cmn__btn">
                             <span>
                                 <i class="material-symbols-outlined">
                                    rocket_launch
                                 </i>
                             </span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom d-flex">
                <p class="fz-18 pratext">
                    Copyright &copy;2023 <a href="#" class="base">{{ settings('site_name') }}.</a> All Rights Reserved
                </p>
                <ul class="footer__bottom__link">
                    <li>
                        <a href="#">
                            Support
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Terms of Use
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Privacy Policy
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
HTML;
}
