<?php

namespace App\Repositories\Viewer;

use App\Models\Product;
use App\Repositories\BaseRepository;
define('FLOOR_PLAN', 3);
class FloorPlanViewerRepository extends BaseRepository {
    public function model()
    {
        return Product::class;
    }

    public function index($slug = null) {
        $query = $this->model->where('status', 1);
        if ($slug) {
            $query->where('slug', $slug);
        }
        $products = Product::where('service_id', FLOOR_PLAN)->where('status', 1)->get();
        $productDetail = $query->where('service_id', FLOOR_PLAN)->with('productImages')->orderBy('id','asc')->first();
        $slug = $productDetail->slug;
        return view('viewer.pages.services.floor_plan', compact('products', 'productDetail', 'slug'));
    }
}
