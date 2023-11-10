<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    // Quan ly banner

    protected $table = 'banners';

    protected $fillable = ['name','image', 'status', 'type', 'link'];

    public $timestamps = true;

}
