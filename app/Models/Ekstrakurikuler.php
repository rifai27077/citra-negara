<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'category',
    ];
}
