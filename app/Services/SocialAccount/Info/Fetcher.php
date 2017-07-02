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
        $fileName = Uuid::generate(4);
        $content = file_get_contents($bannerUrl);
        Storage::disk('public')->put('banners/' . $fileName . '.jpg', $content);
        return $fileName;
    }

    /**
     * @return string
     */
    public function loadAvatar(): string
    {
        return '';
    }
}