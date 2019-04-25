<?php

namespace Slyusarchyn\ValueObjects\Network\Exceptions;

use Exception;
use Throwable;

/**
 * Class InvalidTcpPortException
 * @package Slyusarchyn\ValueObjects\Network\Exceptions
 */
class InvalidTcpPortException extends Exception
{
    /**
     * InvalidTcpPortException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
