<?php

namespace Slyusarchyn\ValueObjects\Network;

use Slyusarchyn\ValueObjects\Network\Exceptions\InvalidIpv4Exception;
use Slyusarchyn\ValueObjects\ValueObject;

/**
 * Class Ipv4
 * @package Slyusarchyn\ValueObjects\Network
 */
class Ipv4 extends ValueObject
{
    /**
     * @var string
     */
    private $ipAddress;

    /**
     * Ipv4 constructor.
     * @param string $ipAddress
     * @throws InvalidIpv4Exception
     */
    public function __construct(string $ipAddress)
    {
        $this->validate($ipAddress);
        $this->ipAddress = $ipAddress;
    }

    /**
     * @param string $ipAddress
     * @throws InvalidIpv4Exception
     */
    private function validate(string $ipAddress)
    {
        if (!filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            throw new InvalidIpv4Exception("\"$ipAddress\" is not a valid IPV4 address.");
        }
    }

    /**
     * @return string
     */
    public function get(): string
    {
        return $this->ipAddress;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->ipAddress;
    }
}
