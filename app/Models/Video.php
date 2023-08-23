<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    // Table lich phung Videos
    protected $table = 'videos';

    protected $fillable = ['name', 'link', 'updated_at', 'status', 'view_count', 'created_at'];

    public $timestamps = true;
}
