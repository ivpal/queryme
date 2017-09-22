<?php

declare(strict_types=1);

namespace ApiV1\Users\Controllers;

use Illuminate\Http\Request;

use Core\Http\Controllers\Controller;

use ApiV1\Models\User;

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
            'description' => $user->description,
            'can_follow' => true,
            'following_count' => 100,
            'followers_count' => 200,
        ];
    }
}