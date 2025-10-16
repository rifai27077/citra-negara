<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Faq extends Model
{
    use Searchable;

    protected $fillable = [
        'question',
        'answer',
        'category',
        'domain', // ✅ penting agar domain disimpan
    ];

    public function aliases()
    {
        return $this->hasMany(FaqQuestion::class, 'faq_id', 'id'); // ✅ pastikan relasi jelas
    }

    public function toSearchableArray()
    {
        return [
            'id'       => $this->id,
            'question' => $this->question,
            'answer'   => $this->answer,
            'category' => $this->category,
            'aliases'  => $this->aliases->pluck('question')->implode(' '),
        ];
    }

    public function getScoutKeyName()
    {
        return 'id';
    }
}
