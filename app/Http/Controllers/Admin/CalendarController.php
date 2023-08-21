<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\CalendarRepository;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //
    private $repository;
    public function __construct(CalendarRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('search');
        return $this->repository->index($searchParams);
    }

    public function create() {
        return view('admin.pages.calendar.create');
    }

    public function store(Request $request) {
        $params = $request->only('name', 'image', 'd_date', 'content', 'status', 'address');
        $this->repository->store($params, $request);
        return redirect()->back()->with('add-success', 'Thêm  lịch phụng vụ thành công !!!');
    }

    public function edit($id) {
        $calendar = $this->repository->edit($id);
        return view('admin.pages.calendar.edit', compact('calendar'));
    }

    public function update(Request $request, $id) {
        $params = $request->only('name', 'image', 'd_date', 'content', 'status', 'address');
        $this->repository->update($params, $request, $id);
        return redirect()->back()->with('edit-success', 'Cập nhật  lịch phụng vụ thành công !!!');
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Xóa  lịch phụng vụ thành công !!!');
    }
    public function ckeditorUpload(Request $request) {
        return $this->repository->ckeditorUpload($request);
    }
}
