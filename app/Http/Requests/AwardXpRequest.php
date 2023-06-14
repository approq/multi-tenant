<?php

namespace App\Http\Requests;

use App\Enums\Pronoun;
use App\Rules\ValidInstagramHandle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AwardXpRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'tenant_id' => ['required', 'exists:tenants,id'],
            'xp' => ['required', 'numeric', 'min:1'],
        ];
    }
}
