<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Controllers\ApiController;

/**
 * Class RepliesController
 * @package App\Http\Controllers\Api\V1
 */
class RepliesController extends ApiController
{
    /**
     * RepliesController constructor.
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