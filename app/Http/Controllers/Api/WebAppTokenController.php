<?php

namespace App\Http\Controllers\Api;

use App\Services\Token\TokenFactory;
use App\Http\Controllers\Controller;

/**
 * Class WebAppTokenController
 * @package App\Http\Controllers\Api
 */
class WebAppTokenController extends Controller
{
    public function create()
    {
        /** @var TokenFactory $factory */
        $factory = app()->make(TokenFactory::class);
        return $factory->createForUserAttribute('nickname', 'webapp')->asArray();
    }
}