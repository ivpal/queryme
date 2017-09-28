<?php

declare(strict_types=1);

namespace ApiV1\Repositories;

use ApiV1\Models\User;
use ApiV1\Users\Exceptions\UserNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Core\Repositories\Repository;

/**
 * Class UserRepository
 * @package ApiV1\Repositories
 */
class UserRepository extends Repository
{
    public function getByNickname(string $nickname): User
    {
        $user = $this->createQueryBuilder()
            ->whereNickname($nickname)
            ->first();

        if (!$user) {
            throw new $this->notFoundException;
        }
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