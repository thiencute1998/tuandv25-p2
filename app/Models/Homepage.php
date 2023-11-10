<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    use HasFactory;

    protected $table = 'homepage';

    public $timestamp = true;

    protected $fillable = ['name', 'category_id', 'post_id', 'status', 'order'];

    public function categories() {
        return $this->belongsToMany(Category::class, 'homepage_categories','home_id', 'category_id');
    }
}
