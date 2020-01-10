<?php

namespace Yosmy\Payment\Gateway\Customer\Add;

use Yosmy\Payment\Gateway;
use LogicException;

/**
 * @di\service()
 */
class SelectGateway
{
    /**
     * @var Gateway\AddCustomer[]
     */
    private $services;

    /**
     * @di\arguments({
     *     services: '#yosmy.payment.gateway.add_customer'
     * })
     *
     * @param Gateway\AddCustomer[] $services
     */
    public function __construct(
        array $services
    ) {
        $this->services = $services;
    }

    /**
     * @param string $gateway
     *
     * @return Gateway\AddCustomer
     */
    public function select(
        string $gateway
    ): Gateway\AddCustomer {
        // Find gateway
        foreach ($this->services as $service) {
            if ($service->identify() == $gateway) {
                return $service;
            }
        }

        throw new LogicException();
    }
}