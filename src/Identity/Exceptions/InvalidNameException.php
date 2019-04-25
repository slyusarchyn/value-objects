<?php

namespace Slyusarchyn\ValueObjects\Identity\Exceptions;

use Exception;
use Slyusarchyn\ValueObjects\Interfaces\ValueObjectException;
use Throwable;

/**
 * Class InvalidNameException
 * @package Slyusarchyn\ValueObjects\Identity\Exceptions
 */
class InvalidNameException extends Exception implements ValueObjectException
{
    /**
     * InvalidNameException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
