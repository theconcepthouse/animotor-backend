<?php

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

