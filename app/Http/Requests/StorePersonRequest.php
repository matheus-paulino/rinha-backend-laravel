<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'surname' => ['required', 'string', 'max:32', 'unique:people'],
            'name' => ['required', 'string', 'max:100'],
            'birth_date' => ['required', 'date_format:Y-m-d'],
            'stack' => ['nullable', 'array'],
            'stack.*' => ['required', 'string', 'max:32']
        ];
    }
}
