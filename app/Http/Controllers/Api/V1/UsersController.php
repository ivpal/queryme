<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Controllers\ApiController;
use App\Exceptions\UserNotFoundException;

/**
 * Class UsersController
 * @package ApiV1\Controllers
 */
class UsersController extends ApiController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function show(Request $request, string $nickname)
    {
        /** @var User $user */
        $user = User::whereNickname($nickname)->withCount(['followers', 'following'])->first();
        if (!$user) {
            throw new UserNotFoundException();
        }

        return [
            'avatar' => $user->getAvatarUrl(),
            'banner' => $user->getBannerUrl(),
            'description' => $user->description,
            'username' => $user->username,
            'can_follow' => $this->currentUser->canFollow($user),
            'following' => $this->currentUser->isFollowing($user),
            'following_count' => $user->following_count,
            'followers_count' => $user->followers_count,
            'reply_count' => 0,
            'likes_count' => 0,
            'questions_count' => 0,
        ];
    }
}