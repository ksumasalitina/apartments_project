<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DateRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $val = new \DateTime($value);
        $difference = $val->diff(new \DateTime("now"));
        return  $difference->y >= 18;
    }
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You must be at least 18 years old to register';
    }
}
