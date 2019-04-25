<?php

namespace Slyusarchyn\ValueObjects\Network;

use Slyusarchyn\ValueObjects\Network\Exceptions\InvalidIpv6Exception;
use Slyusarchyn\ValueObjects\ValueObject;

/**
 * Class Ipv6
 * @package Slyusarchyn\ValueObjects\Network
 */
class Ipv6 extends ValueObject
{
    /**
     * @var string
     */
    private $ipAddress;

    /**
     * Ipv6 constructor.
     * @param string $ipAddress
     * @throws InvalidIpv6Exception
     */
    public function __construct(string $ipAddress)
    {
        $this->validate($ipAddress);
        $this->ipAddress = $ipAddress;
    }

    /**
     * @param string $ipAddress
     * @throws InvalidIpv6Exception
     */
    private function validate(string $ipAddress)
    {
        if (!filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            throw new InvalidIpv6Exception("\"$ipAddress\" is not a valid IPV6 address.");
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
