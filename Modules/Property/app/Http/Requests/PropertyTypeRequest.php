<?php

namespace Modules\Property\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyTypeRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
