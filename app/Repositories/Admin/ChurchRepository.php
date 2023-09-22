<?php

namespace App\Repositories\Admin;

use App\Models\Church;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ChurchRepository extends BaseRepository {

    public function model()
    {
        return Church::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        $query->orderBy('updated_at', 'desc');
        $churchs = $query->paginate(10);
        return view('admin.pages.church.index', compact('churchs'));
    }

    /**
     * @throws \Exception
     */
    public function store($params) {
        DB::beginTransaction();
        try {
            $link = new $this->model;
            $link->fill($params);
            $link->save();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function edit($id) {
        $query = $this->model->where('id', $id);
        return $query->firstOrFail();
    }

    public function update($params, $id) {
        $link = $this->model->findOrFail($id);
        DB::beginTransaction();
        try {
            $link->fill($params);
            $link->save();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function delete($id) {
        DB::beginTransaction();
        try {
            $this->model->where('id', $id)->delete();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}
