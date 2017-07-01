<?php

namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;

use App\Models\User;

class FacebookAccountService
{
    public function getOrCreate(ProviderUser $providerUser)
    {
        $user = User::where('facebook_id', $providerUser->getId())->first();

        if ($user) {
            return $user;
        } else {
            $username = $providerUser->getNickname() ?: $providerUser->getId();
            $user = User::create([
                'username'    => $username,
                'facebook_id' => $providerUser->getId(),
            ]);
        }

        return $user;
    }
}