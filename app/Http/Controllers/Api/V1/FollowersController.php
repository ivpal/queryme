<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Models\{
    User,
    Follower
};
use App\Exceptions\FollowException;
use App\Http\Controllers\ApiController;
use App\Exceptions\UserNotFoundException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class FollowersController
 * @package App\Http\Controllers\Api\V1
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
        $user = User::whereNickname($nickname)->with('followers')->first();
        if (!$user) {
            throw new UserNotFoundException();
        }

        return $user->followers;
    }

    public function store(Request $request, $nickname)
    {
        $user = User::whereNickname($nickname)->first();
        if (!$user) {
            throw new UserNotFoundException();
        }

        if ($this->currentUser->canFollow($user)) {
            Follower::create([
                'follower_id'  => $this->currentUser->id,
                'following_id' => $user->id,
            ]);

            return response('', Response::HTTP_CREATED);
        }

        throw new FollowException('You could not follow this user.');
    }

    public function destroy(Request $request, $nickname)
    {
        $user = User::whereNickname($nickname)->first();
        if (!$user) {
            throw new UserNotFoundException();
        }

        if ($this->currentUser->isFollowing($user)) {
            Follower::where([
                'follower_id' => $this->currentUser->id,
                'following_id' => $user->id,
            ])->delete();

            return response();
        }

        throw new FollowException('You could not delete following for this user.');
    }

    public function following(Request $request, $nickname)
    {
        $user = User::whereNickname($nickname)->with('following')->first();
        if (!$user) {
            throw new UserNotFoundException();
        }

        return $user->following;
    }
}