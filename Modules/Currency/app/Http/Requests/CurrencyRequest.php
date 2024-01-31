<?php

namespace Modules\Currency\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1048',
            'name' => 'required|string|min:3',
            'code' => 'required|string|size:3',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        // return auth()->user()->can('users.create');
    }
}
