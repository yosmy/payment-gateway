<?php

namespace Yosmy\Payment\Gateway;

use Exception;

class FieldException extends Exception
{
    const FIELD_NUMBER = 'number';
    const FIELD_NAME = 'name';
    const FIELD_EXPIRY = 'expiry';
    const FIELD_CVC = 'cvc';
    const FIELD_ZIP = 'zip';

    /**
     * @var string
     */
    protected $field;

    /**
     * @param string|null $field
     */
    public function __construct(
        ?string $field
    ) {
        parent::__construct();

        $this->field = $field;
    }

    /**
     * @return string
     */
    public function getField(): ?string
    {
        return $this->field;
    }
}