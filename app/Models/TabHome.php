<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabHome extends Model
{
    use HasFactory;

    // Table QL TabHome
    protected $table = 'homepage';

    protected $fillable = ['name', 'post_id', 'order', 'status'];

    public $timestamps = true;

    public function posts() {
        return $this->belongsToMany(Post::class, 'post_tags', 'tag_id', 'post_id');
    }
    public function tags(){
        return $this->belongsToMany(HomepageCategory::class, 'homepage_categories', 'post_id', 'tag_id');
    }
}
