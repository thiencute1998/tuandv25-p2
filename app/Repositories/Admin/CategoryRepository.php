<?php

namespace App\Repositories\Admin;

use App\Models\Category;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\AssignOp\Concat;

class CategoryRepository extends BaseRepository {

    public function model()
    {
        return Category::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        if (isset($searchParams['search'])) {
            $search = $searchParams['search'];
            $query->where('name', 'like', "$search%");
        }
        if (isset($searchParams['status'])) {
            $status = $searchParams['status'];
            $query->where('status', '=', "$status");
        }
        if (isset($searchParams['level'])) {
            $level = $searchParams['level'];
            $query->where('level', '=', "$level");
        }
        $query->orderBy('updated_at', 'desc');
        $categories = $query->paginate(10);
        $categories->getCollection()->transform(function ($item) {
            $item->parent_name = "";
            if ($item->parent_id) {
                $parentCate = $this->model->where('id', $item->parent_id)->first();
                if ($parentCate) {
                    $item->parent_name = $parentCate->name;
                }
            }
            return $item;
        });
        return view('admin.pages.category.index', compact('categories'));
    }

    /**
     * @throws \Exception
     */
    public function store($params) {
        DB::beginTransaction();
        try {
            $category = new $this->model;
            $params['level'] = 1;
            $params['detail'] = 1;
            if (isset($params['parent_id'])) {
                $parent = $this->model->where('id', $params['parent_id'])->first();
                if ($parent) {
                    $params['level'] = $parent->level + 1;
                    $parent->detail = 0;
                    $parent->save();
                }
            }
            $params['slug'] = Str::slug($params['name'], '-');
            $slugs = $this->model->where('slug', ''.$params['slug'].'')->first();
            if($slugs){
                $params['slug'] = $params['slug'].'-1';
            }
            $category->fill($params);
            $category->save();

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
        $category = $this->model->findOrFail($id);
        DB::beginTransaction();
        try {
            $params['level'] = 1;
            if (isset($params['parent_id'])) {
                $parent = $this->model->where('id', $params['parent_id'])->first();
                if ($parent) {
                    $params['level'] = $parent->level + 1;
                }
            }
            $params['slug'] = Str::slug($params['name'], '-');
            $category->fill($params);
            $category->save();
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

    public function getParent($params) {
        $query = $this->model->where('status', 1);
        if (isset($params['name'])) {
            $name = $params['name'];
            $query->where('name', 'like', "%$name%");
        }
        if (isset($params['self_id'])) {
            $query->where('id', '!=', $params['self_id']);
        }
        $query->orderByRaw('CONCAT(level, id, parent_id)');
        return $query->get();
    }

    public function findCategory($id) {
        if ($id) {
            return $this->model->where('id', $id)->first();
        }
        return "";
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
