<?php

namespace Yosmy\Payment\Gateway\Card\Delete;

use Yosmy\Payment\Gateway;
use LogicException;

/**
 * @di\service()
 */
class SelectGateway
{
    /**
     * @var Gateway\DeleteCard[]
     */
    private $services;

    /**
     * @di\arguments({
     *     services: '#yosmy.payment.gateway.delete_card'
     * })
     *
     * @param Gateway\DeleteCard[] $services
     */
    public function __construct(
        array $services
    ) {
        $this->services = $services;
    }

    /**
     * @param string $gateway
     *
     * @return Gateway\DeleteCard
     */
    public function select(
        string $gateway
    ): Gateway\DeleteCard {
        // Find gateway
        foreach ($this->services as $service) {
            if ($service->identify() == $gateway) {
                return $service;
            }
        }

        throw new LogicException();
    }
}