<?php

namespace App\Http\Data;

use App\Models\Question;
use Illuminate\Database\Eloquent\Collection;
use Spatie\SchemaOrg\BaseType;
use Spatie\SchemaOrg\FAQPage;
use Spatie\SchemaOrg\Schema;

final class FaqData extends BaseData
{
    private Collection $models;

    public function __construct()
    {
        $this->models = Question::region()->get();
    }

    public function toArray()
    {
        return $this->models->map(function (Question $faq) {
            return [
                'question' => $faq->question,
                'answer' => $faq->answer
            ];
        })->toArray();
    }
}
