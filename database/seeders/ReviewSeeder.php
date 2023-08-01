<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $this->createModel([
            'country_id' => 'ua',
            'author' => [
                'uk' => 'Дмитро',
                'en' => 'Alex',
            ],
            'review' => [
                'uk' => 'Хочу сказати величезне спасибі диспетчерам, нарешті я можу займатися улюбленою справою і не відволікатись на постійний пошук замовлень',
                'en' => 'Best. Dispatch Service. Ever! I don\'t know what else to say.',
            ]
        ])->createModel([
            'country_id' => 'ua',
            'author' => [
                'uk' => 'Олександр',
                'en' => 'Benjamin Laing',
            ],
            'review' => [
                'uk' => 'Велике спасибі диспетчерам за роботу, таких дбайливих і уважних до деталей людей я ще не зустрічав в індустрії перевезень!',
                'en' => 'Cargofy is the next killer app for truckers. Thank you for making it painless, pleasant, and most of all hassle-free!',
            ]
        ])->createModel([
            'country_id' => 'ua',
            'author' => [
                'uk' => 'Іван',
                'en' => 'Greg Lingle',
            ],
            'review' => [
                'uk' => 'Хороша, порядна компанія, і все вчасно платить. Але хотілося б більше рейсів на довгі відстані.',
                'en' => 'I will recommend you to my trucker friends. Cargofy helps to make my daily work easier and earn money for family',
            ]
        ]);
    }

    private function createModel(array $data): self
    {
        $model = Review::create([
            'country_id' => $data['country_id'],
            'author' => $data['author'],
            'review' => $data['review'],
        ]);
        return $this;
    }
}
