<?php

namespace Core\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use Core\Services\Token\Token;

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
        $params = [];
        if ($token) {
            $params = $token->asArray();
        }

        View::share('token', $params);

        return view('home');
    }
}