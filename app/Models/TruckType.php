<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class TruckType extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    public $translatable = [
        'name',
        'capacity_unit',
        'volume_unit',
        'currency',
        'distance_unit',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->sharpen(10);
    }
}
