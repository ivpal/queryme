<?php

declare(strict_types=1);

namespace ApiV1\Users\Controllers;

use Illuminate\Http\Request;

use ApiV1\Repositories\UserRepository;
use Core\Http\Controllers\ApiController;

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

    public function show(Request $request, UserRepository $repository, string $nickname)
    {
        $user = $repository->getByNickname($nickname)->withCount(['followers', 'following'])->first();

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