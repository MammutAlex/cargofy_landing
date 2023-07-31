<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocaleRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LocaleController extends Controller
{
    public function __invoke(LocaleRequest $request)
    {
        $locale = $request->input('locale');
        App::setLocale($locale);
        Session::put('locale', $locale);
        LaravelLocalization::setLocale($locale);
        $url = LaravelLocalization::getLocalizedURL(App::getLocale(), URL::previous());
        return Redirect::to($url);
    }
}
