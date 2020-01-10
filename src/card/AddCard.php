<?php

namespace Yosmy\Payment\Gateway;

interface AddCard
{
    /**
     * @param string $customer
     * @param string $number
     * @param string $name
     * @param string $month
     * @param string $year
     * @param string $cvc
     * @param string $zip
     *
     * @return Card
     *
     * @throws FieldException|FundsException|IssuerException|RiskException|FraudException|UnknownException
     */
    public function add(
        string $customer,
        string $number,
        string $name,
        string $month,
        string $year,
        string $cvc,
        string $zip
    ): Card;

    /**
     * @return string
     */
    public function identify(): string;
}
