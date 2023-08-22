<?php

namespace App\Repositories\Viewer;

use App\Models\Homepage;
use App\Repositories\BaseRepository;

class IndexRepository extends BaseRepository {
    public function model()
    {
        return Homepage::class;
    }

    public function index() {
        $query = $this->model->query();
        $query->where('status', 1);
        $index = $query->with('categories')->get();
        return view('viewer.pages.index', compact('index'));
    }

}
