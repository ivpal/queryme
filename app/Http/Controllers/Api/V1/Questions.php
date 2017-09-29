<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Controllers\ApiController;

/**
 * Class Questions
 * @package App\Http\Controllers\Api\V1
 */
class Questions extends ApiController
{
    /**
     * Questions constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function indexForUser(string $nickname)
    {
    }
}