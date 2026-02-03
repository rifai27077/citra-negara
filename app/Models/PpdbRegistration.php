<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PpdbRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
        'email',
        'sekolah_asal',
        'alamat_sekolah',
        'jenjang',
        'jurusan',
        'status',
        'catatan',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    // Status constants
    const STATUS_PENDING = 'pending';
    const STATUS_DITERIMA = 'diterima';
    const STATUS_DITOLAK = 'ditolak';

    // Jenjang constants
    const JENJANG_SMK = 'smk';
    const JENJANG_SMP = 'smp';
    const JENJANG_SMA = 'sma';

    /**
     * Scope untuk filter SMK
     */
    public function scopeSmk(Builder $query): Builder
    {
        return $query->where('jenjang', self::JENJANG_SMK);
    }

    /**
     * Scope untuk filter SMP
     */
    public function scopeSmp(Builder $query): Builder
    {
        return $query->where('jenjang', self::JENJANG_SMP);
    }

    /**
     * Scope untuk filter SMA
     */
    public function scopeSma(Builder $query): Builder
    {
        return $query->where('jenjang', self::JENJANG_SMA);
    }

    /**
     * Scope untuk filter berdasarkan jenjang
     */
    public function scopeByJenjang(Builder $query, string $jenjang): Builder
    {
        return $query->where('jenjang', $jenjang);
    }

    /**
     * Scope untuk filter berdasarkan status
     */
    public function scopeByStatus(Builder $query, string $status): Builder
    {
        return $query->where('status', $status);
    }

    /**
     * Scope untuk status pending
     */
    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    /**
     * Scope untuk status diterima
     */
    public function scopeDiterima(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_DITERIMA);
    }

    /**
     * Scope untuk status ditolak
     */
    public function scopeDitolak(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_DITOLAK);
    }

    /**
     * Get badge color based on status
     */
    public function getStatusBadgeAttribute(): string
    {
        return match($this->status) {
            self::STATUS_PENDING => 'bg-yellow-100 text-yellow-800',
            self::STATUS_DITERIMA => 'bg-green-100 text-green-800',
            self::STATUS_DITOLAK => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    /**
     * Get badge color based on jenjang
     */
    public function getJenjangBadgeAttribute(): string
    {
        return match($this->jenjang) {
            self::JENJANG_SMK => 'bg-primary-100 text-primary-800',
            self::JENJANG_SMA => 'bg-blue-100 text-blue-800',
            self::JENJANG_SMP => 'bg-orange-100 text-orange-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    /**
     * Get formatted tanggal lahir
     */
    public function getTtlAttribute(): string
    {
        return $this->tempat_lahir . ', ' . $this->tanggal_lahir->format('d F Y');
    }

    /**
     * Get jenis kelamin label
     */
    public function getJenisKelaminLabelAttribute(): string
    {
        return $this->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan';
    }
}
