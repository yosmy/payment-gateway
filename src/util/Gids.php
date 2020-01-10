<?php

namespace Yosmy\Payment\Gateway;

use LogicException;
use JsonSerializable;

class Gids implements JsonSerializable
{
    /**
     * @var Gid[]
     */
    private $values;

    /**
     * @param Gid[] $values
     */
    public function __construct(array $values)
    {
        $this->values = $values;
    }

    /**
     * @param string $gateway
     *
     * @return bool
     */
    public function has(
        string $gateway
    ): bool {
        foreach ($this->values as $value) {
            if ($value->getGateway() == $gateway) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param string $gateway
     *
     * @return string
     */
    public function get(
        string $gateway
    ): string {
        foreach ($this->values as $gid) {
            if ($gid->getGateway() == $gateway) {
                return $gid->getId();
            }
        }

        throw new LogicException();
    }

    /**
     * @return Gid[]
     */
    public function all(): array
    {
        return $this->values;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return array_map(
            function (Gid $value) {
                return $value->jsonSerialize();
            },
            $this->values
        );
    }
}
