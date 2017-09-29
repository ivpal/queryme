<?php

namespace App\Exceptions;

use Exception;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class FollowException
 * @package App\Exceptions
 */
class FollowException extends Exception
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function render()
    {
        return response()->json(['error' => ['message' => $this->message]], Response::HTTP_BAD_REQUEST);
    }
}