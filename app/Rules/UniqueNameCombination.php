<?php

namespace App\Rules;

use Closure;
use App\Models\Member;
use Illuminate\Contracts\Validation\Rule;

class UniqueNameCombination implements Rule
{
    public function passes($attribute, $value)
    {
        [$firstName, $lastName] = $value;

        $user = Member::where('first_name', $firstName)
            ->where('last_name', $lastName)
            ->first();

        return !$user;
    }

    public function message()
    {
        return 'The combination of first name and last name is already in use.';
    }
}
