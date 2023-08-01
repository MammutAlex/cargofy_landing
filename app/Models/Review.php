<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Review extends Model
{
    use HasCountry, HasTranslations;

    public $translatable = [
        'author',
        'review',
    ];
}
