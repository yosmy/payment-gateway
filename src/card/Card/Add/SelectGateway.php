<?php

namespace Yosmy\Payment\Gateway\Card\Add;

use Yosmy\Payment\Gateway;
use LogicException;

/**
 * @di\service()
 */
class SelectGateway
{
    /**
     * @var Gateway\AddCard[]
     */
    private $services;

    /**
     * @di\arguments({
     *     services: '#yosmy.payment.gateway.add_card'
     * })
     *
     * @param Gateway\AddCard[] $services
     */
    public function __construct(
        array $services
    ) {
        $this->services = $services;
    }

    /**
     * @param string $gateway
     *
     * @return Gateway\AddCard
     */
    public function select(
        string $gateway
    ): Gateway\AddCard {
        // Find gateway
        foreach ($this->services as $service) {
            if ($service->identify() == $gateway) {
                return $service;
            }
        }

        throw new LogicException();
    }
}