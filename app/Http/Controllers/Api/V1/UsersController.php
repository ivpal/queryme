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

    public function show(string $nickname)
    {
        /** @var User $user */
        $user = User::whereNickname($nickname)
            ->withCount(['followers', 'following', 'questions', 'replies'])
            ->first();

        if (!$user) {
            throw new UserNotFoundException();
        }

        return [
            'avatar'          => $user->getAvatarUrl(),
            'banner'          => $user->getBannerUrl(),
            'username'        => $user->username,
            'following'       => $this->currentUser->isFollowing($user),
            'can_follow'      => $this->currentUser->canFollow($user),
            'likes_count'     => 0,
            'description'     => $user->description,
            'replies_count'   => $user->replies_count,
            'following_count' => $user->following_count,
            'followers_count' => $user->followers_count,
            'questions_count' => $user->questions_count,
        ];
    }
}