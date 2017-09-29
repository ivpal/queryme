<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserNotFoundException extends ModelNotFoundException
{
    protected $message = 'User not found.';

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function render()
    {
        return response()->json(['error' => ['message' => $this->message]], Response::HTTP_UNAUTHORIZED);
    }
}