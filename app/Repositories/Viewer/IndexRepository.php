<?php

namespace App\Repositories\Viewer;

use App\Models\CalenderEvent;
use App\Models\Category;
use App\Models\Homepage;
use App\Models\Post;
use App\Repositories\BaseRepository;
use Carbon\Carbon;

class IndexRepository extends BaseRepository {
    public function model()
    {
        return Homepage::class;
    }

    public function index() {
        $query = $this->model->query();
        $query->where('status', 1);
        $query->with('categories.posts');
        $query->orderBy('order', 'asc');
        $homes = $query->get();
        return view('viewer.pages.index', compact('homes'));
    }
    public function getCate($cate) {
        $query = Category::where('status', 1);
        $query->where('slug', $cate);
        $query->with('posts');
        $category = $query->firstOrFail();
        $posts = collect();
        if ($category) {
            $queryPost = Post::where('status', 1);
            $queryPost->where('category_id', $category->id);
            $queryPost->with('category');
            $posts = $queryPost->paginate(10);
        }

        return ['category'=> $category, 'posts'=> $posts];
    }
    public function getPost($post) {
        $query = Post::where('status', 1);
        $query->where('slug', $post);
        $query->with('category');
        return $query->firstOrFail();
    }

    public function getPostRelated($post) {
        $query = Post::where('status', 1);
        $query->where('id', '!=',$post->id);
        if ($post->category_id) {
            $query->where('category_id', $post->category_id);
        }
        $query->orderBy('created_at', 'desc');
        return $query->limit(3)->get();
    }

    public function getEvent($params) {
        $query = CalenderEvent::query();
        $query->where('status', 1);
        if ($params['date']){
            $date = Carbon::createFromFormat('d/m/Y', $params['date'])->format('Y-m-d');
            $query->where('d_date', $date);
        }

        return $query->get()->map(function ($value) {
            $value->full_date = $this->formatVNFullDate($value->d_date);
            $value->d_date = $this->formatVNDate($value->d_date);
            return $value;
        });
    }

    public function formatVNDate($date) {
        if ($date) {
            $day = Carbon::createFromFormat('Y-m-d',$date)->format('d');
            $month = Carbon::createFromFormat('Y-m-d',$date)->format('m');
            $year = Carbon::createFromFormat('Y-m-d',$date)->format('y');
            $date = $day . " Thg". $month . " " . $year;
        }
        return $date;
    }

    public function formatVNFullDate($date) {
        if ($date) {
            $day = Carbon::createFromFormat('Y-m-d',$date)->format('d');
            $month = Carbon::createFromFormat('Y-m-d',$date)->format('m');
            $year = Carbon::createFromFormat('Y-m-d',$date)->format('Y');
            $date = $day . " " . $this->getMonth($month) . ", " . $year;
        }
        return $date;
    }

    public function getMonth($month) {
        $fullMonth = "Tháng ";
        switch ((int) $month) {
            case 1:
                $fullMonth .= "Một";
                break;
            case 2:
                $fullMonth .= "Hai";
                break;
            case 3:
                $fullMonth .= "Ba";
                break;
            case 4:
                $fullMonth .= "Tư";
                break;
            case 5:
                $fullMonth .= "Năm";
                break;
            case 6:
                $fullMonth .= "Sáu";
                break;
            case 7:
                $fullMonth .= "Bảy";
                break;
            case 8:
                $fullMonth .= "Tám";
                break;
            case 9:
                $fullMonth .= "Chín";
                break;
            case 10:
                $fullMonth .= "Mười";
                break;
            case 11:
                $fullMonth .= "Mười Một";
                break;
            case 12:
                $fullMonth .= "Mười Hai";
                break;
        }
        return $fullMonth;
    }
}
