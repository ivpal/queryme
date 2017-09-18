<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Services\Token\Token;

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
        $params = [];
        if ($token) {
            $params = $token->asArray();
        }

        View::share('token', $params);

        return view('home');
    }

    /**
     * Show the application discover page.
     *
     * @return \Illuminate\Http\Response
     */
    public function discover()
    {
    }
}