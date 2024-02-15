<?php

namespace Modules\Land\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LandTypeRequest extends FormRequest
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
        // return auth()->user()->can('users.create');
    }
}
