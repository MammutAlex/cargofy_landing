<?php

namespace Database\Seeders;

use App\Models\TruckType;
use Illuminate\Database\Seeder;

class TruckTypeSeeder extends Seeder
{
    public function run(): void
    {
        $this->createModel([
            'region_id' => 'eu',
            'name' => [
                'uk' => 'Фургони',
                'en' => 'Cargo Vans',
            ],
            'example' => 'Mercedes-Benz Sprinter',
            'capacity' => '3',
            'capacity_unit' => [
                'uk' => 'т',
                'en' => 't',
            ],
            'volume' => '14',
            'volume_unit' => [
                'uk' => 'м3',
                'en' => 'м3',
            ],
            'price_per_unit_length' => '15',
            'currency' => [
                'en' => '₴',
                'uk' => '₴',
            ],
            'distance_unit' => [
                'en' => 'km',
                'uk' => 'км',
            ],
            'price_per_month' => '120 000',
            'photo' => database_path('seeders/files/trucks/wagon.png')
        ])->createModel([
            'region_id' => 'eu',
            'name' => [
                'uk' => 'П\'ятитонники',
                'en' => 'Box Trucks'
            ],
            'example' => 'Hyundai Mighty',
            'capacity' => '5',
            'capacity_unit' => [
                'uk' => 'т',
                'en' => 't',
            ],
            'volume' => '36',
            'volume_unit' => [
                'uk' => 'м3',
                'en' => 'м3',
            ],
            'price_per_unit_length' => '20',
            'currency' => [
                'en' => '₴',
                'uk' => '₴',
            ],
            'distance_unit' => [
                'en' => 'km',
                'uk' => 'км',
            ],
            'price_per_month' => '160 000',
            'photo' => database_path('seeders/files/trucks/5-tons.png')
        ])->createModel([
            'region_id' => 'eu',
            'name' => [
                'uk' => 'Десятитонники'
            ],
            'example' => 'Isuzu Elf',
            'capacity' => '10',
            'capacity_unit' => [
                'uk' => 'т',
                'en' => 't',
            ],
            'volume' => '40',
            'volume_unit' => [
                'uk' => 'м3',
                'en' => 'м3',
            ],
            'price_per_unit_length' => '25',
            'currency' => [
                'en' => '₴',
                'uk' => '₴',
            ],
            'distance_unit' => [
                'en' => 'km',
                'uk' => 'км',
            ],
            'price_per_month' => '300 000',
            'photo' => database_path('seeders/files/trucks/10-tons.png')
        ])->createModel([
            'region_id' => 'eu',
            'name' => [
                'uk' => 'Тягачі з напівпричепами',
                'en' => 'Semi Trucks',
            ],
            'example' => 'Renault Magnum',
            'capacity' => '20',
            'capacity_unit' => [
                'uk' => 'т',
                'en' => 't',
            ],
            'volume' => '82',
            'length' => '13.60',
            'width' => '2.40',
            'height' => '2.50',
            'length_unit' => [
                'uk' => 'м',
                'en' => 'м',
            ],
            'volume_unit' => [
                'uk' => 'м3',
                'en' => 'м3',
            ],
            'price_per_unit_length' => '40',
            'currency' => [
                'en' => '₴',
                'uk' => '₴',
            ],
            'distance_unit' => [
                'en' => 'km',
                'uk' => 'км',
            ],
            'price_per_month' => '320 000',
            'photo' => database_path('seeders/files/trucks/truck.png')
        ]);

        $this->createModel([
            'region_id' => 'na',
            'name' => [
                'en' => 'Cargo Vans'
            ],
            'example' => 'Mercedes-Benz Sprinter',
            'capacity' => '4,000',
            'capacity_unit' => [
                'en' => 'lbs',
            ],
            'volume' => '400-500',
            'volume_unit' => [
                'en' => 'ft3',
            ],
            'price_per_unit_length' => '1.1',
            'currency' => [
                'en' => '$',
                'uk' => '$',
            ],
            'distance_unit' => [
                'en' => 'mi',
                'uk' => 'мі',
            ],
            'price_per_month' => '8,800',
            'photo' => database_path('seeders/files/trucks/wagon.png')
        ])->createModel([
            'region_id' => 'na',
            'name' => [
                'en' => 'Box Trucks'
            ],
            'example' => 'Hyundai Mighty',
            'capacity' => '15,000',
            'capacity_unit' => [
                'en' => 'lbs',
            ],
            'volume' => '800-1000',
            'volume_unit' => [
                'en' => 'ft3',
            ],
            'price_per_unit_length' => '1.4',
            'currency' => [
                'en' => '$',
                'uk' => '$',
            ],
            'distance_unit' => [
                'en' => 'mi',
                'uk' => 'мі',
            ],
            'price_per_month' => '11,200',
            'photo' => database_path('seeders/files/trucks/5-tons.png')
        ])->createModel([
            'region_id' => 'na',
            'name' => [
                'en' => 'Straight Trucks'
            ],
            'example' => 'Isuzu Elf',
            'capacity' => '33,000',
            'capacity_unit' => [
                'en' => 'lbs',
            ],
            'volume' => '1,300-1,500',
            'volume_unit' => [
                'en' => 'ft3',
            ],
            'price_per_unit_length' => '1.7',
            'currency' => [
                'en' => '$',
                'uk' => '$',
            ],
            'distance_unit' => [
                'en' => 'mi',
                'uk' => 'мі',
            ],
            'price_per_month' => '13,600',
            'photo' => database_path('seeders/files/trucks/10-tons.png')
        ])->createModel([
            'region_id' => 'na',
            'name' => [
                'en' => 'Semi Trucks'
            ],
            'example' => 'Freightliner',
            'capacity' => '80,000',
            'capacity_unit' => [
                'en' => 'lbs',
            ],
            'volume' => '3,000-3,500',
            'volume_unit' => [
                'en' => 'ft3',
            ],
            'price_per_unit_length' => '2.3',
            'currency' => [
                'en' => '$',
                'uk' => '$',
            ],
            'distance_unit' => [
                'en' => 'mi',
                'uk' => 'мі',
            ],
            'price_per_month' => '18,400',
            'photo' => database_path('seeders/files/trucks/truck-usa.png')
        ]);
    }

    private function createModel(array $data): self
    {
        $model = TruckType::create([
            'region_id' => $data['region_id'],
            'name' => $data['name'],
            'capacity' => $data['capacity'],
            'capacity_unit' => $data['capacity_unit'],
            'volume' => $data['volume'],
            'volume_unit' => $data['volume_unit'],
            'price_per_unit_length' => $data['price_per_unit_length'],
            'currency' => $data['currency'],
            'distance_unit' => $data['distance_unit'],
            'price_per_month' => $data['price_per_month'],
            'example' => $data['example'],
        ]);
        $model->copyMedia($data['photo'])->toMediaCollection('photo');
        return $this;
    }
}
