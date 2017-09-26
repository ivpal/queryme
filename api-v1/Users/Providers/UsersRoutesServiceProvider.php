<?php

declare(strict_types=1);

namespace ApiV1\Users\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

use ApiV1\Models\User;

/**
 * Class UsersRoutesServiceProvider
 * @package ApiV1\Users\Providers
 */
class UsersRoutesServiceProvider extends RouteServiceProvider
{
    private $path;

    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'ApiV1\Users\Controllers';

    public function boot()
    {
        $this->path = base_path()
            . DIRECTORY_SEPARATOR
            . implode(DIRECTORY_SEPARATOR, ['api-v1', 'Users', 'routes.php']);

        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api/v1')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group($this->path);
    }
}