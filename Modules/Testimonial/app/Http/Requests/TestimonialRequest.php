<?php

namespace Modules\Testimonial\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'name' => 'required|string|min:3',
            'position' => 'required|string|min:3',
            'comment' => 'required|string|min:10',
            'country_id' => 'required',
            'link' => 'nullable|url',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
