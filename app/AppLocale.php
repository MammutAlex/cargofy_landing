<?php

namespace App;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AppLocale
{
    public const All = 'all';

    public static function active()
    {
        return LaravelLocalization::getSupportedLocales()[LaravelLocalization::getCurrentLocale()];
    }

    public static function region()
    {
        return self::active()['region_id'];
    }

    public static function country()
    {
        return self::active()['country_id'];
    }

    public static function value(string $value)
    {
        return self::active()[$value];
    }

    public static function select()
    {
        return collect(LaravelLocalization::getSupportedLocales())->mapWithKeys(function ($locale) {
            return [
                $locale['country_id'] => ['label' => $locale['country'], 'group' => 'Countries']
            ];
        })->merge([
            'all' => ['label' => 'All', 'group' => 'Regions'],
            'rna' => ['label' => 'North America', 'group' => 'Regions'],
            'reu' => ['label' => 'Europe', 'group' => 'Regions']
        ]);
    }

    public static function regionFromCountry(string $country)
    {
        return collect(LaravelLocalization::getSupportedLocales())->first(fn($locale) => $locale['country_id'] === $country)['region_id'];
    }

    public static function selectRegion()
    {
        return [
            'eu' => ['label' => 'Europe'],
            'na' => ['label' => 'North America'],
        ];
    }
}
