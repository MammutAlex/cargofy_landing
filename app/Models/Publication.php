<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Publication extends Model
{
    use HasTranslations, HasCountry;

    public $translatable = [
        'title',
        'description',
        'text',
    ];
    protected $casts = [
        'published_at' => 'datetime'
    ];

    public function descriptionGenerate(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->description ?: Str::words($this->clear_text, 20),
        );
    }

    public function clearText(): Attribute
    {
        return Attribute::make(
            get: fn($value) => strip_tags(htmlspecialchars_decode($this->text)),
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
