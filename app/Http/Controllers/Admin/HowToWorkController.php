<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\Banner\BannerContactRepository;
use App\Repositories\Admin\HowToWorkRepository;
use Illuminate\Http\Request;

class HowToWorkController extends Controller
{
    //
    private $repository;
    public function __construct(HowToWorkRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('search');
        return $this->repository->index($searchParams);
    }

    public function create() {
        return view('admin.pages.how-to-work.create');
    }

    public function store(Request $request) {
        $params = $request->only('content', 'status', 'file');
        $this->repository->store($params);
        return redirect()->back()->with('add-success', 'Add success !!!');
    }

    public function edit($id) {
        $work = $this->repository->edit($id);
        return view('admin.pages.how-to-work.edit', compact('work'));
    }

    public function update(Request $request, $id) {
        $params = $request->only('content', 'status', 'file');
        $this->repository->update($params, $id);
        return redirect()->back()->with('edit-success', 'Edit success !!!');
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Delete success !!!');
    }
}
