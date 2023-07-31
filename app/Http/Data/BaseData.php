<?php

namespace App\Http\Data;

use App\AppLocale;
use App\Models\City;
use App\Models\TruckType;
use Illuminate\Contracts\Support\Arrayable;

abstract class BaseData implements Arrayable
{
    public static function make(...$arguments): self
    {
        return new static(...$arguments);
    }
}
