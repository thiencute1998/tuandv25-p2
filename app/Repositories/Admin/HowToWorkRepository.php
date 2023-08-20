<?php

namespace App\Repositories\Admin;

use App\Models\HowToWork;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class HowToWorkRepository extends BaseRepository {

    private $linkImages = "upload/admin/how-to-work";

    public function model()
    {
        return HowToWork::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        if (isset($searchParams['search'])) {
            $search = $searchParams['search'];
            $query->where('content', 'like', "$search%");
        }
        $query->orderBy('updated_at', 'desc');
        $works = $query->paginate(10);
        return view('admin.pages.how-to-work.index', compact('works'));
    }

    /**
     * @throws \Exception
     */
    public function store($params) {
        DB::beginTransaction();
        try {
            if ($params['status'] == 1) {
                HowToWork::where('status', 1)->update(['status'=> 0]);
            }
            $work = new $this->model;
            if (isset($params['file'])) {
                $file = $params['file'];
                $fileName = time() . $this->generateRandomString() . "." . $file->extension();
                $file->move(public_path($this->linkImages), $fileName);
                $params['file'] = $file->getClientOriginalName();
                $params['file_name'] = $fileName;
            }
            $work->fill($params);
            $work->save();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function edit($id) {
        $query = $this->model->where('id', $id);
        return $query->first();
    }

    public function update($params, $id) {
        $work = $this->model->findOrFail($id);
        DB::beginTransaction();
        try {
            if ($params['status'] == 1) {
                HowToWork::where('status', 1)->where('id', '!=', $id)->update(['status'=> 0]);
            }
            if (isset($params['file'])) {
                $file = $params['file'];
                $fileName = time() . $this->generateRandomString() . "." . $file->extension();
                $file->move(public_path($this->linkImages), $fileName);
                $params['file'] = $file->getClientOriginalName();
                $params['file_name'] = $fileName;
            }
            $work->fill($params);
            $work->save();
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
