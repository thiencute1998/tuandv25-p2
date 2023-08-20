<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalenderEvent extends Model
{
    use HasFactory;

    // Table lich phung vu
    protected $table = 'calender_events';

    protected $fillable = ['name', 'content', 'slug', 'd_date', 'status', 'views', 'image', 'address'];

    public $timestamps = true;
}
