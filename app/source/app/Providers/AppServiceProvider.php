<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Menu;
use App\Models\FooterMenu;

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
        //
        Schema::defaultStringLength(191);

        View::composer('layout.header', function ($view) {
            $menus = Menu::orderBy('order', 'DESC')->where('status', 'Enable')->where('position', 'header')->limit(6)->get();
            $view->with('menus', $menus);
        });
        
        View::composer('layout.footer', function ($view) {
            $footerMenusColB = Menu::orderBy('order', 'DESC')->where('status', 'Enable')->where('position', 'col_b')->limit(6)->get();
            $footerMenusColA = Menu::orderBy('order', 'DESC')->where('status', 'Enable')->where('position', 'col_a')->limit(6)->get();
            $view->with('footerMenusColB', $footerMenusColB)->with('footerMenusColA', $footerMenusColA);
        });

    }
}