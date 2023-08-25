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
        return $event;
    }

    public function getEvent(Request $request){
        return $this->repository->getEvent($request->only('date'));
    }
}
