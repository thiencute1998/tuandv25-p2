<?php

namespace App\Providers;

use App\Models\Category;
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
            $cates1 = Category::where('status', 1)->where('level', 1)->orderBy('order', 'asc')->get();
            $cates2 = Category::where('status', 1)->where('level', 2)->orderBy('order', 'asc')->get();
            $cates3 = Category::where('status', 1)->where('level', 3)->orderBy('order', 'asc')->get();

            $data = [
                'userLogin'=> $user,
                'cates1'=>$cates1,
                'cates2'=>$cates2,
                'cates3'=>$cates3,
//                'logoWeb' => $logo ? $logo : "",
//                'menuServices'=> $services,
//                'config'=> $config
            ];
            $view->with($data);
        });

    }
}
