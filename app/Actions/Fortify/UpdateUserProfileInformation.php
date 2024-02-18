<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'], 
            'programme_id' => ['required', 'integer'],
            'date_naissance' => ['required', 'date'],
            'sex' => ['required', 'booleen', 'max:1'],
            'poids' => ['required', 'integer'],
            'taille' => ['required', 'integer'],
            'telephone' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ])->validateWithBag('updateProfileInformation');

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'prenom' => $input['prenom'],
                'programme_id' => $input['programme_id'],
                'date_naissance' => $input['date_naissance'],
                'sex' => $input['sex'],
                'poids' => $input['poids'],
                'taille' => $input['taille'],
                'telephone' => $input['telephone'],
                'adresse' => $input['adresse'],

            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'prenom' => $input['prenom'],
            'name' => $input['name'],
            'email' => $input['email'],
            'programme_id' => $input['programme_id'],
            'date_naissance' => $input['date_naissance'],
            'sex' => $input['sex'],
            'poids' => $input['poids'],
            'taille' => $input['taille'],
            'telephone' => $input['telephone'],
            'adresse' => $input['adresse'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
