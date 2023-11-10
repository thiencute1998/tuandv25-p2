<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Table tin tuc
    protected $table = 'posts';

    protected $fillable = ['name', 'slug', 'status', 'content', 'image', 'category_id', 'post_date', 'views', 'author', 'title', 'keywords', 'description', 'summary'];

    public $timestamps = true;

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'post_categories', 'post_id', 'category_id');
    }
}
