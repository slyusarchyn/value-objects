<?php

namespace Slyusarchyn\ValueObjects\Identity;

use Slyusarchyn\ValueObjects\Identity\Exceptions\InvalidEmailException;
use Slyusarchyn\ValueObjects\ValueObject;

/**
 * Class Email
 * @package Slyusarchyn\ValueObjects\Identity
 */
class Email extends ValueObject
{
    /**
     * @var string
     */
    private $email;

    /**
     * Email constructor.
     * @param string $email
     * @throws InvalidEmailException
     */
    public function __construct(string $email)
    {
        $this->validate($email);
        $this->email = $email;
    }

    /**
     * @param string $email
     * @throws InvalidEmailException
     */
    private function validate(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException("\"$email\" is not a valid e-mail address.");
        }
    }

    /**
     * @return string
     */
    public function get(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function username(): string
    {
        return $this->getEmailParts()[0];
    }

    /**
     * @return string
     */
    public function domain(): string
    {
        return $this->getEmailParts()[1];
    }

    /**
     * @return array
     */
    private function getEmailParts(): array
    {
        return explode("@", $this->email);
    }
}
