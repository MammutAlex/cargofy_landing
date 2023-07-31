<?php

namespace Database\Seeders;

use App\Enums\PartnerType;
use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $this->createModel([
            'country_id' => 'eu',
            'category_id' => PartnerType::Detail,
            'name' => [
                'uk' => 'ELIT',
                'en' => 'ELIT',
            ],
            'text' => [
                'uk' => 'Знижка 27% на автозапчастини в інтернет-магазині eshop.elit.ua або в будь-якій із 31 філій.',
                'en' => 'Знижка 27% на автозапчастини в інтернет-магазині eshop.elit.ua або в будь-якій із 31 філій.',
            ],
            'sale' => [
                'uk' => 'до 27%',
                'en' => 'до 27%',
            ],

            'photo' => database_path('seeders/files/sales/1.png'),
        ])->createModel([
            'country_id' => 'eu',
            'category_id' => PartnerType::Cto,
            'name' => [
                'uk' => 'CarBook',
                'en' => 'CarBook',
            ],
            'text' => [
                'uk' => 'Знижки до 50% на послуги СТО, шиномонтажу та автомийок, які можна замовити на carbook.ua',
                'en' => 'Знижки до 50% на послуги СТО, шиномонтажу та автомийок, які можна замовити на carbook.ua',
            ],
            'sale' => [
                'uk' => 'до 50%',
                'en' => 'до 50%',
            ],

            'photo' => database_path('seeders/files/sales/2.png'),
        ])->createModel([
            'country_id' => 'eu',
            'category_id' => PartnerType::Gas,
            'name' => [
                'uk' => 'ОККО',
                'en' => 'ОККО',
            ],
            'text' => [
                'uk' => 'Знижки від 3-4 грн/л бензину або дизеля, 1-1,5 грн на газ та безкоштовну каву.',
                'en' => 'Знижки від 3-4 грн/л бензину або дизеля, 1-1,5 грн на газ та безкоштовну каву.',
            ],
            'sale' => [
                'uk' => 'до 15%',
                'en' => 'до 15%',
            ],

            'photo' => database_path('seeders/files/sales/3.png'),
        ])->createModel([
            'country_id' => 'eu',
            'category_id' => PartnerType::Detail,
            'name' => [
                'uk' => 'ШипШина',
                'en' => 'ШипШина',
            ],
            'text' => [
                'uk' => 'Знижки до 15% на шини, диски та акумулятори у магазинах ”ШипШина”',
                'en' => 'Знижки до 15% на шини, диски та акумулятори у магазинах ”ШипШина”',
            ],
            'sale' => [
                'uk' => 'до 15%',
                'en' => 'до 15%',
            ],

            'photo' => database_path('seeders/files/sales/4.png'),
        ]);
    }

    private function createModel(array $data): self
    {
        $model = Partner::create([
            'country_id' => $data['country_id'],
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'text' => $data['text'],
            'sale' => $data['sale'],
        ]);
        $model->copyMedia($data['photo'])->toMediaCollection('photo');
        return $this;
    }
}
