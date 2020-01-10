<?php

namespace Yosmy\Payment\Gateway;

interface AddCustomer
{
    /**
     * @return Customer
     *
     * @throws UnknownException
     */
    public function add(): Customer;

    /**
     * @return string
     */
    public function identify(): string;
}
