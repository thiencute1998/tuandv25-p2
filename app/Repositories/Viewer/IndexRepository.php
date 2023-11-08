<?php

namespace App\Repositories\Viewer;

use App\Models\About;
use App\Models\CalenderEvent;
use App\Models\Category;
use App\Models\Church;
use App\Models\EmailSignUp;
use App\Models\Homepage;
use App\Models\HomepageCategory;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Video;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class IndexRepository extends BaseRepository {
    public function model()
    {
        return Homepage::class;
    }

    public function index() {
        Log::info('start');
        ini_set('memory_limit', '-1');
        $query = $this->model->query();
        $query->where('status', 1);
//        $query->with(['categories.posts'=> function($q) {
//            $q->where('post_date', '<=', date('Y-m-d H:i:s'));
//            $q->orderBy('created_at', 'desc');
//        }]);
        $query->with(['categories']);
        $query->orderBy('order', 'asc');
        $homes = $query->get()->map(function($value) {
            $categories =  $value->categories;
            if($categories) {
                foreach ($categories as $key=> $category) {
                    if ($key == 0) {
                        Log::info(222);
                        $test = DB::table('posts')
                            ->join('post_categories', 'posts.id', '=' ,'post_categories.post_id')
                            ->where('post_categories.category_id', $category->id)
                            ->where('post_date', '<=', date('Y-m-d H:i:s'));
                        $q = $test
//                        ->orderBy('post_date', 'desc')
                            ->get()
                            ->take(5)
                            ->toArray();
                        $categories[$key]->posts = $q;
                        Log::info($test->toSql() . "  " . $category->id . "    ". count($q));
                    } else {
                        break;
                    }
                }
            }
            $value->categories = $categories;
            return $value;
        });
        $videos = $this->getVideoIndex();
        $slideHomes = Post::where('status', 1)->whereRaw('post_date <= "'.date('Y-m-d H:i:s').'"')->orderBy('post_date', 'desc')->take(10)->get();
        Log::info('end');
        return view('viewer.pages.index', compact('homes', 'videos', 'slideHomes'));
    }

    public function getVideoIndex() {
        $query = Video::where('status', 1);
        $query->orderBy('created_at', 'desc');
        return $query->take(4)->get();
    }
    public function getCate($cate) {
        $query = Category::where('status', 1);
        $query->where('slug', $cate);
//        $query->with(['posts'=> function($q) {
//            $q->where('post_date', '<=', date('Y-m-d H:i:s'));
//        }]);
        $category = $query->first();
        return $category;
    }

    public function paginatePost($category) {
        Log::info('start post :' . Request::ip());
        $posts = collect();
        if ($category) {
            //Lấy tất cả Category con
            $arrcategory_id = [];
            $childCategory = Category::where('parent_id', $category->id)->get();
            if($childCategory){
                foreach($childCategory as $item){
                    $arrcategory_id[] = $item->id;
                }
            }
            $queryPost = Post::where('status', 1);
            $queryPost->where('post_date', '<=', date('Y-m-d H:i:s'));
            //$queryPost->where('category_id', $category->id);
            $queryPost->whereHas('categories', function($q) use ($category, $arrcategory_id) {
                $q->where('category_id', '=', $category->id)
                    ->orWhereIn('category_id', $arrcategory_id);
            });
            $queryPost->orderBy('created_at', 'desc');
//            $queryPost->with('categories');
            $posts = $queryPost->paginate(10);
            Log::info('middle post: ' . request()->ip());
            $data = $posts->through(function ($value) {
                $value->fullDate = $value->created_at;
                if ($value->created_at) {
                    $value->fullDate = $this->formatVNFullDate($value->created_at, "Y-m-d H:i:s");
                }
                return $value;
            });
            Log::info('end post: ' . request()->ip());
            return $data;
        }
        return $posts;
    }
    public function getPost($post) {
        //Update View
        $postNew = Post::where('slug', $post)->firstOrFail();
        $postNew->views = $postNew->views +1 ;
        $postNew->update();
        $query = Post::where('status', 1);
        $query->where('slug', $post);
        $query->where('post_date', '<=', date('Y-m-d H:i:s'));
        $query->with('categories');
        return $query->firstOrFail();
    }

    public function getPostRelated($post) {
        $query = Post::where('status', 1);
        $query->where('post_date', '<=', date('Y-m-d H:i:s'));
        $query->where('id', '!=',$post->id);
        if ($post->category_id) {
            $query->whereHas('categories', function($q) use($post){
                $q->where('category_id', $post->category_id);
            });
        }
        $query->orderBy('created_at', 'desc');
        return $query->limit(10)->get()->map(function($value) {
            $value->fullDate = $value->created_at;
            if ($value->created_at) {
                $value->fullDate = $this->formatDate($value->created_at, 'Y-m-d H:i:s');
            }
            return $value;
        });
    }

    public function getEventCalendar($event) {
        $query = CalenderEvent::where('status', 1);
        $query->where('slug', $event);
        //$query->where('d_date', '<=' , date('Y-m-d'));
        return $query->firstOrFail();
    }

    public function getEventRelated() {
        $query = Post::where('status', 1);
        $query->where('post_date', '<=', date('Y-m-d H:i:s'));
        $query->orderBy('created_at', 'desc');
        return $query->limit(3)->get();
    }

    public function getEvent($params) {
        $query = CalenderEvent::query();
        $query->where('status', 1);
        $formatFullDate = "";
        if ($params['date']){
            $date = Carbon::createFromFormat('d/m/Y', $params['date'])->format('Y-m-d');
            $formatFullDate = $this->formatVNFullDate($date);
            $query->where('d_date', $date);
            //$query->where('d_date', '<=', date('Y-m-d'));
        }

        $data = $query->get()->map(function ($value) {
            $value->full_date = $this->formatVNFullDate($value->d_date);
            $value->d_date = $this->formatVNDate($value->d_date);
            return $value;
        });

        $posts = Post::where('status', 1)
            ->where('post_date', '<=', date('Y-m-d H:i:s'))
            ->whereHas('categories', function($q) {
                $q->where('slug', 'loi-chua-hang-ngay');
            })
            ->where(DB::raw('date(posts.created_at)'), Carbon::createFromFormat("d/m/Y", $params['date'])->format('Y-m-d'))
            ->get();
        return ['formatFullDate'=> $formatFullDate, 'data'=> $data, 'posts'=> $posts];
    }

    public function events() {
        $query = CalenderEvent::where('status', 1);
        $query->orderBy('created_at', 'asc');
        $data = $query->paginate(10);
        return $data->through(function ($value) {
            $value->fullDate = $value->created_at;
            if ($value->created_at) {
                $value->fullDate = $this->formatVNFullDate($value->created_at, "Y-m-d H:i:s");
            }
            return $value;
        });
    }

    public function churchs() {
        $query = Church::where('status', 1);
        $query->orderBy('created_at', 'desc');
        return $query->get();
    }

    public function getTag($tag) {
        $query = Tag::where('status', 1);
        $query->where('slug', $tag);
        $query->with('posts');
        $tag = $query->firstOrFail();
        $posts = collect();
        if($tag) {
            $queryPost = Post::where('status', 1);
            $queryPost->where('post_date', '<=', date('Y-m-d H:i:s'));
            $queryPost->whereHas('tags', function($q) use($tag){
                $q->where('tag_id', $tag->id);
            });
            $queryPost->with('categories');
            $posts = $queryPost->paginate(10);
        }
        return ['tag'=> $tag, 'posts'=> $posts];
    }

    public function getVideo($video) {
        $query = Video::where('slug', $video);
        return $query->firstOrFail();
    }

    public function getVideoRelated($video) {
        $query = Video::where('status', 1);
        $query->where('id', '!=',$video->id);
        $query->orderBy('created_at', 'desc');
        return $query->limit(3)->get();
    }

    public function formatDate($date, $format = 'Y-m-d') {
        if ($date) {
            $day = Carbon::createFromFormat($format,$date)->format('d');
            $month = Carbon::createFromFormat($format,$date)->format('m');
            $year = Carbon::createFromFormat($format,$date)->format('Y');
            $date = $day . "/". $month . "/" . $year;
        }
        return $date;
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

    public function formatVNFullDate($date, $format = 'Y-m-d') {
        if ($date) {
            $day = Carbon::createFromFormat($format,$date)->format('d');
            $month = Carbon::createFromFormat($format,$date)->format('m');
            $year = Carbon::createFromFormat($format,$date)->format('Y');
            //$date = $day . " " . $this->getMonth($month) . ", " . $year;
            $date = $day . "/" .$month . "/" . $year;
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

    public function getMap() {
        return About::first();
    }

    public function searchPost($params) {
        $query = Post::where('status', 1);
        $query->where('post_date', '<=', date('Y-m-d H:i:s'));
        if (isset($params['post'])) {
            $post = $params['post'];
            $query->where('name', 'like', "%$post%");
        }
        $query->orderBy('created_at', 'desc');
        return $query->take(3)->get()->map(function($value) {
            $value->fullDate = $value->created_at;
            if ($value->created_at) {
                $value->fullDate = $this->formatVNFullDate($value->created_at, 'Y-m-d H:i:s');
            }
            $value->slug_path = route('get-post', $value->slug);
            $value->image_path = asset('upload/admin/post/image/' . $value->image);
            return $value;
        });
    }

    public function searchAllPost($post) {
        $query = Post::where('status', 1);
        $query->where('post_date', '<=', date('Y-m-d H:i:s'));
        if (isset($post)) {
            $query->where('name', 'like', "%$post%");
        }
        $query->with('categories');
        $query->orderBy('created_at', 'desc');
        $data = $query->paginate(10);
        return $data->through(function ($value) {
            $value->fullDate = $value->created_at;
            if ($value->created_at) {
                $value->fullDate = getDateDiff($value->created_at);
            }
            return $value;
        });
    }

    public function signUpEmail($params) {
        if (isset($params['email'])) {
            $email = EmailSignUp::where('email', $params['email'])->first();
            if (!$email) {
                $email = new EmailSignUp;
                $email->fill($params);
                $email->save();
            }
        }

        return 1;
    }

    public function plusViewPost($params) {
        if(isset($params['slug'])) {
            $post = Post::where('status', 1)
                ->where('post_date', '<=', date('Y-m-d H:i:s'))
                ->where('slug', $params['slug'])->first();
            if($post) {
                $post->view_count = $post->view_count + 1;
                $post->save();
            }
        }
    }

    public function plusViewEvent($params) {
        if(isset($params['slug'])) {
            $event = CalenderEvent::where('status', 1)->where('slug', $params['slug'])->first();
            if($event) {
                if ($event->view_count === null) {
                    $event->view_count = 0;
                } else {
                    $event->view_count = $event->view_count + 1;
                }
                $event->save();
            }
        }
    }
}
