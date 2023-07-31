<?php

namespace App\Http\Pages;

use App\AppLocale;
use App\Models\SeoPage;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;

abstract class BasePage implements Arrayable
{
    private array $addData = [];

    public function __construct(protected array $data = [])
    {
    }

    public static function make(...$arguments): self
    {
        return new static(...$arguments);
    }

    protected abstract function enUs(): array;


    public function toArray()
    {
        $contentMethod = Str::of(AppLocale::value('code'))->camel()->value();
        if (method_exists($this, $contentMethod)) {
            $content = $this->{$contentMethod}();
        } else {
            $content = $this->enUs();
        }
        $model = SeoPage::where('path', request()->path())->first();
        return [
            'meta_title' => $model?->meta_title ?: $content['meta_title'],
            'meta_description' => $model?->meta_description ?: $content['meta_description'],
            'title' => $model?->title ?: $content['title'],
            'description' => $model?->description ?: $content['description'],
            'seo_text' => $model?->seo_text ?: $content['seo_text'],
            ...$this->addData
        ];
    }

    public function data(array $data): self
    {
        $this->addData = $data;
        return $this;
    }
}
