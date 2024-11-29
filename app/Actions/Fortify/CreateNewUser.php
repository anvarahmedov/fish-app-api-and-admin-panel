<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        $allowedPrefixes = [
    '93', '94', '95', '97', '98', '90', '91', '98', '95', '99', '97', '33'
    ];
        $prefixPattern = implode('|', $allowedPrefixes);
        $regex = "/^($prefixPattern)/";
        Validator::make($input, [
            'fullname' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'address' => ['string', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'phone_number' => ['required', 'string', 'max:9', 'min:9', 'regex:' . $regex],
        ], [
            'phone_number.regex' => 'The phone number must start with one of the allowed prefixes: ' . implode(', ', $allowedPrefixes)
        ])->validate();

        return User::create([
            'fullname' => $input['fullname'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phone_number' => $input['phone_number'],
            'address' => $input['address'],
        ]);
    }
}
