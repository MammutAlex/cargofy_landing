<?php declare(strict_types=1);


use App\Enums\PartnerType;

return [
    PartnerType::class => [
        PartnerType::Detail => 'Запчастини',
        PartnerType::Cto => 'Автосервіс',
        PartnerType::Gas => 'Паливо та газ',
    ],
];
