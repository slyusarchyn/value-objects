<?php

namespace Slyusarchyn\ValueObjects\Interfaces;

/**
 * Interface ValueObjectInterface
 * @package Slyusarchyn\Interfaces
 */
interface ValueObject
{
    /**
     * @return string
     */
    public function __toString(): string;

    /**
     * @param self $other
     * @return bool
     */
    public function equals(self $other): bool;
}
