<?php

namespace App\Rules;

use Blaspsoft\Blasp\Facades\Blasp;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NoProfanity implements ValidationRule
{

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$value) {
            return;
        }
        $pattern = "/
    (
        [fph]+[^a-zA-Z0-9]{0,3}([\*\@u]{0,1})[^a-zA-Z0-9]{0,3}[ck]+[^a-zA-Z0-9]{0,3}[kc]+ |
        [s\$]+[^a-zA-Z0-9]{0,3}[h]+[^a-zA-Z0-9]{0,3}[\*\@i1!]+[^a-zA-Z0-9]{0,3}[t7]+ |
        [d]+[^a-zA-Z0-9]{0,3}[a@]+[^a-zA-Z0-9]{0,3}[m]+[^a-zA-Z0-9]{0,3}[n]+ |
        [b8]+[^a-zA-Z0-9]{0,3}[i1!]+[^a-zA-Z0-9]{0,3}[t7]+[^a-zA-Z0-9]{0,3}[c]+[^a-zA-Z0-9]{0,3}[h]+ |
        [a@]+[^a-zA-Z0-9]{0,3}[s\$]+[^a-zA-Z0-9]{0,3}[s\$]+ |
        [b8]+[^a-zA-Z0-9]{0,3}[a@]+[^a-zA-Z0-9]{0,3}[s\$]+[^a-zA-Z0-9]{0,3}[t7]+[^a-zA-Z0-9]{0,3}[a@]+[^a-zA-Z0-9]{0,3}[r]+[^a-zA-Z0-9]{0,3}[d]+
    )
    /ix";
        if (Blasp::check($value)->hasProfanity() || preg_match($pattern, $value)) {
            $fail("Your {$attribute} contains profanity, this is against our policies. Please refer to the rules of our platform in our About section.");
        }
    }
}
