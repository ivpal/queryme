<?php

declare(strict_types=1);

namespace ApiV1\Users\Controllers;

use Illuminate\Http\Request;

use ApiV1\Models\{
    User,
    Follower
};
use Core\Http\Controllers\ApiController;

// TODO: right responses and status codes
// TODO: handle errors

/**
 * Class FollowersController
 * @package ApiV1\Users\Controllers
 */
class FollowersController extends ApiController
{
    /**
     * FollowersController constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index(Request $request, $nickname)
    {
        $user = User::getByNickname($nickname);
        return $user->followers;
    }

    public function store(Request $request, $nickname)
    {
        $user = User::getByNickname($nickname);

        if ($this->currentUser->canFollow($user)) {
            Follower::create([
                'follower_id'  => $this->currentUser->id,
                'following_id' => $user->id,
            ]);
        }
    }

    public function destroy(Request $request, $nickname)
    {
        $user = User::getByNickname($nickname);

        if ($this->currentUser->isFollowing($user)) {
            Follower::where([
                'follower_id' => $this->currentUser->id,
                'following_id' => $user->id,
            ])->delete();
        }
    }

    public function following(Request $request, $nickname)
    {
        $user = User::where('nickname', $nickname)->with('following')->firstOrFail();
        return $user->following;
    }
}