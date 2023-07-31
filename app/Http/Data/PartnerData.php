<?php

namespace App\Http\Data;

use App\AppLocale;
use App\Enums\PartnerType;
use App\Models\Partner;
use App\Models\TruckType;
use Illuminate\Database\Eloquent\Collection;

final class PartnerData extends BaseData
{
    private Collection $models;

    public function __construct()
    {
        $this->models = Partner::region()->get();
    }

    public function toArray()
    {
        return $this->models->map(function (Partner $partner) {
            return [
                'category' => PartnerType::getDescription($partner->category_id),
                'name' => $partner->name,
                'text' => $partner->text,
                'sale' => $partner->sale,
                'photo' => $partner->getFirstMediaUrl('photo'),
            ];
        })->toArray();
    }
}
