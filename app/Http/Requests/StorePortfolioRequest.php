<?php

namespace App\Http\Requests;

use Illuminate\Http\UploadedFile;
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
        $rules = [
            'title' => ['string', 'max:255', 'required'],
            'slug' => ['string', 'nullable'],
            'tags' => ['string', 'nullable', 'max:255'],
            'description' => ['string', 'required'],
            'github_link' => ['nullable', 'url'],
            'images' => ['array', 'required'],
        ];

        // Check if 'images' is an array
        if (is_array($this->input('images'))) {
            foreach ($this->input('images') as $index => $image) {
                // Check if the current image is an UploadedFile instance
                if ($image instanceof UploadedFile) {
                    // If an UploadedFile instance, apply image validation rules
                    $rules["images.$index"] = ['image', 'mimes:jpeg,jpg,png,webp,svg', 'max:2048'];
                } else {
                    // If not an UploadedFile instance, it might be an existing image
                    $rules["images.$index.id"] = ['required', 'exists:medias,id'];
                }
            }
        }

        return $rules;
    }
}
