<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'excerpt',
        'konten',
        'gambar',
        'kategori',
        'jenjang',
        'is_published',
        'published_at',
        'author_id',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    // Jenjang constants
    const JENJANG_UMUM = 'umum';
    const JENJANG_SMK = 'smk';
    const JENJANG_SMP = 'smp';
    const JENJANG_SMA = 'sma';

    /**
     * Boot method untuk auto-generate slug
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul);
            }
            if (empty($berita->excerpt) && !empty($berita->konten)) {
                $berita->excerpt = Str::limit(strip_tags($berita->konten), 200);
            }
        });

        static::updating(function ($berita) {
            if ($berita->isDirty('judul')) {
                $berita->slug = Str::slug($berita->judul);
            }
        });
    }

    /**
     * Relationship ke User (author)
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Scope untuk berita yang sudah dipublish
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
                     ->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }

    /**
     * Scope untuk filter berdasarkan jenjang
     */
    public function scopeByJenjang(Builder $query, string $jenjang): Builder
    {
        return $query->where('jenjang', $jenjang);
    }

    /**
     * Scope untuk SMK
     */
    public function scopeSmk(Builder $query): Builder
    {
        return $query->where('jenjang', self::JENJANG_SMK);
    }

    /**
     * Scope untuk SMP
     */
    public function scopeSmp(Builder $query): Builder
    {
        return $query->where('jenjang', self::JENJANG_SMP);
    }

    /**
     * Scope untuk SMA
     */
    public function scopeSma(Builder $query): Builder
    {
        return $query->where('jenjang', self::JENJANG_SMA);
    }

    /**
     * Scope untuk berita umum
     */
    public function scopeUmum(Builder $query): Builder
    {
        return $query->where('jenjang', self::JENJANG_UMUM);
    }

    /**
     * Get full URL gambar
     */
    public function getGambarUrlAttribute(): ?string
    {
        if (empty($this->gambar)) {
            return null;
        }
        
        if (Str::startsWith($this->gambar, ['http://', 'https://'])) {
            return $this->gambar;
        }
        
        return asset('storage/' . $this->gambar);
    }

    /**
     * Get badge color based on jenjang
     */
    public function getJenjangBadgeAttribute(): string
    {
        return match($this->jenjang) {
            self::JENJANG_UMUM => 'bg-gray-100 text-gray-800',
            self::JENJANG_SMK => 'bg-primary-100 text-primary-800',
            self::JENJANG_SMA => 'bg-blue-100 text-blue-800',
            self::JENJANG_SMP => 'bg-orange-100 text-orange-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    /**
     * Get formatted published date
     */
    public function getFormattedDateAttribute(): string
    {
        return $this->published_at 
            ? $this->published_at->format('d M Y, H:i') 
            : $this->created_at->format('d M Y, H:i');
    }
}
