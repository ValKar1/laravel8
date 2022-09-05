<?php

namespace App\Bill\Domain\Client\Exceptions;

use App\Common\Exceptions\BaseException;

class PhoneValidationException extends BaseException
{
    /**
     * Render the exception into an HTTP response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function render()
    {
        $code = 422;
        return response()->json(
            [
                'message' => 'PhoneValidationException',
                'code' => $code
            ],
            $code
        );
    }
}
