<?php

namespace DVE\KrakenClient\Model\Request;

use Payward\KrakenAPI;
use Payward\KrakenAPIException;
use Shudrum\Component\ArrayFinder\ArrayFinder;

abstract class RequestModel
{
    /**
     * @var KrakenAPI
     */
    protected $krakenAPI;

    /**
     * RequestModel constructor.
     * @param KrakenAPI $krakenAPI
     */
    public function __construct(KrakenAPI $krakenAPI)
    {
        $this->krakenAPI = $krakenAPI;
    }

    /**
     * @return string
     */
    abstract protected function getEndPointName();

    /**
     * @return RequestModel
     */
    abstract protected function buildRequest();

    /**
     * @return ArrayFinder
     */
    protected function callApi()
    {
        $apiResults = [];
        $nbRetries = 5;

        for($retriesCounter = 0; $retriesCounter < $nbRetries; $retriesCounter++) {
            try {
                if($retriesCounter > 0) {
                    echo "- Retrying ($retriesCounter)...\n";
                }

                $apiResults = $this->krakenAPI->QueryPublic(
                    $this->getEndPointName(),
                    $this->buildRequest()
                );
                break;
            } catch(KrakenAPIException $krakenAPIException) {
                echo "- Kraken returned an error.\n";
            }
        }

        return new ArrayFinder($apiResults);
    }
}