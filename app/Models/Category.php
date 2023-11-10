<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Table Danh muc

    protected $table = 'categories';

    protected $fillable = ['name', 'link', 'parent_id', 'status', 'slug', 'level', 'path_parent', 'order', 'detail'];

    public $timestamps = true;

    public function homepagePost() {
        return $this->belongsTo(HomepagePost::class, 'homepage_post_id', 'id');
    }

    public function posts() {
        return $this->belongsToMany(Post::class, 'post_categories','category_id', 'post_id');
    }
}
