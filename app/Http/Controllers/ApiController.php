<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

/**
 * Class ApiController
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{
    /** @var User */
    protected $currentUser;

    /**
     * ApiController constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->middleware(function (Request $request, \Closure $next) {
            $this->currentUser = $request->user();
            return $next($request);
        });
    }
}