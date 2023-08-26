<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Table tin tuc
    protected $table = 'posts';

    protected $fillable = ['name', 'slug', 'status', 'content', 'image', 'category_id', 'views', 'author', 'title', 'keywords', 'description'];

    public $timestamps = true;
    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
}
