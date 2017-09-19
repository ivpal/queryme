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
     * @return null|string
     */
    public function loadBanner(): ?string
    {
        $bannerUrl = $this->getBannerUrl();
        return $bannerUrl ? $this->loadImage('banner', $bannerUrl) : null;
    }

    /**
     * @return null|string
     */
    public function loadAvatar(): ?string
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
        $fileName = Uuid::generate(4) . '.jpg';
        $content = file_get_contents($url); // TODO: check content
        Storage::disk('public')->put("{$type}s/" . $fileName, $content);
        return $fileName;
    }
}