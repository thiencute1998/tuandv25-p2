<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddTabHomeRequest;
use App\Http\Requests\Admin\EditTabHomeRequest;
use App\Repositories\Admin\TabHomeRepository;
use Illuminate\Http\Request;

class TabHomeController extends Controller
{
    //
    private $repository;
    public function __construct(TabHomeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('search');
        return $this->repository->index($searchParams);
    }

    public function create() {
        return view('admin.pages.tabhome.create');
    }

    public function store(AddTabHomeRequest $request) {
        $params = $request->only('name', 'status');
        $this->repository->store($params);
        return redirect()->back()->with('add-success', 'Thêm danh muc thành công !!!');
    }

    public function edit($id) {
        $tabhome = $this->repository->edit($id);
        $parent = $this->repository->getAllExceptSelf($id);
        return view('admin.pages.tabhome.edit', compact('tabhome','parent'));
    }

    public function update(EditTabHomeRequest $request, $id) {
        $params = $request->only('name','status');
        $this->repository->update($params, $id);
        return redirect()->back()->with('edit-success', 'Cập nhật danh muc thành công !!!');
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Xóa danh muc thành công !!!');
    }

    public function getAll(Request $request) {
        $params = $request->only('name');
        $data = $this->repository->getAll($params);
        return response()->json($data);
    }
}
