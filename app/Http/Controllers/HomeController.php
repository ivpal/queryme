<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $user = Socialite::driver('facebook')->user();
//        $token = $user->token;
//        $refreshToken = $user->refreshToken; // not always provided
//        $expiresIn = $user->expiresIn;
//
//        return [
//            'token' => $token,
//            'refreshToken' => $refreshToken,
//            'expiresIn' => $expiresIn,
//        ];

        return view('home');
    }
}
