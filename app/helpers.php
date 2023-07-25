<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
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
   return settings('enable_fleet_management') == 'yes';
}

function hasRental(): bool
{
   return settings('enable_rental') == 'yes';
}

function bladeCompile($content): string
{
    return preg_replace_callback('/@include\((\'|")(.*?)(\'|")\)/', function ($matches) {
        $partial = Str::replaceFirst(['"', "'"], '', $matches[2]);
        return renderPartial($partial);
    }, $content);
}

function renderPartial($partial): bool|string
{
    ob_start();
    try {
        View::make($partial)->render();
    } catch (\Throwable $e) {
        // Handle any exceptions, e.g., partial not found
        return "<!-- Error rendering partial: $partial -->";
    }
    return ob_get_clean();
}
