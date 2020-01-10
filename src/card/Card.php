<?php

namespace Yosmy\Payment\Gateway;

use JsonSerializable;

class Card implements JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $last4;

    /**
     * @param string $id
     * @param string $last4
     */
    public function __construct(
        string $id,
        string $last4
    ) {
        $this->id = $id;
        $this->last4 = $last4;
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
    public function getLast4(): string
    {
        return $this->last4;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'last4' => $this->last4
        ];
    }
}
