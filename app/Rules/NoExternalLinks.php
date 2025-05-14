<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoExternalLinks implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (strpos($value, 'http') !== false || strpos($value, 'https') !== false) {
            $fail('We do not allow the sharing of links to external websites on Confabulator');
        }
    }
}
