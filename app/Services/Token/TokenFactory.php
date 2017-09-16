<?php

namespace App\Services\Token;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Models\User;

/**
 * Class TokenFactory
 * @package App\Services\Token
 */
class TokenFactory
{
    /**
     * @param string $attribute
     * @param string $value
     * @param array $scopes
     * @throws ModelNotFoundException
     * @return Token
     */
    public function createForUserAttribute(string $attribute, string $value, array $scopes = []): Token
    {
        $user = User::where($attribute, $value)->firstOrFail();
        $result = $user->createToken($value, $scopes);

        /** @var Carbon $expiresAt */
        $expiresAt = $result->token->expires_at;
        $expiresIn = $expiresAt->timestamp - (new \DateTime())->getTimestamp();

        return new Token('Bearer', $expiresIn, $result->accessToken);
    }
}