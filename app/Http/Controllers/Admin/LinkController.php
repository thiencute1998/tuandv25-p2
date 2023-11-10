<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\LinkRepository;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    //
    private $repository;
    public function __construct(LinkRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('search');
        return $this->repository->index($searchParams);
    }

    public function create() {
        return view('admin.pages.link.create');
    }

    public function store(Request $request) {
        $params = $request->only('name', 'link', 'status');
        $this->repository->store($params);
        return redirect()->back()->with('add-success', 'Thêm liên kết thành công !!!');
    }

    public function edit($id) {
        $link = $this->repository->edit($id);
        return view('admin.pages.link.edit', compact('link'));
    }

    public function update(Request $request, $id) {
        $params = $request->only('name', 'link','status');
        $this->repository->update($params, $id);
        return redirect()->back()->with('edit-success', 'Cập nhật liên kết thành công !!!');
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Xóa liên kết  thành công !!!');
    }
}
