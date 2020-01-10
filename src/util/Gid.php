<?php

namespace Yosmy\Payment\Gateway;

use JsonSerializable;

class Gid implements JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $gateway;

    /**
     * @param string $id
     * @param string $gateway
     */
    public function __construct(
        string $id,
        string $gateway
    ) {
        $this->id = $id;
        $this->gateway = $gateway;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getGateway(): string
    {
        return $this->gateway;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'gateway' => $this->gateway,
        ];
    }
}
