<?php

namespace Modules\Property\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'slides'=> 'nullable|array',
            'title' => 'required|string|min:4',
            'slug' => 'sometimes|string|min:4|unique:pages,slug',
            'description' => 'required|string|min:10',
            'content' => 'required|min:25',
            'keywords' => 'required',
            'country_id' => 'required|numeric',
            'state_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'category' => 'required',
            'price' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
