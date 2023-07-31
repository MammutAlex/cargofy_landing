<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AgreementController;
use App\Http\Controllers\DispatcherController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoadController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SitemapDispatcherController;
use App\Http\Controllers\SitemapLoadController;
use App\Http\Controllers\SitemapRouteController;
use App\Http\Controllers\SitemapTransportController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\TransportController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'setLocale']
], function () {

    Route::post('/locale', LocaleController::class)->name('locale');

    Route::get('/', IndexController::class)->name('index');
    Route::get('/about-us', AboutController::class)->name('about-us');
    Route::get('/agreements', AgreementController::class)->name('agreements');
    Route::get('/policy', PolicyController::class)->name('policy');
    Route::get('/terms-of-use', TermsController::class)->name('terms-of-use');

    Route::get('/truck-profit-calculator/{transport:slug}', [TransportController::class, 'show'])->name('truck-profit-calculator.show');

    Route::resource('/publications', PublicationController::class)->only(['index', 'show'])->scoped(['publication' => 'slug']);

    Route::resource('/truck-dispatcher', DispatcherController::class)->only(['index', 'show'])->scoped(['publication' => 'slug']);
    Route::resource('/find-loads', LoadController::class)->only(['index', 'show'])->scoped(['publication' => 'slug']);

    Route::get('/route-planner/{cityFrom}/{cityTo}', RouteController::class)->name('calculate-freight-rates-cityFrom-cityTo');

    Route::prefix('sitemap')->name('sitemap.')->group(function () {
        Route::get('/', SitemapController::class)->name('index');
        Route::get('/truck-profit-calculator', SitemapTransportController::class)->name('calculate-freight-rates');
        Route::get('/truck-dispatcher', SitemapDispatcherController::class)->name('routes');
        Route::get('/find-loads', SitemapLoadController::class)->name('services');
        Route::get('/route-planner', SitemapRouteController::class)->name('shipping');
    });
});
