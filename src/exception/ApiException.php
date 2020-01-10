<?php

namespace Yosmy\Payment\Gateway;

use Exception;
use JsonSerializable;

class ApiException extends Exception implements JsonSerializable
{
    /**
     * @var array
     */
    protected $response;

    /**
     * @param array $response
     */
    public function __construct(
        array $response
    ) {
        parent::__construct();

        $this->response = $response;
    }

    /**
     * @return array
     */
    public function getResponse(): array
    {
        return $this->response;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): array
    {
        return [
            'response' => $this->response
        ];
    }
}