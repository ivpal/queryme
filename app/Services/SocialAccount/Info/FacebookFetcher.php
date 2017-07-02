<?php

namespace App\Services\SocialAccount\Info;

use App\Clients\Facebook;
use Laravel\Socialite\Contracts\User;

/**
 * Class FacebookFetcher
 * @package App\Services\SocialAccount\Info
 */
class FacebookFetcher extends Fetcher
{
    /**
     * FacebookFetcher constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->client = new Facebook($user->token, $user->getId());
    }

    /**
     * @return string
     */
    public function getBannerUrl(): string
    {
        return $this->client->getCoverImageUrl();
    }

    /**
     * @return string
     */
    public function getAvatarUrl(): string
    {
        return '';
    }
}