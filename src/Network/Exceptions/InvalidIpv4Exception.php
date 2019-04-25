<?php

namespace Slyusarchyn\ValueObjects\Network\Exceptions;

use Exception;
use Throwable;

/**
 * Class InvalidIpv4Exception
 * @package Slyusarchyn\ValueObjects\Network\Exceptions
 */
class InvalidIpv4Exception extends Exception
{
    /**
     * InvalidIpv4Exception constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
