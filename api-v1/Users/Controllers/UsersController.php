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
        $user = User::where('nickname', $nickname)->withCount(['followers', 'following'])->firstOrFail();

        return [
            'avatar' => $user->getAvatarUrl(),
            'banner' => $user->getBannerUrl(),
            'description' => $user->description,
            'username' => $user->username,
            'can_follow' => true,
            'following' => false,
            'following_count' => $user->following_count,
            'followers_count' => $user->followers_count,
        ];
    }

    public function followers(Request $request, $nickname)
    {
        $user = User::where('nickname', $nickname)->with('followers')->firstOrFail();
        return $user->followers;
    }

    public function following(Request $request, $nickname)
    {
        $user = User::where('nickname', $nickname)->with('following')->firstOrFail();
        return $user->following;
    }
}