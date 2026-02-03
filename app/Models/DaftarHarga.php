<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DaftarHarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'pendaftaran',
        'daftar_ulang',
        'total',
        'spp',
        'description',
        'category',
    ];

    protected $casts = [
        'pendaftaran' => 'decimal:2',
        'daftar_ulang' => 'decimal:2',
        'total' => 'decimal:2',
        'spp' => 'decimal:2',
    ];
}
