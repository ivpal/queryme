<?php

namespace App\Services\Token;

/**
 * Class JsonView
 * @package App\Services\Token
 */
class Token
{
    /** @var string */
    private $tokenType;

    /** @var int */
    private $expiresIn;

    /** @var string */
    private $accessToken;

    /**
     * JsonView constructor.
     * @param string $tokenType
     * @param int $expiresIn
     * @param string $accessToken
     */
    public function __construct($tokenType, $expiresIn, $accessToken)
    {
        $this->tokenType = $tokenType;
        $this->expiresIn = $expiresIn;
        $this->accessToken = $accessToken;
    }

    /**
     * @return string
     */
    public function getTokenType(): string
    {
        return $this->tokenType;
    }

    /**
     * @param string $tokenType
     */
    public function setTokenType(string $tokenType)
    {
        $this->tokenType = $tokenType;
    }

    /**
     * @return int
     */
    public function getExpiresIn(): int
    {
        return $this->expiresIn;
    }

    /**
     * @param int $expiresIn
     */
    public function setExpiresIn(int $expiresIn)
    {
        $this->expiresIn = $expiresIn;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return array
     */
    public function asArray()
    {
        return [
            'token_type'   => $this->tokenType,
            'expires_in'   => $this->expiresIn,
            'access_token' => $this->accessToken,
        ];
    }
}