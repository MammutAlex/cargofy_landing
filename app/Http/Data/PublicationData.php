<?php

namespace App\Http\Data;

use App\Models\Publication;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

final class PublicationData extends BaseData
{
    private Collection $models;

    public function __construct()
    {
        $this->models = Publication::orderByDesc('published_at')->where('published_at', '<', Carbon::now())->region()->limit(5)->get();
    }

    public function toArray(): array
    {
        return $this->models->map(function (Publication $publications) {
            return [
                'slug' => $publications->slug,
                'title' => $publications->title,
                'description' => $publications->description_generate,
                'published_at' => $publications->published_at,
                'views_count' => $publications->views_count,
                'author' => [
                    'name' => $publications->user?->name,
                    'avatar' => $publications->user?->getFirstMediaUrl('avatar', 'thumb'),
                ],
            ];
        })->toArray();
    }
}
