<?php

namespace Slyusarchyn\ValueObjects\Identity\Exceptions;

use Exception;
use Slyusarchyn\ValueObjects\Interfaces\ValueObjectException;
use Throwable;

/**
 * Class InvalidPhoneException
 * @package Slyusarchyn\ValueObjects\Identity\Exceptions
 */
class InvalidPhoneException extends Exception implements ValueObjectException
{
    /**
     * InvalidPhoneException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
