<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\Banner\BannerContactRepository;
use Illuminate\Http\Request;

class BannerContactController extends Controller
{
    //
    //
    private $repository;
    public function __construct(BannerContactRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('search');
        return $this->repository->index($searchParams);
    }

    public function create() {
        return view('admin.pages.banner.contact.create');
    }

    public function store(Request $request) {
        $params = $request->only('content', 'status', 'link', 'file');
        $this->repository->store($params);
        return redirect()->back()->with('add-success', 'Add success !!!');
    }

    public function edit($id) {
        $contact = $this->repository->edit($id);
        return view('admin.pages.banner.contact.edit', compact('contact'));
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
