<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StorePortfolioRequest extends FormRequest
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
            'title' => ['string', 'max:255', 'required'],
            'tags'   => ['string', 'nullable', 'max:255'],
            'description' => ['string', 'required'],
            'images' => ['array', 'required'],
            'images.*' => ['image','mimes:jpeg,jpg,png,webp,svg', 'max:2048']
        ];
    }
}
