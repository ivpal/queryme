<?php

declare(strict_types=1);

namespace ApiV1\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use ApiV1\Models\User;
use ApiV1\Users\Exceptions\UserNotFoundException;

use Core\Repositories\Repository;

/**
 * Class UserRepository
 * @package ApiV1\Repositories
 */
class UserRepository extends Repository
{
    public function getByNickname(string $nickname): UserRepository
    {
        $this->query = $this->createQueryBuilder()
            ->whereNickname($nickname);

        return $this;
    }

    /**
     * @return User
     * @throws UserNotFoundException
     */
    public function first(): User
    {
        /** @var User $user */
        $user = $this->query->first();

        if (!$user) {
            throw new $this->notFoundException;
        }

        return $user;
    }

    public function withCount(array $relations): UserRepository
    {
        $this->query->withCount($relations);
        return $this;
    }

    protected function getModel(): Model
    {
        return new User();
    }

    protected function getNotFoundException(): ModelNotFoundException
    {
        return new UserNotFoundException();
    }
}