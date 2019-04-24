<?php


namespace Slyusarchyn\ValueObjects\Internet;


use InvalidArgumentException;
use Slyusarchyn\ValueObjects\ValueObject;

/**
 * Class IpAddress
 * @package Slyusarchyn\ValueObjects\Internet
 */
class IpAddress extends ValueObject
{
    /**
     * @var string
     */
    private $value;

    /**
     * IpAddress constructor.
     * @param string $ipAddress
     */
    public function __construct(string $ipAddress)
    {
        $this->validate($ipAddress);
        $this->value = $ipAddress;
    }

    /**
     * @param string $ipAddress
     */
    private function validate(string $ipAddress)
    {
        if (!filter_var($ipAddress, FILTER_VALIDATE_IP)) {
            throw new InvalidArgumentException("$ipAddress is not a valid ip address.");
        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
