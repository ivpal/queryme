<?php

namespace App\Services;

use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Contracts\User as ProviderUser;

use App\Models\User;
use App\Services\SocialAccount\Info\FetcherFactory;

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
        /** @var ProviderUser $providerUser */
        $providerUser = Socialite::driver($provider)->user();
        $user = User::where("{$provider}_id", $providerUser->getId())->first();

        if ($user) {
            return $user;
        } else {
            $username = $providerUser->getNickname() ?: $providerUser->getId();

            $fetcher = FetcherFactory::create($provider, $providerUser);
            $banner = $fetcher->loadBanner();
            $avatar = $fetcher->loadAvatar();

            $user = User::create([
                'avatar'         => $avatar,
                'banner'         => $banner,
                'username'       => $username,
                "{$provider}_id" => $providerUser->getId(),
            ]);
        }

        return $user;
    }
}