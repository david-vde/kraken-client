<?php

namespace DVE\KrakenClient\Model\Request;

use DVE\KrakenClient\Constant\ApiMethodAccessType;
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
     * @param string $apiMethodAccessType
     * @return ArrayFinder
     */
    protected function callApi($apiMethodAccessType = ApiMethodAccessType::PUBLIC_METHOD)
    {
        $apiResults = [];
        $nbRetries = 5;

        for($retriesCounter = 0; $retriesCounter < $nbRetries; $retriesCounter++) {
            try {
                $this->logger->info('Calling end-point "'.$this->getEndPointName().'"...');

                if($retriesCounter > 0) {
                   $this->logger->info('Retrying ($retriesCounter)...');
                }

                $method = $apiMethodAccessType === ApiMethodAccessType::PRIVATE_METHOD ? 'QueryPrivate' : 'QueryPublic';

                $apiResults = $this->krakenAPI->$method(
                    $this->getEndPointName(),
                    $this->buildRequest()
                );

                if(array_key_exists('error', $apiResults) && count($apiResults['error']) > 0) {
                    $errors = implode(', ', $apiResults['error']);
                    throw new KrakenAPIException($errors);
                } else {
                    $this->logger->info('Succeeded!');
                }

                break;
            } catch(KrakenAPIException $krakenAPIException) {
                $this->logger->error('Kraken returned one or more errors: ' . $krakenAPIException->getMessage());

                if($retriesCounter === $nbRetries) {
                    $this->logger->critical('Unable to satisfy your request after '.$nbRetries.' retries.');
                    return new ArrayFinder($apiResults);
                }
            }
        }

        return new ArrayFinder($apiResults);
    }
}