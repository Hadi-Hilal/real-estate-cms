<?php

namespace Modules\Page\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'title' => 'required|string|min:4',
            'slug' => 'sometimes|string|min:4|unique:pages,slug',
            'description' => 'required|string|min:10',
            'content' => 'required|min:25',
            'keywords' => 'required',
            'type' => 'required',
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
