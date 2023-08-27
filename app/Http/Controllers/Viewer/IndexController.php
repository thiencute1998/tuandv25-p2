<?php

namespace App\Http\Controllers\Viewer;

use App\Http\Controllers\Controller;
use App\Repositories\Viewer\IndexRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    private $repository;

    public function __construct(IndexRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        return $this->repository->index();
    }

    public function getCate($cate) {
        $data = $this->repository->getCate($cate);
        $category = $data['category'];
        $posts = $data['posts'];
        return view('viewer.pages.category', compact('category', 'posts'));
    }

    public function getPost($post) {
        $post = $this->repository->getPost($post);
        $postRelated = $this->repository->getPostRelated($post);
        return view('viewer.pages.post', compact('post', 'postRelated'));
    }

    public function getEventCalendar($event) {
        $event = $this->repository->getEventCalendar($event);
        $eventRelated = $this->repository->getEventRelated();
        return view('viewer.pages.event_detail', compact('event', 'eventRelated'));
    }

    public function getEvent(Request $request){
        return $this->repository->getEvent($request->only('date'));
    }

    public function events() {
        $events = $this->repository->events();
        return view('viewer.pages.events', compact('events'));
    }

    public function getTag($tag) {
        $data = $this->repository->getTag($tag);
        $tag = $data['tag'];
        $posts = $data['posts'];
        return view('viewer.pages.tag', compact('tag', 'posts'));
    }

    public function findChurch() {
        return view('viewer.pages.find_church');
    }

    public function getVideo($video) {
        $video = $this->repository->getVideo($video);
        $videoRelated = $this->repository->getVideoRelated($video);
        return view('viewer.pages.video', compact('video', 'videoRelated'));
    }

    public function getMap() {
        $map = $this->repository->getMap();
        return view('viewer.pages.map', compact('map'));
    }

    public function searchPost(Request $request) {
        return $this->repository->searchPost($request->only('post'));
    }

    public function searchAllPost($post) {
        $posts = $this->repository->searchAllPost($post);
        return view('viewer.pages.find_post', compact('posts'));
    }
}
