<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Services\Token\Token;

use App\Models\User;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Show the application home page.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        /** @var Token $token */
        $token = $request->session()->get('token');
        if ($token) {
            $params = $token->asArray();
            View::share('token', $params);
        }

        /** @var User $user */
        $user = $request->session()->get('user');
        if ($user) {
            $userData = [
                'avatar'   => $user->getAvatarUrl(),
                'nickname' => $user->nickname,
                'username' => $user->username,
            ];
            View::share('user', $userData);
        }

        return view('home');
    }
}