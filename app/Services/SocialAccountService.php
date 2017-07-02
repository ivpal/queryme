<?php

namespace App\Services;

use Laravel\Socialite\Facades\Socialite;

use App\Models\User;

/**
 * Class SocialAccountService
 * @package App\Services
 */
class SocialAccountService
{
    /**
     * @param string $provider
     * @return User
     */
    public function getOrCreate(string $provider): User
    {
        /** @var User $providerUser */
        $providerUser = Socialite::driver($provider)->user();
        $user = User::where("{$provider}_id", $providerUser->getId())->first();

        if ($user) {
            return $user;
        } else {
            $username = $providerUser->getNickname() ?: $providerUser->getId();
            $user = User::create([
                'username'       => $username,
                "{$provider}_id" => $providerUser->getId(),
            ]);
        }

        return $user;
    }
}