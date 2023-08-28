<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\BannerRepository;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    //
    private $repository;
    public function __construct(BannerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('search');
        return $this->repository->index($searchParams);
    }

    public function create() {
        return view('admin.pages.banner.create');
    }

    public function store(Request $request) {
        $params = $request->only('image', 'status', 'type', 'link', 'name');
        $this->repository->store($params, $request);
        return redirect()->back()->with('add-success', 'Thêm banner thành công !!!');
    }

    public function edit($id) {
        $banner = $this->repository->edit($id);
        return view('admin.pages.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id) {
        $params = $request->only('image','status', 'type', 'link', 'name');
        $this->repository->update($params, $id, $request);
        return redirect()->back()->with('edit-success', 'Cập nhật banner thành công !!!');
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Xóa banner thành công !!!');
    }
}
