<?php

namespace App\Repositories\Viewer;

use App\Models\Product;
use App\Repositories\BaseRepository;
define('PHOTO_EDITING', 1);
class PhotoEditingViewerRepository extends BaseRepository {
    public function model()
    {
        return Product::class;
    }

    public function index($slug = null) {
        $query = $this->model->where('status', 1);
        if ($slug) {
            $query->where('slug', $slug);
        }
        $products = Product::where('service_id', PHOTO_EDITING)->where('status', 1)->get();
        $productDetail = $query->where('service_id', PHOTO_EDITING)->with('productImages')->orderBy('id','asc')->first();
        $slug = $productDetail->slug;
        return view('viewer.pages.services.photo_editing', compact('products', 'productDetail', 'slug'));
    }
}
