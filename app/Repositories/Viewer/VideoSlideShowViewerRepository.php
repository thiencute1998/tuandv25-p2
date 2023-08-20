<?php

namespace App\Repositories\Viewer;

use App\Models\Product;
use App\Repositories\BaseRepository;
define('VIDEO_SLIDESHOW', 4);
class VideoSlideShowViewerRepository extends BaseRepository {
    public function model()
    {
        return Product::class;
    }

    public function index($slug = null) {
        $query = $this->model->query();
        if ($slug) {
            $query->where('slug', $slug);
        }
        $productDetail = $query->where('service_id', VIDEO_SLIDESHOW)->with('productVideos')->first();
        return view('viewer.pages.services.video_slideshow', compact('productDetail'));
    }
}
