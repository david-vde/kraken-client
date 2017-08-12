<?php

namespace DVE\KrakenClient;

use DVE\KrakenClient\Model\Request\PublicTimeRequestModel;
use Payward\KrakenAPI;

class KrakenClient
{
    /**
     * @var KrakenAPI
     */
    private $krakenAPI;

    /**
     * KrakenClient constructor.
     * @param KrakenAPI $krakenAPI
     */
    public function __construct(KrakenAPI $krakenAPI)
    {
        $this->krakenAPI = $krakenAPI;
    }

    /**
     * @param $apiKey
     * @param $privateKey
     * @return KrakenClient
     */
    public static function create($apiKey, $privateKey)
    {
        return new self(new KrakenAPI($apiKey, $privateKey));
    }

    /**
     * @return PublicTimeRequestModel
     */
    public function publicTime()
    {
        return new PublicTimeRequestModel($this->krakenAPI);
    }

}