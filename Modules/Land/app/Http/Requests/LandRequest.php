<?php

namespace Modules\Land\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LandRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'slides' => 'nullable|array',
            '3d' => 'nullable',
            'title' => 'required|string|min:4',
            'slug' => 'sometimes|string|min:4|unique:pages,slug',
            'description' => 'required|string|min:10',
            'content' => 'required|min:25',
            'keywords' => 'required',
            'country_id' => 'required|numeric',
            'state_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'district_id' => 'nullable|numeric',
            'land_type_id' => 'required|numeric',
            'tapu' => 'required|string',
            'price' => 'required|between:0,99.99',
            'regulation' => 'required',
            'ratio' => 'required|numeric|min:1|max:99',
            'space' => 'required|between:0,99.99',
            'net_space' => 'required|between:0,99.99',
            'deduction' => 'required|numeric|min:1|max:99',

        ];
    }

    public function authorize(): bool
    {
        return true;
        // return auth()->user()->can('users.create');
    }
}
