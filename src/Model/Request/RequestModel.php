<?php

namespace DVE\KrakenClient\Model\Request;

use Payward\KrakenAPI;
use Payward\KrakenAPIException;
use Psr\Log\LoggerInterface;
use Shudrum\Component\ArrayFinder\ArrayFinder;

abstract class RequestModel
{
    /**
     * @var KrakenAPI
     */
    protected $krakenAPI;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * RequestModel constructor.
     * @param KrakenAPI $krakenAPI
     * @param LoggerInterface $logger
     */
    public function __construct(KrakenAPI $krakenAPI, LoggerInterface $logger)
    {
        $this->krakenAPI = $krakenAPI;
        $this->logger = $logger;
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
                $this->logger->info('Calling end-point "'.$this->getEndPointName().'"...');

                if($retriesCounter > 0) {
                   $this->logger->info('Retrying ($retriesCounter)...');
                }

                $apiResults = $this->krakenAPI->QueryPublic(
                    $this->getEndPointName(),
                    $this->buildRequest()
                );

                $this->logger->info('Succeeded!');

                break;
            } catch(KrakenAPIException $krakenAPIException) {
                $this->logger->error('Kraken returned an error: ' . $krakenAPIException->getMessage());

                if($retriesCounter === $nbRetries) {
                    $this->logger->critical('Unable to satisfy your request.');
                }
            }
        }

        return new ArrayFinder($apiResults);
    }
}