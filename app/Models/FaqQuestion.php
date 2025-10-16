<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqQuestion extends Model
{
    protected $fillable = ['faq_id', 'question'];

    public function faq()
    {
        return $this->belongsTo(Faq::class);
    }
}
