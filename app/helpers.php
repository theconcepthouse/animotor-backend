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

function companyId(): string
{
   return auth()?->user()?->company_id;
}

function hasTrips(): bool
{
   return settings('enable_instant_ride') == 'yes';
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
