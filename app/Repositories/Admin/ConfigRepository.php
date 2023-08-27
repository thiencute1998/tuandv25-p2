<?php

namespace App\Repositories\Admin;

use App\Models\Config;
use App\Repositories\BaseRepository;

class ConfigRepository extends BaseRepository {
    public function model()
    {
        return Config::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        $config = $query->where('id', 1)->firstOrFail();
        return view('admin.pages.config.config', compact('config'));
    }

    public function update($params) {
        $config = $this->model->where('id', 1)->firstOrFail();
        $config->fill($params);
        $config->save();
    }

}
