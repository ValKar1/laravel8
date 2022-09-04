<?php

namespace App\Shared\Exceptions;

class AuthorizationRequiredException extends BaseException
{
    /**
     * Render the exception into an HTTP response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function render()
    {
        $code = 403;
        return response()->json(
            [
                'message' => 'AuthorizationRequiredException',
                'code' => $code
            ],
            $code
        );
    }
}
