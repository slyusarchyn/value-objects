<?php

namespace Slyusarchyn\ValueObjects\Identity;

use Slyusarchyn\ValueObjects\Identity\Exceptions\InvalidNameException;
use Slyusarchyn\ValueObjects\ValueObject;

/**
 * Class Name
 * @package Slyusarchyn\ValueObjects\Identity
 */
class Name extends ValueObject
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var
     */
    private $regex;

    /**
     * Email constructor.
     * @param string $name
     * @param string|null $regex
     * @throws InvalidNameException
     */
    public function __construct(string $name, string $regex = null)
    {
        $this->setRegex($regex);
        $this->validate($name);
        $this->name = $name;
    }

    /**
     * @param string $name
     * @throws InvalidNameException
     */
    private function validate(string $name): void
    {
        if (!filter_var($name, FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => $this->getRegex()]])) {
            throw new InvalidNameException("\"$name\" is not a valid name.");
        }
    }

    /**
     * @return string
     */
    public function get(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->name;
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
