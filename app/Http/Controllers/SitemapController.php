<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class SitemapController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('sitemap/index', [

        ]);
    }
}
