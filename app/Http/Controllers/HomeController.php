<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $token = $request->session()->get('token');
        return view('home', [
            'token' => $token
        ]);
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
