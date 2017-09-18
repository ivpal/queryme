<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Response;
use Laravel\Socialite\Facades\Socialite;

use App\Services\Token\TokenFactory;
use App\Http\Controllers\Controller;
use App\Services\SocialAccount\UserService;

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
     * @param UserService $service
     * @param TokenFactory $factory
     * @param $provider
     * @return Response
     */
    public function handleProviderCallback(UserService $service, TokenFactory $factory,  $provider)
    {
        $user = $service->getOrCreate($provider);
        $token = $factory->createForUserAttribute('nickname', $user->nickname, ['use']);
        return redirect('/')->with('token', $token);
    }
}