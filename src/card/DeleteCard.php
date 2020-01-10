<?php

namespace Yosmy\Payment\Gateway;

interface DeleteCard
{
    /**
     * @param string $customer
     * @param string $card
     *
     * @throws UnknownException
     */
    public function delete(
        string $customer,
        string $card
    );

    /**
     * @return string
     */
    public function identify(): string;
}
