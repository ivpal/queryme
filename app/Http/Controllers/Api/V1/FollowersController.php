<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Models\{
    User,
    Follower
};
use App\Http\Controllers\ApiController;

// TODO: right responses and status codes
// TODO: handle errors
// TODO: follow exceptions

/**
 * Class FollowersController
 * @package ApiV1\Users\Controllers
 */
class FollowersController extends ApiController
{
    /** @var UserRepository */
    private $repository;

    /**
     * FollowersController constructor.
     *
     * @param Request $request
     * @param UserRepository $repository
     */
    public function __construct(Request $request, UserRepository $repository)
    {
        parent::__construct($request);
        $this->repository = $repository;
    }

    public function index(Request $request, $nickname)
    {
        $user = $this->repository->getByNickname($nickname)->with(['followers'])->first();
        return $user->followers;
    }

    public function store(Request $request, $nickname)
    {
        $user = $this->repository->getByNickname($nickname)->first();

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