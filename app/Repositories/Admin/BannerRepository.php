<?php

namespace App\Repositories\Admin;

use App\Models\Banner;
use App\Models\Tag;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BannerRepository extends BaseRepository {

    private $pathImage = "upload/admin/banner/image";

    public function model()
    {
        return Banner::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        $query->orderBy('updated_at', 'desc');
        $banners = $query->paginate(10);
        return view('admin.pages.banner.index', compact('banners'));
    }

    /**
     * @throws \Exception
     */
    public function store($params, $request) {
        DB::beginTransaction();
        try {
            $banner = new $this->model;
            if ($params['status']) {
                //$this->model->query()->update(['status'=> 0]);
            }
            if($request->hasFile('image')) {
                $params['image'] = $this->saveFile($request->file('image'), $this->pathImage);
            }
            $banner->fill($params);
            $banner->save();

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

    public function update($params, $id, $request) {
        $banner = $this->model->findOrFail($id);
        DB::beginTransaction();
        try {
            if ($params['status']) {
                //$this->model->query()->update(['status'=> 0]);
            }
            if($request->hasFile('image')) {
                $params['image'] = $this->saveFile($request->file('image'), $this->pathImage);
            }
            $banner->fill($params);
            $banner->save();
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

    public function saveFile($file, $path) {
        //get filename with extension
        $filenamewithextension = $file->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //get file extension
        $extension = $file->getClientOriginalExtension();

        //filename to store
        $fileNameStore = $filename.'_'.time().'.'.$extension;
        //Upload File
        $file->move(public_path($path), $fileNameStore);
        return $fileNameStore;
    }
}
