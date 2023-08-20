<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Table Danh muc

    protected $table = 'categories';

    public function homepagePost() {
        return $this->belongsTo(HomepagePost::class, 'homepage_post_id', 'id');
    }
}
