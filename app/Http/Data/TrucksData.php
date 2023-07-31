<?php

namespace App\Http\Data;

use App\AppLocale;
use App\Models\TruckType;
use Illuminate\Database\Eloquent\Collection;

final class TrucksData extends BaseData
{
    private Collection $models;

    public function __construct()
    {
        $this->models = TruckType::where('region_id', AppLocale::region())->get();
    }

    public function toArray()
    {
        return $this->models->map(function (TruckType $truck) {
            return [
                'name' => $truck->name,
                'capacity' => $truck->capacity,
                'capacity_unit' => $truck->capacity_unit,
                'volume' => $truck->volume,
                'volume_unit' => $truck->volume_unit,
                'price_per_unit_length' => $truck->price_per_unit_length,
                'currency' => $truck->currency,
                'distance_unit' => $truck->distance_unit,
                'price_per_month' => $truck->price_per_month,
                'example' => $truck->example,
                'photo' => $truck->getFirstMediaUrl('photo', 'thumb'),
            ];
        })->toArray();
    }
}
