<?php declare(strict_types=1);


use App\Enums\PartnerType;

return [
    PartnerType::class => [
        PartnerType::Detail => 'Parts',
        PartnerType::Cto => 'CTO',
        PartnerType::Gas => 'Gas station',
    ],
];
