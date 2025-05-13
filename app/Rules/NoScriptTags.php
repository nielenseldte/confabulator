<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoScriptTags implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (strpos($value, "<script>") !== false || strpos($value, "</script>") !== false) {
            $fail("You have attempted to embed malicious text in your {$attribute}. Please note that any <script> tags will be seen as an attempt to exploit the system.");
        }
    }
}
