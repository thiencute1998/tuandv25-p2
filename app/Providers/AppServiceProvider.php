<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Config;
use App\Models\Link;
use App\Models\Post;
use Illuminate\Support\Facades\URL;
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
        //URL::forceScheme('https');
        //if($this->app->environment('production')) {
            //URL::forceScheme('https');
        //}
        if($this->app->environment('development')) {
            URL::forceScheme('https');
        }
        Paginator::useBootstrap();
        View::composer('*', function ($view) {
            $user = auth()->user();

            // banner
            $bannerWebsite = Banner::where('status', 1)->where('type', 1)->first();
            // Logo
            $logoWebsite = Banner::where('status', 1)->where('type', 5)->first();
            // breaking news
            $breakNews = Post::select('id', 'slug', 'name', 'summary', 'image')
                ->where('status', 1)
                ->orderBy('created_at', 'desc')
                ->take(10)->get();

            $slideWebsites = Banner::where('status', 1)->where('type', 2)->take(10)->get();
            $tagRight = Banner::where('status', 1)->where('type', 3)->first();
            $tagRight1 = Banner::where('status', 1)->where('type', 4)->first();

            // menu
            $cates1 = Category::where('status', 1)->where('status', '!=', 2)->where('level', 1)->orderBy('order', 'asc')->get();
            $cates2 = Category::where('status', 1)->where('status', '!=', 2)->where('level', 2)->orderBy('order', 'asc')->get();
            $cates3 = Category::where('status', 1)->where('status', '!=', 2)->where('level', 3)->orderBy('order', 'asc')->get();

            // Tim moi
            $postNew = Post::select('id', 'slug', 'name', 'summary', 'image')
//                ->where('created_at', '>=', date('Y-m-d 00:00:00'))
//                ->where('created_at', '<=', date('Y-m-d 23:59:59'))
                ->where('post_date', '<=', date('Y-m-d H:i:s'))
                ->orderBy('post_date', 'desc')
                ->take(5)->get()
                ->map(function($value){
                    $value->dateDiff = getDateDiff($value->created_at);
                    return $value;
                });
            // Tin Xem nhiều
            $postTopView = Post::select('id', 'slug', 'name', 'summary', 'image')
                ->where('status', 1)
                ->orderBy('views', 'desc')
                ->orderBy('created_at', 'desc')
                ->take(5)->get()
                ->map(function($value){
                    $value->dateDiff = getDateDiff($value->created_at);
                    return $value;
                });
            // Thong bao
            $postNotify = Post::select('id', 'slug', 'name', 'summary', 'image')
                ->where('status', 1)
                ->whereHas('categories', function($q) {
                    $q->where('slug', 'thong-bao');
                })
                ->orderBy('created_at', 'desc')
                ->take(6)->get()
                ->map(function($value){
                    $value->dateDiff = getDateDiff($value->created_at);
                    return $value;
                });
            //slide Home
            //$slideHome = Post::where('status', 1)->whereRaw('post_date <= "'.date('Y-m-d H:i:s').'"')->orderBy('post_date', 'desc')->take(10)->get();
            //$slideHome = Post::where('status', 1)->orderBy('id', 'desc')->take(10)->get();
            //$slideHome = Post::where('status', 1)->whereRaw('DATE(post_date) <= "'.date('Y-m-d').'"')->orderBy('post_date', 'desc')->limit(10)->get();
            // Lien he
            $contactWebsite = About::first();
            //Config
            $config = Config::first();
            // Lien ket website
            $linkWebsites = Link::where('status', 1)->get();
            $data = [
                'userLogin'=> $user,
                'bannerWebsite'=> $bannerWebsite,
                'breakNews'=> $breakNews,
                'slideWebsites'=> $slideWebsites,
                //'slideHome'=> $slideHome,
                'tagRight'=> $tagRight,
                'tagRight1'=> $tagRight1,
                'cates1'=>$cates1,
                'cates2'=>$cates2,
                'cates3'=>$cates3,
                'postNew'=> $postNew,
                'postTopView'=> $postTopView,
                'postNotify'=> $postNotify,
                'contactWebsite'=> $contactWebsite,
                'linkWebsites'=> $linkWebsites,
                'config'=> $config,
                'logoWebsite'=>$logoWebsite
            ];
            $view->with($data);
        });

    }
}
