<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\Controller;
use App\Services\SocialAccountService;

/**
 * Class SocialController
 * @package App\Http\Controllers\Auth
 */
class SocialController extends Controller
{
    /**
     * @param $provider
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * @param SocialAccountService $service
     * @param $provider
     * @return Response
     */
    public function handleProviderCallback(SocialAccountService $service, $provider)
    {
        $user = $service->getOrCreate($provider);
        Auth::login($user);
        return redirect('/');
    }
}