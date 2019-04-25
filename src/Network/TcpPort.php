<?php

namespace Slyusarchyn\ValueObjects\Network;

use Slyusarchyn\ValueObjects\Network\Exceptions\InvalidTcpPortException;
use Slyusarchyn\ValueObjects\ValueObject;

/**
 * Class TcpPort
 * @package Slyusarchyn\ValueObjects\Network
 */
class TcpPort extends ValueObject
{
    /**
     * @var int
     */
    private $port;

    /**
     * TcpPort constructor.
     * @param int $port
     * @throws InvalidTcpPortException
     */
    public function __construct(int $port)
    {
        $this->validate($port);
        $this->port = $port;
    }

    /**
     * @param int $port
     * @throws InvalidTcpPortException
     */
    private function validate(int $port)
    {
        if ($port < 0 || $port > 65535) {
            throw new InvalidTcpPortException("\"$port\" is not a valid tcp port.");
        }
    }

    /**
     * @return int
     */
    public function get(): int
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return strval($this->port);
    }
}
