<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $request = request();

        //this stores generates the path to the stored uploaded image. profile_pictures is the folder where the file is stored. check file in storage/app/profile_pictures
        $profile_picture_path = $request->profile_picture->store('profile_pictures');

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'role' => 'User', //First Admin user to be created manually. If necessary, a admin controller to create users (other admins as well) can be created
            'password' => Hash::make($input['password']),
            'profile_picture' => $profile_picture_path
        ]);
    }
}
