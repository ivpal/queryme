<?php

namespace App\Services\SocialAccount\Info;

use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;

use App\Clients\Social;

/**
 * Class Fetcher
 * @package App\Services\SocialAccount\Info
 */
abstract class Fetcher
{
    /** @var  Social */
    protected $client;

    public abstract function getBannerUrl(): string;
    public abstract function getAvatarUrl(): string;

    /**
     * @return string
     */
    public function loadBanner(): string
    {
        $bannerUrl = $this->getBannerUrl();
        return $this->loadImage('banner', $bannerUrl);
    }

    /**
     * @return string
     */
    public function loadAvatar(): string
    {
        $bannerUrl = $this->getAvatarUrl();
        return $this->loadImage('avatar', $bannerUrl);
    }

    /**
     * @param string $type
     * @param string $url
     * @return string
     */
    private function loadImage(string $type, string $url): string
    {
        $fileName = Uuid::generate(4);
        $content = file_get_contents($url);
        Storage::disk('public')->put("{$type}s/" . $fileName . '.jpg', $content);
        return $fileName;
    }
}