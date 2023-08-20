<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductVideo;
use App\Models\Product;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

define('VIDEO_SLIDESHOW', 4);

class VideoSlideShowRepository extends BaseRepository {

    private $linkImages = "upload/admin/services/video_slideshow";
    private $linkUploads = "upload/admin/services/ckeditor";

    public function model()
    {
        return Product::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        $query->where('service_id', VIDEO_SLIDESHOW);
        if (isset($searchParams['search'])) {
            $search = $searchParams['search'];
            $query->where('name', 'like', "$search%");
        }
        $query->orderBy('updated_at', 'desc');
        $products = $query->paginate(10);
        return view('admin.pages.services.video-slideshow.index', compact('products'));
    }

    /**
     * @throws \Exception
     */
    public function store($params) {
        DB::beginTransaction();
        try {
            if ($params['status'] == 1) {
                $this->model->where('service_id', VIDEO_SLIDESHOW)
                    ->where('status', 1)->update(['status'=> 0]);
            }
            $product = new $this->model;
            $product->service_id = VIDEO_SLIDESHOW;
            $product->fill($params);
            $product->save();

            if (isset($params['videos'])) {
                $videos = $params['videos'];
                foreach ($videos as $key=> $video) {
                    $file = null;
                    $fileName = null;

                    if (isset($params['files'][$key])) {
                        $file = $params['files'][$key];
                        $fileName = time() . $this->generateRandomString() . "." . $file->extension();
                        $file->move(public_path($this->linkImages), $fileName);
                        $file = $file->getClientOriginalName();
                    }
                    $arr[] = [
                        'product_id'=> $product->id,
                        'link'=> $video,
                        'file'=> $file,
                        'file_name'=> $fileName
                    ];
                }
                ProductVideo::insert($arr);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function edit($id) {
        $query = Product::query();
        $query->where('id', $id);
        return $query->with('productVideos')->first();
    }

    public function update($params, $id) {
        $product = $this->model->findOrFail($id);
        DB::beginTransaction();
        try {
            if ($params['status'] == 1) {
                $this->model->where('status', 1)->where('service_id', VIDEO_SLIDESHOW)
                    ->where('id', '!=', $id)->update(['status'=> 0]);
            }
            $product->fill($params);
            $product->service_id = VIDEO_SLIDESHOW;
            $product->save();
            ProductVideo::where('product_id', $id)->delete();
            $total = $params['total_image'];
            $arr = [];
            for($i = 1; $i <= $total; $i++) {
                $file = null;
                $link = null;
                $fileName = null;
                if (isset($params['file_hidden'. $i])) {
                    $file = $params['file_hidden'. $i];
                    $fileName = $params['file_name_hidden'. $i];
                }
                if (isset($params['files'. $i])) {
                    $image = $params['files'. $i];
                    $fileName = time() . $this->generateRandomString() . "." . $image->extension();
                    $image->move(public_path($this->linkImages), $fileName);
                    $file = $image->getClientOriginalName();
                }
                if (isset($params['videos'. $i])) {
                    $link = $params['videos'. $i];
                }
                if ($file || $fileName || $link) {
                    $arr[] = [
                        'product_id'=> $product->id,
                        'link'=> $link,
                        'file'=> $file,
                        'file_name'=> $fileName
                    ];
                }
            }
            ProductVideo::insert($arr);
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
            ProductVideo::where('product_id', $id)->delete();
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

    public function upload($request) {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('upload')->move(public_path($this->linkUploads), $filenametostore);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset($this->linkUploads . '/' . $filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
