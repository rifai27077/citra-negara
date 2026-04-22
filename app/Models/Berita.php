<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'category',
        'jenjang',
        'is_published',
        'published_at',
        'author_id',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeByJenjang($query, $jenjang)
    {
        return $query->where('jenjang', $jenjang);
    }

    public function scopeUmum($query)
    {
        return $query->where('jenjang', 'umum');
    }

    public function scopeSmk($query)
    {
        return $query->where('jenjang', 'smk');
    }

    public function scopeSmp($query)
    {
        return $query->where('jenjang', 'smp');
    }

    public function scopeSma($query)
    {
        return $query->where('jenjang', 'sma');
    }

    // Accessors
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return asset('img/placeholder.jpg');
    }

    public function getFormattedDateAttribute()
    {
        return $this->published_at ? $this->published_at->format('d M Y') : $this->created_at->format('d M Y');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
             if (empty($model->slug)) {
                 $model->slug = Str::slug($model->title);
             }
        });
    }
}
