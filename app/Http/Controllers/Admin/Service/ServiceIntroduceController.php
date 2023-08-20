<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProductRequest;
use App\Http\Requests\Admin\EditProductRequest;
use App\Repositories\Admin\PhotoEditingRepository;
use App\Repositories\Admin\Service\ServiceIntroduceRepository;
use Illuminate\Http\Request;

class ServiceIntroduceController extends Controller
{
    //
    private $repository;
    public function __construct(ServiceIntroduceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('search');
        return $this->repository->index($searchParams);
    }

    public function edit($id) {
        $service = $this->repository->edit($id);
        return view('admin.pages.services.introduce.edit', compact('service'));
    }

    public function update(Request $request, $id) {
        $this->repository->update($request->only('name', 'content', 'file'), $id);
        return redirect()->back()->with('edit-success', 'Edit success !!!');
    }

}
