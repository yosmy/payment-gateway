<?php

namespace Yosmy\Payment\Gateway\Charge\Execute;

use Yosmy\Payment\Gateway;
use LogicException;

/**
 * @di\service()
 */
class SelectGateway
{
    /**
     * @var Gateway\ExecuteCharge[]
     */
    private $services;

    /**
     * @di\arguments({
     *     services: '#yosmy.payment.gateway.execute_charge'
     * })
     *
     * @param Gateway\ExecuteCharge[] $services
     */
    public function __construct(
        array $services
    ) {
        $this->services = $services;
    }

    /**
     * @param string $gateway
     *
     * @return Gateway\ExecuteCharge
     */
    public function select(
        string $gateway
    ): Gateway\ExecuteCharge {
        // Find gateway
        foreach ($this->services as $service) {
            if ($service->identify() == $gateway) {
                return $service;
            }
        }

        throw new LogicException();
    }
}