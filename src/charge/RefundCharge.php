<?php

namespace Yosmy\Payment\Gateway;

interface RefundCharge
{
    /**
     * @param string $id
     * @param int    $amount
     *
     * @throws UnknownException
     */
    public function refund(
        string $id,
        int $amount
    );

    /**
     * @return string
     */
    public function identify(): string;
}
