<?php

namespace App\Clients;

use GuzzleHttp\Client;

/**
 * Class Facebook
 * @package App\Clients
 */
class Facebook implements Social
{
    /**
     * @var string
     */
    private $accessToken;

    /**
     * @var string
     */
    private $userId;

    /**
     * The base Facebook Graph URL.
     *
     * @var string
     */
    private $graphUrl = 'https://graph.facebook.com';

    /**
     * The Graph API version for the request.
     *
     * @var string
     */
    private $version = 'v2.9';

    /**
     * @var Client
     */
    private $client;

    /**
     * Facebook constructor.
     *
     * @param $accessToken
     * @param $userId
     */
    public function __construct($accessToken, $userId)
    {
        $this->accessToken = $accessToken;
        $this->userId = $userId;
        $this->client = new Client(['base_uri' => "{$this->graphUrl}/{$this->version}"]);
    }

    /**
     * Get cover image url.
     *
     * @return string
     */
    public function getCoverImageUrl(): string
    {
        $response = $this->client->request('GET', 'me', [
            'query' => [
                'fields'       => 'id,cover',
                'access_token' => $this->accessToken,
            ]
        ]);

        $responseData = json_decode($response->getBody()->getContents(), true);
        return $responseData['cover']['source'];
    }

    /**
     * Get avatar image url with large format.
     *
     * @return string
     */
    public function getLargeAvatarUrl(): string
    {
        return "{$this->graphUrl}/{$this->version}/{$this->userId}/picture?type=large";
    }
}