<?php

namespace Slyusarchyn\ValueObjects\Network;

use Slyusarchyn\ValueObjects\Network\Exceptions\InvalidUrlException;
use Slyusarchyn\ValueObjects\ValueObject;

/**
 * Class Url
 * @package Slyusarchyn\ValueObjects\Network
 */
class Url extends ValueObject
{
    /**
     * @var string
     */
    private $url;

    /**
     * Url constructor.
     * @param string $url
     * @throws InvalidUrlException
     */
    public function __construct(string $url)
    {
        $this->validate($url);
        $this->url = $url;
    }

    /**
     * @param string $url
     * @throws InvalidUrlException
     */
    private function validate(string $url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidUrlException("\"$url\" is not a valid url.");
        }
    }

    /**
     * @return string
     */
    public function get(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->url;
    }
}
