<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocaleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $iso = explode('-', str_replace('_', '-', App::getLocale()));
        if (count($iso) == 2) {
            App::setLocale($iso[0]);
        }
        return $next($request);
    }
}
