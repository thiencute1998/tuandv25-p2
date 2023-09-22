<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Church;
use App\Repositories\Admin\ChurchRepository;
use Illuminate\Http\Request;

class ChurchController extends Controller
{
    //
    private $repository;
    public function __construct(ChurchRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('search');
        return $this->repository->index($searchParams);
    }

    public function create() {
        return view('admin.pages.church.create');
    }

    public function store(Request $request) {
        $params = $request->only('province', 'district', 'commune', 'village', 'parish', 'linkgmap', 'status');
        $this->repository->store($params);
        return redirect()->back()->with('add-success', 'Thêm tin thành công !!!');
    }

    public function edit($id) {
        $church = $this->repository->edit($id);
        return view('admin.pages.church.edit', compact('church'));
    }

    public function update(Request $request, $id) {
        $params = $request->only('province', 'district', 'commune', 'village', 'parish', 'linkgmap','status');
        $this->repository->update($params, $id);
        return redirect()->back()->with('edit-success', 'Cập nhật tin thành công !!!');
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Xóa tin thành công !!!');
    }
}
