<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddTagRequest;
use App\Http\Requests\Admin\EditTagRequest;
use App\Repositories\Admin\TagRepository;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //
    private $repository;
    public function __construct(TagRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('search');
        return $this->repository->index($searchParams);
    }

    public function create() {
        return view('admin.pages.tag.create');
    }

    public function store(AddTagRequest $request) {
        $params = $request->only('name', 'status');
        $this->repository->store($params);
        return redirect()->back()->with('add-success', 'Thêm tag thành công !!!');
    }

    public function edit($id) {
        $tag = $this->repository->edit($id);
        $parent = $this->repository->getAllExceptSelf($id);
        return view('admin.pages.tag.edit', compact('tag','parent'));
    }

    public function update(EditTagRequest $request, $id) {
        $params = $request->only('name','status');
        $this->repository->update($params, $id);
        return redirect()->back()->with('edit-success', 'Cập nhật tag thành công !!!');
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Xóa tag thành công !!!');
    }

    public function getAll(Request $request) {
        $params = $request->only('name');
        $data = $this->repository->getAll($params);
        return response()->json($data);
    }
}
