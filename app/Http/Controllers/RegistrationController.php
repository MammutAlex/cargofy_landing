<?php

namespace App\Http\Controllers;

use App\AppLocale;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class RegistrationController extends Controller
{
    public function __invoke(RegistrationRequest $request)
    {
        $response = Http::baseUrl(config('services.cargohub.url'))->post('sms_link', [
            'country_id' => $request->input('country_id'),
            'phone' => $request->input('phone'),
        ]);
        if ($response->status() === 422) {
            throw ValidationException::withMessages([
                'phone' => [__('Invalid phone')],
            ]);
        }
        return Inertia::location(config('services.cargohub.app_web') . '/auth?' . Arr::query([
                'phone' => $request->input('phone'),
                'lang' => App::getLocale(),
                'country_id' => AppLocale::country(),
            ]));
    }
}
