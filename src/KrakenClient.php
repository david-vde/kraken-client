<?php

namespace DVE\KrakenClient;

use Payward\KrakenAPI;

class KrakenClient
{
    /**
     * @var KrakenAPI
     */
    private $krakenClient;

    public function __construct(KrakenAPI $krakenClient)
    {
        $this->krakenClient = $krakenClient;
    }
}