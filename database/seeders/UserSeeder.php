<?php

namespace Database\Seeders;

use App\Enums\Country;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $this->createModel([
            'full_name' => [
                'uk' => 'Тамара Возняк',
                'en' => 'Tamara Wozniak',
            ],
            'email' => 'job@wozward.com',
            'password' => 'j3qjBRnEHEb',
            'avatar' => database_path('seeders/files/team/4-tamara_vozniak.jpeg'),
        ]);
    }

    private function createModel(array $data): self
    {
        $model = User::create([
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $model->copyMedia($data['avatar'])->toMediaCollection('avatar');
        return $this;
    }
}
