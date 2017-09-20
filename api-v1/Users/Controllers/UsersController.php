<?php

declare(strict_types=1);

namespace ApiV1\Users\Controllers;

use Illuminate\Http\Request;

use ApiV1\Models\User;
use App\Http\Controllers\Controller;

/**
 * Class UsersController
 * @package ApiV1\Controllers
 */
class UsersController extends Controller
{
    public function show(Request $request, $nickname)
    {
        /** @var User $user */
        $user = User::where('nickname', $nickname)->firstOrFail();
        return [
            'avatar' => $user->getAvatarUrl(),
            'banner' => $user->getBannerUrl(),
        ];
    }
}