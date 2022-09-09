<?php
declare(strict_types=1);

namespace App\Common\Exceptions;

use Exception;

class BaseException extends Exception
{
    /**
     * BaseException constructor.
     *
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
