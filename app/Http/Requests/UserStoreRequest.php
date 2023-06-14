<?php

namespace App\Http\Requests;

use App\Enums\Pronoun;
use App\Rules\ValidInstagramHandle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'pronoun' => ['required', Rule::enum(Pronoun::class)],
            'instagram_handle' => ['required', 'string', 'max:255', 'unique:users', new ValidInstagramHandle()],
            'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
    }
}
