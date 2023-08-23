<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\VideoRepository;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //
    private $repository;
    public function __construct(VideoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('search');
        return $this->repository->index($searchParams);
    }

    public function create() {
        return view('admin.pages.video.create');
    }

    public function store(Request $request) {
        $params = $request->only('name', 'link', 'status');
        $this->repository->store($params, $request);
        return redirect()->back()->with('add-success', 'Thêm Video thành công !!!');
    }

    public function edit($id) {
        $video = $this->repository->edit($id);
        return view('admin.pages.video.edit', compact('video'));
    }

    public function update(Request $request, $id) {
        $params = $request->only('name', 'link', 'status');
        $this->repository->update($params, $request, $id);
        return redirect()->back()->with('edit-success', 'Cập nhật  Video thành công !!!');
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Xóa  Video thành công !!!');
    }
    public function ckeditorUpload(Request $request) {
        return $this->repository->ckeditorUpload($request);
    }
}
