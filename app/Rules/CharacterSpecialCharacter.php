<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CharacterSpecialCharacter implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! preg_match('/[^a-zA-Z0-9]/', $value)) {
            $fail("The {$attribute} must contain at least one special character.", null);
        }
    }
}
