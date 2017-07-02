<?php

namespace App\Services\SocialAccount\Info;

use Laravel\Socialite\Contracts\User;

/**
 * Class FetcherFactory
 * @package App\Services\SocialAccount\Info
 */
class FetcherFactory
{
    /**
     * @param string $provider
     * @param User $user
     * @return Fetcher
     */
    public static function create(string $provider, User $user): Fetcher
    {
        $className = __NAMESPACE__ . '\\' . ucfirst($provider) . 'Fetcher';
        return new $className($user);
    }
}