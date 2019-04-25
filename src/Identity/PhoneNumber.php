<?php

namespace Slyusarchyn\ValueObjects\Identity;

use Slyusarchyn\ValueObjects\Identity\Exceptions\InvalidPhoneException;
use Slyusarchyn\ValueObjects\ValueObject;

/**
 * Class PhoneNumber
 * @package Slyusarchyn\ValueObjects\Identity
 */
class PhoneNumber extends ValueObject
{
    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var string
     */
    private $regex = "/^[\+0-9]{8,15}$/";

    /**
     * Email constructor.
     * @param string $phoneNumber
     * @param string|null $regex
     * @throws InvalidPhoneException
     */
    public function __construct(string $phoneNumber, string $regex = null)
    {
        $this->setRegex($regex);
        $this->validate($phoneNumber);
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @throws InvalidPhoneException
     */
    private function validate(string $phoneNumber): void
    {
        if (!filter_var($phoneNumber, FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => $this->getRegex()]])) {
            throw new InvalidPhoneException("\"$phoneNumber\" is not a valid phone number.");
        }
    }

    /**
     * @return string
     */
    public function get(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->phoneNumber;
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
