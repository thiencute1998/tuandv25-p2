<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProductRequest;
use App\Http\Requests\Admin\EditProductRequest;
use App\Repositories\Admin\VideoSlideShowRepository;
use Illuminate\Http\Request;

class VideoSlideShowController extends Controller
{
    //
    private $repository;
    public function __construct(VideoSlideShowRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('search');
        return $this->repository->index($searchParams);
    }

    public function create() {
        return view('admin.pages.services.video-slideshow.create');
    }

    public function store(Request $request) {
        $params = $request->all();
        $this->repository->store($params);
        return redirect()->back()->with('add-success', 'Add success !!!');
    }

    public function edit($id) {
        $product = $this->repository->edit($id);
        return view('admin.pages.services.video-slideshow.edit', compact('product'));
    }

    public function update(Request $request, $id) {
        $params = $request->all();
        $this->repository->update($params, $id);
        return redirect()->back()->with('edit-success', 'Edit success !!!');
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Delete success !!!');
    }

    public function upload(Request $request) {
        $this->repository->upload($request);
    }
}
