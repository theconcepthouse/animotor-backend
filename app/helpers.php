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
   return settings('enable_fleet_management') == 'yes';
}

function hasRental(): bool
{
   return settings('enable_rental') == 'yes';
}

