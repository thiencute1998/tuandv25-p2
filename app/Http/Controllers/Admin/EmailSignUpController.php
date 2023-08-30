<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\EmailSignUpRepository;
use Illuminate\Http\Request;

class EmailSignUpController extends Controller
{
    //
    private $repository;
    public function __construct(EmailSignUpRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('search');
        return $this->repository->index($searchParams);
    }
}
