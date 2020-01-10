<?php

namespace Yosmy\Payment\Gateway\Charge\Refund;

use Yosmy\Payment\Gateway;
use LogicException;

/**
 * @di\service()
 */
class SelectGateway
{
    /**
     * @var Gateway\RefundCharge[]
     */
    private $services;

    /**
     * @di\arguments({
     *     services: '#yosmy.payment.gateway.refund_charge'
     * })
     *
     * @param Gateway\RefundCharge[] $services
     */
    public function __construct(
        array $services
    ) {
        $this->services = $services;
    }

    /**
     * @param string $gateway
     *
     * @return Gateway\RefundCharge
     */
    public function select(
        string $gateway
    ): Gateway\RefundCharge {
        // Find gateway
        foreach ($this->services as $service) {
            if ($service->identify() == $gateway) {
                return $service;
            }
        }

        throw new LogicException();
    }
}