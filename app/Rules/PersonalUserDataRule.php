<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PersonalUserDataRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        array_filter($value,function($item) use ($fail){
            if(isset($item['names'],$item['phone'],$item['email']) === false){
               return $fail('Hace falta información de las referencias personales');
            }
        });
    }

}
