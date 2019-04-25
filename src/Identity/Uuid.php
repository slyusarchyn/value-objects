<?php

namespace Slyusarchyn\ValueObjects\Identity;

use Slyusarchyn\ValueObjects\Identity\Exceptions\InvalidUuidException;
use Slyusarchyn\ValueObjects\ValueObject;

/**
 * Class Uuid
 * @package Slyusarchyn\ValueObjects\Identity
 */
class Uuid extends ValueObject
{
    /**
     * @var string
     */
    private $uuid;

    /**
     * @var string
     */
    private $regex = "/[a-f0-9]{8}\-[a-f0-9]{4}\-4[a-f0-9]{3}\-(8|9|a|b)[a-f0-9]{3‌ }\-[a-f0-9]{12}/";

    /**
     * Uuid constructor.
     * @param string $uuid
     * @param string|null $regex
     * @throws InvalidUuidException
     */
    public function __construct(string $uuid, string $regex = null)
    {
        $this->setRegex($regex);
        $this->validate($uuid);
        $this->uuid = $uuid;
    }

    /**
     * @param string $uuid
     * @throws InvalidUuidException
     */
    private function validate(string $uuid): void
    {
        if (!filter_var($uuid, FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => $this->getRegex()]])) {
            throw new InvalidUuidException("\"$uuid\" is not a valid UUID.");
        }
    }

    /**
     * @return string
     */
    public function get(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getRegex(): string
    {
        return $this->regex;
    }

    /**
     * @param string $regex
     */
    public function setRegex(string $regex): void
    {
        $this->regex = is_null($regex) ? $this->regex : $regex;
    }
}
