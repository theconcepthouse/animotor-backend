<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Blade::directive('dynamicInclude', function ($expression) {
            $path = trim($expression, '\'"');
            try {
                return "<?php echo \$__env->make('{$path}', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>";
            } catch (\Exception $e) {
                return "<!-- Include file not found: {$path} -->";
            }
        });
    }
}
