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

    public function categories(){
        return $this->belongsToMany(Category::class, 'homepage_categories', 'home_id', 'category_id');
    }
}
