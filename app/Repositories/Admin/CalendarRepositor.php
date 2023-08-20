<?php

namespace App\Repositories\Admin;

use App\Models\CalenderEvent;
use App\Models\PostTag;
use App\Models\Tag;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CalendarRepositor extends BaseRepository {

    private $pathCkeditor = "upload/admin/calendar/ckeditor";
    private $pathImage = "upload/admin/calendar/image";
    public function model()
    {
        return CalenderEvent::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        if (isset($searchParams['name'])) {
            $name = $searchParams['name'];
            $query->where('name', 'like', "$name%");
        }
        $query->orderBy('updated_at', 'desc');
        $calendars = $query->paginate(10);
        return view('admin.pages.calendar.index', compact('calendars'));
    }

    /**
     * @throws \Exception
     */
    public function store($params, $request) {
        DB::beginTransaction();
        try {
            $calendar = new $this->model;
            $params['slug'] = Str::slug($params['name'], '-');
            if (isset($params['d_date'])) {
                $params['d_date'] = Carbon::createFromFormat('m/d/Y', $params['d_date'])->format('Y-m-d');
            }
            if($request->hasFile('image')) {
                $params['image'] = $this->saveFile($request->file('image'), $this->pathImage);
            }
            $calendar->fill($params);
            $calendar->save();

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

    public function update($params, $request, $id) {
        $calendar = $this->model->findOrFail($id);
        DB::beginTransaction();
        try {
            $params['slug'] = Str::slug($params['name'], '-');
            if (isset($params['d_date'])) {
                $params['d_date'] = Carbon::createFromFormat('m/d/Y', $params['d_date'])->format('Y-m-d');
            }
            if($request->hasFile('image')) {
                $params['image'] = $this->saveFile($request->file('image'), $this->pathImage);
            }
            $calendar->fill($params);
            $calendar->save();

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

    public function ckeditorUpload($request) {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $fileNameStore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('upload')->move(public_path($this->pathCkeditor), $fileNameStore);
            $url = asset($this->pathCkeditor . '/' . $fileNameStore);
            return response()->json([
                'fileName'=> $fileNameStore, 'uploaded'=> 1, 'url'=> $url
            ]);
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
