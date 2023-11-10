<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    // Quan ly lien ket
    protected $table = 'links';

    protected $fillable = ['name', 'link', 'status'];

    public $timestamps = true;
}
