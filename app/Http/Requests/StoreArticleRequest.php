<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->roles()->first()->name === 'administrator';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'unique:posts'],
            'content' => ['required', 'string', 'unique:posts'],
            'tags' => ['nullable', 'string'],
            'categories' => ['required', 'string'],
            'sub_categories' => ['nullable', 'string'],
            'images' => ['required', 'array'],
            'images.*' => ['image','mimes:jpeg,jpg,png,webp,svg', 'max:2048']
        ];
    }
}
