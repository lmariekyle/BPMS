<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StartsWith09 implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the value starts with "09"
        return substr($value, 0, 2) === '09';
    }

    public function message()
    {
        return 'The :attribute must start with "09".';
    }
}
