<?php

namespace Core\Http\Controllers\Api;

use Core\Services\Token\TokenFactory;
use Core\Http\Controllers\Controller;

/**
 * Class WebAppTokenController
 * @package Core\Http\Controllers\Api
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