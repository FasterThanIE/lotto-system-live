<?php

namespace App\Rules\User;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class EmailNotTaken implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // $attribute = email
        // $value = tomislavnikolic1993@gmail.com
        // Proverti da li ovaj email vec postoji u tabeli korisnici, a da nije moj
        $user = User::where(['email' => $value])->first();

        if($user instanceof User) // $user = null, $user = Object(User)
        {
            if($user->id != Auth::user()->id)
            {
                $fail("This email is already taken");
            }
        }

    }
}
