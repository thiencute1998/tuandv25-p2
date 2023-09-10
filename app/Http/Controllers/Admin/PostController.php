<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    private $repository;
    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        //$searchParams = $request->only('search');
        $searchParams = $request->all();
        return $this->repository->index($searchParams);
    }

    public function create() {
        return view('admin.pages.post.create');
    }

    public function store(Request $request) {
        $params = $request->only('name', 'image', 'category', 'tags', 'content', 'status', 'categories', 'title', 'keywords', 'description');
        $this->repository->store($params, $request);
        return redirect()->back()->with('add-success', 'Thêm bài viết thành công !!!');
    }

    public function edit($id) {
        $post = $this->repository->edit($id);
        return view('admin.pages.post.edit', compact('post'));
    }

    public function update(Request $request, $id) {
        $params = $request->only('name', 'image', 'category', 'tags', 'content', 'status', 'categories', 'title', 'keywords', 'description');
        $this->repository->update($params, $request, $id);
        return redirect()->back()->with('edit-success', 'Cập nhật bài viết thành công !!!');
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Xóa bài viết thành công !!!');
    }

    public function getParent(Request $request) {
        $params = $request->only('name', 'self_id');
        $data = $this->repository->getParent($params);
        return response()->json($data);
    }

    public function ckeditorUpload(Request $request) {
        return $this->repository->ckeditorUpload($request);
    }
}
