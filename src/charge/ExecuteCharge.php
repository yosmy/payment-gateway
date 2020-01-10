<?php

namespace Yosmy\Payment\Gateway;

interface ExecuteCharge
{
    /**
     * @param string $customer
     * @param string $card
     * @param int    $amount      In cents @see https://stripe.com/docs/currencies#zero-decimal
     * @param string $description Internal description
     * @param string $statement   User's credit card statement
     *
     * @return Charge
     *
     * @throws FieldException|FundsException|IssuerException|RiskException|FraudException|UnknownException
     */
    public function execute(
        string $customer,
        string $card,
        int $amount,
        string $description,
        string $statement
    ): Charge;

    /**
     * @return string
     */
    public function identify(): string;
}
