<?php

declare(strict_types=1);

namespace Core\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use Core\Services\Token\Token;

use ApiV1\Models\User;

/**
 * Class HomeController
 * @package Core\Http\Controllers
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
            ];
            View::share('user', $userData);
        }

        return view('home');
    }
}