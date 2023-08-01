<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Question extends Model
{
    use HasTranslations, HasCountry;

    public $translatable = [
        'question',
        'answer',
    ];
}
