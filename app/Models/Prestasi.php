<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'date',
        'category',
        'image',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
