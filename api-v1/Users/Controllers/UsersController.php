<?php

declare(strict_types=1);

namespace ApiV1\Users\Controllers;

use ApiV1\Repositories\UserRepository;
use ApiV1\Users\Exceptions\UserNotFoundException;
use Illuminate\Http\Request;

use Core\Http\Controllers\ApiController;

use ApiV1\Models\User;

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
//        $user = User::where('nickname', $nickname)->withCount(['followers', 'following'])->first();
//        if (!$user) {
//            throw new UserNotFoundException();
//        }

        $user = $repository->getByNickname($nickname);

        return [
            'avatar' => $user->getAvatarUrl(),
            'banner' => $user->getBannerUrl(),
            'description' => $user->description,
            'username' => $user->username,
            'can_follow' => $this->currentUser->canFollow($user),
            'following' => $this->currentUser->isFollowing($user),
            'following_count' => $user->following_count,
            'followers_count' => $user->followers_count,
        ];
    }
}