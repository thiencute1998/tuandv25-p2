<?php

namespace App\Repositories\Viewer;

use App\Models\Service;
use App\Models\Slide;
use App\Repositories\BaseRepository;

class HomeRepository extends BaseRepository {
    public function model()
    {
        return Service::class;
    }

    public function index() {
        $query = $this->model->query();
        $slides = Slide::where('status', 1)->get();
        $services = $query->orderBy('id','asc')->get();
        return view('viewer.pages.home', compact('services', 'slides'));
    }

}
