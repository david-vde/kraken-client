<?php

namespace DVE\KrakenClient;

use DVE\KrakenClient\Logger\Logger;
use DVE\KrakenClient\Model\Request\PublicDepthRequestModel;
use DVE\KrakenClient\Model\Request\PublicTimeRequestModel;
use Payward\KrakenAPI;
use Psr\Log\LoggerInterface;

class KrakenClient
{
    /**
     * @var KrakenAPI
     */
    private $krakenAPI;

    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * KrakenClient constructor.
     * @param KrakenAPI $krakenAPI
     */
    public function __construct(KrakenAPI $krakenAPI, LoggerInterface $logger)
    {
        $this->krakenAPI = $krakenAPI;
        $this->logger = $logger;
    }

    /**
     * @param $apiKey
     * @param $privateKey
     * @return KrakenClient
     */
    public static function create($apiKey, $privateKey, LoggerInterface $logger = null)
    {
        if(!$logger) {
            $logger = new Logger();
        }

        return new self(
            new KrakenAPI($apiKey, $privateKey),
            $logger
        );
    }

    /**
     * @return PublicTimeRequestModel
     */
    public function publicTime()
    {
        return new PublicTimeRequestModel($this->krakenAPI, $this->logger);
    }

    /**
     * @return PublicDepthRequestModel
     */
    public function publicDepth()
    {
        return new PublicDepthRequestModel($this->krakenAPI, $this->logger);
    }

}