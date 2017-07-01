<?php

namespace App\Http\Controllers\Auth;

use Laravel\Socialite\{
    Contracts\User,
    Facades\Socialite
};

use App\Services\FacebookAccountService;

/**
 * Class FacebookLoginController
 * @package App\Http\Controllers\Auth
 */
class FacebookLoginController
{
    /**
     * @return mixed
     */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * @param FacebookAccountService $service
     * @return User
     */
    public function callback(FacebookAccountService $service)
    {
        /** @var User $providerUser */
        $providerUser = Socialite::driver('facebook')->user();
        return $service->getOrCreate($providerUser);
    }
}