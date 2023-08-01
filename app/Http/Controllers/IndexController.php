<?php

namespace App\Http\Controllers;

use App\Http\Data\BidsData;
use App\Http\Data\FaqData;
use App\Http\Data\PartnerData;
use App\Http\Data\PublicationData;
use App\Http\Data\ReviewData;
use App\Http\Data\TrucksData;
use App\Http\Pages\IndexPage;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Spatie\SchemaOrg\Schema;

class IndexController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('index',[
            'page' => IndexPage::make()->data([
                'schema' => Schema::organization()
                    ->url(Request::fullUrl())
                    ->name(__('fr8lines'))
                    ->logo(asset('/images/logo.svg'))
                    ->image([
                        'https://cargofy-langings-prod.fra1.digitaloceanspaces.com/15175a28-4489-4e7f-8ff2-0b6015a742e5/wagon.png',
                    ])
                    ->sameAs([
                        'https://www.instagram.com/cargofy/',
                        'https://twitter.com/cargofy',
                        'https://www.linkedin.com/company/cargofy',
                        'https://www.facebook.com/cargofy',
                    ]),
            ]),
            'trucks' => TrucksData::make(),
            'partners' => PartnerData::make(),
            'reviews' => ReviewData::make(),
            'publications' => PublicationData::make(),
            'faq' => FaqData::make(),
        ]);
    }
}
