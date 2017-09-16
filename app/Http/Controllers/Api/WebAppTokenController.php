<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Laravel\Passport\PersonalAccessTokenFactory;

use App\Models\User;
use App\Http\Controllers\Controller;

/**
 * Class WebAppTokenController
 * @package App\Http\Controllers\Api
 */
class WebAppTokenController extends Controller
{
    public function create(PersonalAccessTokenFactory $factory)
    {
        $webApp = User::where('nickname', 'webapp')->first();
        $result = $factory->make($webApp->id, 'webapp-token');

        /** @var Carbon $expiresAt */
        $expiresAt = $result->token->expires_at;
        $expiresIn = $expiresAt->timestamp - (new \DateTime())->getTimestamp();

        return [
            'token_type'   => 'Bearer',
            'expires_in'   => $expiresIn,
            'access_token' => $result->accessToken,
        ];
    }
}