<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Jenssegers\Agent\Facades\Agent;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class IpLocaleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!(Session::has('locale') || Agent::isRobot())) {
            $location = geoip()->getLocation(geoip()->getClientIP());
            $locale = collect(LaravelLocalization::getSupportedLocales())->first(fn($locale) => $locale['country_id'] == Str::lower($location->iso_code));
            if ($locale) {
                $url = LaravelLocalization::getLocalizedURL($locale['code']);
                if ($url != $request->fullUrl()) {
                    return Redirect::to($url);
                }
            }
        }

        return $next($request);
    }
}
