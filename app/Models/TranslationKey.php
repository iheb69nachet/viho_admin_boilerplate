<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranslationKey extends Model
{
    use HasFactory;
    protected $fillable = ['parent_key', 'key', 'value', 'language_id'];
    public $timestamps = true;
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
