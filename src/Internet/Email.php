<?php


namespace Slyusarchyn\ValueObjects\Internet;

use InvalidArgumentException;
use Slyusarchyn\ValueObjects\ValueObject;

/**
 * Class Email
 * @package Slyusarchyn\ValueObjects\Internet
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
     */
    public function __construct(string $email)
    {
        $this->validate($email);
        $this->email = $email;
    }

    /**
     * @param string $email
     */
    private function validate(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("$email is not a valid e-mail address.");
        }
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
