<?php

namespace App\Repositories\Admin\Service;

use App\Models\Service;
use App\Models\ServiceImage;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class ServiceIntroduceRepository extends BaseRepository {

    private $linkImages = "upload/admin/services/introduce";

    public function model()
    {
        return Service::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        if (isset($searchParams['search'])) {
            $search = $searchParams['search'];
            $query->where('name', 'like', "$search%");
        }
        $query->orderBy('id', 'asc');
//        $services = $query->with('serviceImages')->paginate(10);
        $services = $query->paginate(10);
        return view('admin.pages.services.introduce.index', compact('services'));
    }

    public function edit($id) {
        $query = $this->model->where('id', $id);
        return $query->with('serviceImages')->first();
    }

    public function update($params, $id) {
        $service = $this->model->findOrFail($id);
        DB::beginTransaction();
        try {
            if (isset($params['file'])) {
                $file = $params['file'];
                $fileName = time() . $this->generateRandomString() . "." . $file->extension();
                $file->move(public_path($this->linkImages), $fileName);
                $params['file'] = $file->getClientOriginalName();
                $params['file_name'] = $fileName;
            }
            $service->fill($params);
            $service->save();
//            ServiceImage::where('service_id', $id)->delete();

//            $total = $params['total_image'];
//            for($i = 1; $i <= $total; $i++){
//                $file = null;
//                $fileName = null;
//                if (isset($params['file'. $i])) {
//                    $file = $params['file'. $i];
//                    $fileName = $params['file_name'. $i];
//                }
//                if (isset($params['files'. $i])) {
//                    $fileUpload = $params['files'. $i];
//                    $fileName = time() . $this->generateRandomString() . "." . $fileUpload->extension();
//                    $fileUpload->move(public_path($this->linkImages), $fileName);
//                    $file = $fileUpload->getClientOriginalName();
//                }
//                if ($file) {
//                    ServiceImage::insert([
//                        'service_id'=> $service->id,
//                        'file'=> $file,
//                        'file_name'=> $fileName
//                    ]);
//                }
//            }

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
