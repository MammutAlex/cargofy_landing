<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'country_id' => ['required'],
            'phone' => ['required'],
            'email' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
