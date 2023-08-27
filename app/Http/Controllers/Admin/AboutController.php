<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\CreateUserRequest;
use App\Repositories\Admin\AboutRepository;
use App\Repositories\Admin\UserRepository;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    private $repository;
    public function __construct(AboutRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('search');
        return $this->repository->index($searchParams);
    }

    public function update(Request $request) {
        $params = $request->all();
        $this->repository->update($params);
        return redirect()->back()->with('edit-success', 'Edit config success !!!');
    }

}
