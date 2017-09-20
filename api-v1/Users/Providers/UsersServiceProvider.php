<?php

declare(strict_types=1);

namespace ApiV1\Users\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class UsersServiceProvider
 * @package ApiV1\Users\Providers
 */
class UsersServiceProvider extends ServiceProvider
{
    public function boot()
    {
        app()->register(UsersRoutesServiceProvider::class);
    }
}