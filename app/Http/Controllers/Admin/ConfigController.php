<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\CreateUserRequest;
use App\Repositories\Admin\ConfigRepository;
use App\Repositories\Admin\UserRepository;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    //
    private $repository;
    public function __construct(ConfigRepository $repository)
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
        return redirect()->back()->with('Edit-success', 'Edit config success !!!');
    }

}
