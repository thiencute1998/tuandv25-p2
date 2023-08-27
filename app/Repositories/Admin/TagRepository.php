<?php

namespace App\Repositories\Admin;

use App\Models\Tag;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagRepository extends BaseRepository {

    public function model()
    {
        return Tag::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        $query->orderBy('updated_at', 'desc');
        $tags = $query->paginate(10);
        return view('admin.pages.tag.index', compact('tags'));
    }

    /**
     * @throws \Exception
     */
    public function store($params) {
        DB::beginTransaction();
        try {
            $tag = new $this->model;
            $params['slug'] = Str::slug($params['name'], '-');
            $tag->fill($params);
            $tag->save();

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
        $tag = $this->model->findOrFail($id);
        DB::beginTransaction();
        try {
            $params['slug'] = Str::slug($params['name'], '-');
            $tag->fill($params);
            $tag->save();
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

    public function getAll($params) {
        $query = $this->model->where('status', 1);
        if (isset($params['name'])) {
            $name = $params['name'];
            $query->where('name', 'like', "%$name%");
        }
        return $query->get();
    }

    public function getAllExceptSelf($id) {
        return $this->model->where('id', '!=', $id)->where('status', 1)->get();
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
