<?php

namespace App\Models;

use App\AppLocale;
use Illuminate\Database\Eloquent\Builder;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

trait HasCountry
{
    public function scopeRegion(Builder $query, ?string $country = null): void
    {
        if (is_null($country)) {
            $country = AppLocale::country();
        }
        $query->whereIn('country_id', [
            AppLocale::All,
            LaravelLocalization::getSupportedLocales()[LaravelLocalization::getCurrentLocale()]['region_id'],
            $country,
        ]);
    }
}
