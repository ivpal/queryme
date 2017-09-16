<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

/**
 * Class UsersController
 * @package App\Http\Controllers\Api\V1
 */
class UsersController extends Controller
{
    public function show(string $nickname)
    {
        return $nickname;
    }
}