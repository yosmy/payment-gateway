<?php

namespace Yosmy\Payment\Gateway;

use JsonSerializable;

class Charge implements JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $date;

    /**
     * @param string $id
     * @param int    $date
     */
    public function __construct(
        string $id,
        int $date
    ) {
        $this->id = $id;
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'date' => $this->date,
        ];
    }
}
