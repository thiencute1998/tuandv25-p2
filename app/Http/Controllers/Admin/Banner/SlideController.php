<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\Banner\SlideRepository;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    //
    private $repository;
    public function __construct(SlideRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('search');
        return $this->repository->index($searchParams);
    }

    public function create() {
        return view('admin.pages.banner.slide.create');
    }

    public function store(Request $request) {
        $params = $request->only('content', 'status', 'link', 'file');
        $this->repository->store($params);
        return redirect()->back()->with('add-success', 'Add success !!!');
    }

    public function edit($id) {
        $slide = $this->repository->edit($id);
        return view('admin.pages.banner.slide.edit', compact('slide'));
    }

    public function update(Request $request, $id) {
        $params = $request->only('content', 'status', 'link', 'file');
        $this->repository->update($params, $id);
        return redirect()->back()->with('edit-success', 'Edit success !!!');
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Delete success !!!');
    }
}
