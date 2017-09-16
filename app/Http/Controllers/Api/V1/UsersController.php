<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

/**
 * Class UsersController
 * @package App\Http\Controllers\Api\V1
 */
class UsersController extends Controller
{
    public function show(Request $request, string $nickname)
    {
        return $nickname;
    }
}