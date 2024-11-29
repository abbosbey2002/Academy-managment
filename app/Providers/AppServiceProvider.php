<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components\Loading;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();
        Blade::component('loading', Loading::class);
        Blade::component('components.sidebar', 'sidebar');
        Blade::component('components.student.sidebar', 'student-sidebar');
        Blade::component('components.header', 'header');
        Blade::component('components.student.header', 'student-header');
        Blade::component('components.footer', 'footer');
        Blade::component('components.student.footer', 'student-footer');
    }
}

