<?php

namespace Modules\Blog\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'title' => 'required|string|min:4',
            'slug' => 'sometimes|string|min:4|unique:blog_posts,slug',
            'description' => 'required|string|min:10',
            'content' => 'required|min:25',
            'keywords' => 'required',
            'country_id' => 'required',
            'category_id' => 'required|exists:blog_categories,id',
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
