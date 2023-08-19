<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;


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
        Paginator::useBootstrap();
        View::composer('*', function ($view) {
            $user = auth()->user();
//            $logo = Logo::where('status', 1)->first();
//            $services = Service::all();
//            $config = Config::first();
            $data = [
                'userLogin'=> $user,
//                'logoWeb' => $logo ? $logo : "",
//                'menuServices'=> $services,
//                'config'=> $config
            ];
            $view->with($data);
        });

    }
}
