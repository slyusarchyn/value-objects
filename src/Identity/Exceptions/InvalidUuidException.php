<?php

namespace Slyusarchyn\ValueObjects\Identity\Exceptions;

use Exception;
use Slyusarchyn\ValueObjects\Interfaces\ValueObjectException;
use Throwable;

/**
 * Class InvalidIdException
 * @package Slyusarchyn\ValueObjects\Identity\Exceptions
 */
class InvalidUuidException extends Exception implements ValueObjectException
{
    /**
     * InvalidUuidException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
