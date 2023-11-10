<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    use HasFactory;

    // Quan ly Nhà thờ
    protected $table = 'churchs';

    protected $fillable = ['province', 'district', 'commune', 'village', 'parish', 'address', 'linkgmap', 'status'];

    public $timestamps = true;
}
