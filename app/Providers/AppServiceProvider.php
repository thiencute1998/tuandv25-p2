<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Link;
use App\Models\Post;
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

            // banner
            $bannerWebsite = Banner::where('status', 1)->where('type', 1)->first();

            // breaking news
            $breakNews = Post::where('status', 1)
                ->orderBy('created_at', 'desc')
                ->take(10)->get();

            $slideWebsites = Banner::where('status', 1)->where('type', 2)->take(10)->get();
            $tagRight = Banner::where('status', 1)->where('type', 3)->first();

            // menu
            $cates1 = Category::where('status', 1)->where('level', 1)->orderBy('order', 'asc')->get();
            $cates2 = Category::where('status', 1)->where('level', 2)->orderBy('order', 'asc')->get();
            $cates3 = Category::where('status', 1)->where('level', 3)->orderBy('order', 'asc')->get();

            // Tim moi
            $postNew = Post::where('status', 1)
//                ->where('created_at', '>=', date('Y-m-d 00:00:00'))
//                ->where('created_at', '<=', date('Y-m-d 23:59:59'))
                ->orderBy('created_at', 'desc')
                ->take(6)->get()
                ->map(function($value){
                    $value->dateDiff = getDateDiff($value->created_at);
                    return $value;
                });
            // Tin Xem nhiều
            $postTopView = Post::where('status', 1)
                ->orderBy('views', 'desc')
                ->orderBy('created_at', 'desc')
                ->take(6)->get()
                ->map(function($value){
                    $value->dateDiff = getDateDiff($value->created_at);
                    return $value;
                });
            // Thong bao
            $postNotify = Post::where('status', 1)
                ->whereHas('category', function($q) {
                    $q->where('slug', 'thong-bao');
                })
                ->orderBy('created_at', 'desc')
                ->take(6)->get()
                ->map(function($value){
                    $value->dateDiff = getDateDiff($value->created_at);
                    return $value;
                });

            // Lien he
            $contactWebsite = About::first();

            // Lien ket website
            $linkWebsites = Link::where('status', 1)->get();
            $data = [
                'userLogin'=> $user,
                'bannerWebsite'=> $bannerWebsite,
                'breakNews'=> $breakNews,
                'slideWebsites'=> $slideWebsites,
                'tagRight'=> $tagRight,
                'cates1'=>$cates1,
                'cates2'=>$cates2,
                'cates3'=>$cates3,
                'postNew'=> $postNew,
                'postTopView'=> $postTopView,
                'postNotify'=> $postNotify,
                'contactWebsite'=> $contactWebsite,
                'linkWebsites'=> $linkWebsites,
            ];
            $view->with($data);
        });

    }
}
