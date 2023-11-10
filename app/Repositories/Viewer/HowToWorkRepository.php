<?php

namespace App\Repositories\Viewer;

use App\Models\HowToWork;
use App\Repositories\BaseRepository;

class HowToWorkRepository extends BaseRepository {
    public function model()
    {
        return HowToWork::class;
    }

    public function index() {
        $work = $this->model->where('status', 1)->first();
        return view('viewer.pages.how_to_work', compact('work'));
    }

}
