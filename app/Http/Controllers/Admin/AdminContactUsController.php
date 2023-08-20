<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\ContactUsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminContactUsController extends Controller
{
    //
    private $repository;
    public function __construct(ContactUsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('name', 'email');
        return $this->repository->index($searchParams);
    }

    public function deleteFile($id) {
        $this->repository->deleteFile($id);
        return redirect()->back()->with('delete-success', 'Delete success !!!');
    }

    public function deleteFiles(Request $request) {
        $this->repository->deleteFiles($request->only('contact-check'));
        return redirect()->back()->with('delete-success', 'Delete success !!!');
    }

    public function downloadFile($id) {
        return $this->repository->downloadFile($id);
    }
}
