<?php

declare(strict_types=1);

namespace Core\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class Repository
 * @package Core\Repositories
 */
abstract class Repository
{
    /** @var Model */
    protected $model;

    /** @var ModelNotFoundException */
    protected $notFoundException;

    /**
     * Repository constructor.
     */
    public function __construct()
    {
        $this->model = $this->getModel();
        $this->notFoundException = $this->getNotFoundException();
    }

    protected function createQueryBuilder()
    {
        return $this->getModel()->newQuery();
    }

    abstract protected function getModel(): Model;

    abstract protected function getNotFoundException(): ModelNotFoundException;
}