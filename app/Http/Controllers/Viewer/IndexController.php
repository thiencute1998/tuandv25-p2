<?php

namespace App\Http\Controllers\Viewer;

use App\Http\Controllers\Controller;
use App\Repositories\Viewer\IndexRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    private $repository;

    public function __construct(IndexRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        return $this->repository->index();
    }
}
