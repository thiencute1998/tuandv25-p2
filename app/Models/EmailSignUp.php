<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailSignUp extends Model
{
    use HasFactory;

    protected $table = "email_sign_up";

    protected $fillable = ["email"];
    public $timestamps = true;
}
