<?php

namespace App\Shared\Exceptions;

class AuthenticationRequiredException extends BaseException
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function render()
    {
        $code = 401;
        return response()->json(
            [
                'name' => 'AuthenticationRequiredException',
                'message' => __('errors.AUTHENTICATION_REQUIRED'),
                'code' => $code
            ],
            $code
        );
    }
}
