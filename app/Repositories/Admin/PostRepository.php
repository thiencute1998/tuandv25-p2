<?php

namespace App\Repositories\Admin;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostRepository extends BaseRepository {

    private $pathCkeditor = "upload/admin/post/ckeditor";
    private $pathImage = "upload/admin/post/image";
    public function model()
    {
        return Post::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        if (isset($searchParams['name'])) {
            $name = $searchParams['name'];
            $query->where('name', 'like', "$name%");
        }
        $query->with('category')->with('tags');
        $query->orderBy('updated_at', 'desc');
        $posts = $query->paginate(10);
        return view('admin.pages.post.index', compact('posts'));
    }

    /**
     * @throws \Exception
     */
    public function store($params, $request) {
        DB::beginTransaction();
        try {
            $post = new $this->model;
            $params['slug'] = Str::slug($params['name'], '-');
            if($request->hasFile('image')) {
                $params['image'] = $this->saveFile($request->file('image'), $this->pathImage);
            }
            $post->fill($params);

            if ($post->save()) {
                if (isset($params['tags'])) {
                    foreach ($params['tags'] as $data) {
                        $post->tags()->attach($data);
                    }
                }
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function edit($id) {
        $query = $this->model->where('id', $id)
            ->with('category')
            ->with('tags');
        return $query->first();
    }

    public function update($params, $request, $id) {
        $post = $this->model->findOrFail($id);
        DB::beginTransaction();
        try {
            $params['slug'] = Str::slug($params['name'], '-');
            if($request->hasFile('image')) {
                $params['image'] = $this->saveFile($request->file('image'), $this->pathImage);
            }
            $post->fill($params);
            if ($post->save()) {
                $post->tags()->detach();
                if (isset($params['tags'])) {
                    foreach ($params['tags'] as $data) {
                        $post->tags()->attach($data);
                    }
                }
            }

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
            PostTag::where('post_id', $id)->delete();
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
        return $query->get();
    }

    public function getAllExceptSelf($id) {
        return $this->model->where('id', '!=', $id)->where('status', 1)->get();
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

    public function getTag() {
        return Tag::where('status', 1)->get();
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
