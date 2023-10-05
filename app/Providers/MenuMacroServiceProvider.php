<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class MenuMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {

        Menu::macro('getItemsBySlug', function ($slug) {
            return Cache::remember('menu_items_' . $slug, now()->addHours(1), function () use ($slug) {
                return $this->where('slug', $slug)->first()->items;
            });
        });

        Menu::macro('get', function ($slug) {
            return Cache::remember('menu_items_' . $slug, now()->addHours(1), function () use ($slug) {
                return $this->where('slug', $slug)->first()->items;
            });
        });
    }

}
