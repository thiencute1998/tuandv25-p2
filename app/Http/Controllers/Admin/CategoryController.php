<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    private $repository;
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('search');
        return $this->repository->index($searchParams);
    }

    public function create() {
        return view('admin.pages.category.create');
    }

    public function store(Request $request) {
        $params = $request->only('name', 'parent_id', 'link', 'status');
        $this->repository->store($params);
        return redirect()->back()->with('add-success', 'Thêm danh mục thành công !!!');
    }

    public function edit($id) {
        $category = $this->repository->edit($id);
        $parent = $this->repository->findCategory($category->parent_id);
        return view('admin.pages.category.edit', compact('category','parent'));
    }

    public function update(Request $request, $id) {
        $params = $request->only('name', 'parent_id', 'link', 'status');
        $this->repository->update($params, $id);
        return redirect()->back()->with('edit-success', 'Cập nhật danh mục thành công !!!');
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Xóa danh mục thành công !!!');
    }

    public function getParent(Request $request) {
        $params = $request->only('name', 'self_id');
        $data = $this->repository->getParent($params);
        return response()->json($data);
    }
}
