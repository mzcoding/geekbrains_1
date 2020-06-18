<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $table = "uploads";
    protected  $primaryKey = "id";

    protected $fillable = ['user_id', 'title', 'file'];
}
