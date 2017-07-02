<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exceptions\UserNotFoundException;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Show user profile.
     *
     * @param $username
     */
    public function show($username)
    {
        $user = User::where('username', $username)->first();
        if (!$user) {
            throw new UserNotFoundException();
        }
    }
}