<?php

namespace App\Repositories\Admin\Banner;

use App\Models\BannerContact;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class BannerContactRepository extends BaseRepository {

    private $linkImages = "upload/admin/banner/contact";

    public function model()
    {
        return BannerContact::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        if (isset($searchParams['search'])) {
            $search = $searchParams['search'];
            $query->where('content', 'like', "$search%");
        }
        $query->orderBy('updated_at', 'desc');
        $contacts = $query->paginate(10);
        return view('admin.pages.banner.contact.index', compact('contacts'));
    }

    /**
     * @throws \Exception
     */
    public function store($params) {
        DB::beginTransaction();
        try {
            if ($params['status'] == 1) {
                BannerContact::where('status', 1)->update(['status'=> 0]);
            }
            $contact = new $this->model;
            if (isset($params['file'])) {
                $file = $params['file'];
                $fileName = time() . $this->generateRandomString() . "." . $file->extension();
                $file->move(public_path($this->linkImages), $fileName);
                $params['file'] = $file->getClientOriginalName();
                $params['file_name'] = $fileName;
            }
            $contact->fill($params);
            $contact->save();

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
        $contact = $this->model->findOrFail($id);
        DB::beginTransaction();
        try {
            if ($params['status'] == 1) {
                BannerContact::where('status', 1)->where('id', '!=', $id)->update(['status'=> 0]);
            }
            if (isset($params['file'])) {
                $file = $params['file'];
                $fileName = time() . $this->generateRandomString() . "." . $file->extension();
                $file->move(public_path($this->linkImages), $fileName);
                $params['file'] = $file->getClientOriginalName();
                $params['file_name'] = $fileName;
            }
            $contact->fill($params);
            $contact->save();
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
