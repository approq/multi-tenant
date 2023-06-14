<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidInstagramHandle implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $message = 'The :attribute is not a valid Instagram handle.';

        // Check the format of the Instagram handle
        if (!preg_match('/^[a-z][a-z0-9_\.]{0,29}$/i', $value)) {
            $fail($message);
        }

        if (\Http::get("https://www.instagram.com/{$value}")->status() != 200) {
            $fail($message);
        }
    }
}
