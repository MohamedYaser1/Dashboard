<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3 | unique:posts',
            'details' => 'required|max:254',
            'img' => 'mimes:png,jpg,jpeg',
            'select_category' => 'required|not_in:0',
            'select_country' => 'required',
            'select_city' => 'required',
            'posted_by' => 'required',
            'active' => 'required'
        ];
    }
}