<?php

namespace App\Http\Data;

use App\Models\Review;
use Illuminate\Database\Eloquent\Collection;

final class ReviewData extends BaseData
{
    private Collection $models;

    public function __construct()
    {
        $this->models = Review::inRandomOrder()->region()->get();
    }

    public function toArray()
    {
        return $this->models->map(function (Review $review) {
            return [
                'author' => $review->author,
                'review' => $review->review,
            ];
        })->toArray();
    }
}
