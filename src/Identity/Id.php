<?php

namespace Slyusarchyn\ValueObjects\Identity;

use Slyusarchyn\ValueObjects\Identity\Exceptions\InvalidIdException;
use Slyusarchyn\ValueObjects\ValueObject;

/**
 * Class Id
 * @package Slyusarchyn\ValueObjects\Identity
 */
class Id extends ValueObject
{
    /**
     * @var int
     */
    private $id;

    /**
     * Id constructor.
     * @param int $id
     * @throws InvalidIdException
     */
    public function __construct(int $id)
    {
        $this->validate($id);
        $this->id = $id;
    }

    /**
     * @param int $id
     * @throws InvalidIdException
     */
    private function validate(int $id)
    {
        if (!is_int($id) || 0 > $id) {
            throw new InvalidIdException("\"$id\" is not a valid id value.");
        }
    }

    /**
     * @return int
     */
    public function get(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return strval($this->id);
    }
}
