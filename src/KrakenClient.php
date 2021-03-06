<?php

namespace DVE\KrakenClient;

use DVE\KrakenClient\Logger\Logger;
use DVE\KrakenClient\Model\Request\PrivateAddOrderRequestModel;
use DVE\KrakenClient\Model\Request\PrivateBalanceRequestModel;
use DVE\KrakenClient\Model\Request\PrivateCancelOrderRequestModel;
use DVE\KrakenClient\Model\Request\PrivateCloseOrdersRequestModel;
use DVE\KrakenClient\Model\Request\PrivateOpenOrdersRequestModel;
use DVE\KrakenClient\Model\Request\PrivateQueryOrdersRequestModel;
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

    public function publicAssets()
    {
        throw new \BadMethodCallException(__METHOD__ . ' not yet implemented');
    }

    public function publicAssetPairs()
    {
        throw new \BadMethodCallException(__METHOD__ . ' not yet implemented');
    }

    public function publicTicker()
    {
        throw new \BadMethodCallException(__METHOD__ . ' not yet implemented');
    }

    public function publicOHLC()
    {
        throw new \BadMethodCallException(__METHOD__ . ' not yet implemented');
    }

    /**
     * @return PublicDepthRequestModel
     */
    public function publicDepth()
    {
        return new PublicDepthRequestModel($this->krakenAPI, $this->logger);
    }

    public function publicTrades()
    {
        throw new \BadMethodCallException(__METHOD__ . ' not yet implemented');
    }

    public function publicSpread()
    {
        throw new \BadMethodCallException(__METHOD__ . ' not yet implemented');
    }

    /**
     * @return PrivateBalanceRequestModel
     */
    public function privateBalance()
    {
        return new PrivateBalanceRequestModel($this->krakenAPI, $this->logger);
    }

    public function privateTradeBalance()
    {
        throw new \BadMethodCallException(__METHOD__ . ' not yet implemented');
    }

    /**
     * @return PrivateOpenOrdersRequestModel
     */
    public function privateOpenOrders()
    {
        return new PrivateOpenOrdersRequestModel($this->krakenAPI, $this->logger);
    }

    /**
     * @return PrivateCloseOrdersRequestModel
     */
    public function privateClosedOrders()
    {
        return new PrivateCloseOrdersRequestModel($this->krakenAPI, $this->logger);
    }

    /**
     * @return PrivateQueryOrdersRequestModel
     */
    public function privateQueryOrders()
    {
        return new PrivateQueryOrdersRequestModel($this->krakenAPI, $this->logger);
    }

    public function privateTradesHistory()
    {
        throw new \BadMethodCallException(__METHOD__ . ' not yet implemented');
    }

    public function privateQueryTrades()
    {
        throw new \BadMethodCallException(__METHOD__ . ' not yet implemented');
    }

    public function privateOpenPositions()
    {
        throw new \BadMethodCallException(__METHOD__ . ' not yet implemented');
    }

    public function privateLedgers()
    {
        throw new \BadMethodCallException(__METHOD__ . ' not yet implemented');
    }

    public function privateTradeVolume()
    {
        throw new \BadMethodCallException(__METHOD__ . ' not yet implemented');
    }

    /**
     * @return PrivateAddOrderRequestModel
     */
    public function privateAddOrder()
    {
        return new PrivateAddOrderRequestModel($this->krakenAPI, $this->logger);
    }

    /**
     * @return PrivateCancelOrderRequestModel
     */
    public function privateCancelOrder()
    {
        return new PrivateCancelOrderRequestModel($this->krakenAPI, $this->logger);
    }

    public function privateDepositMethods()
    {
        throw new \BadMethodCallException(__METHOD__ . ' not yet implemented');
    }

    public function privateDepositAddresses()
    {
        throw new \BadMethodCallException(__METHOD__ . ' not yet implemented');
    }

    public function privateWithdrawInfo()
    {
        throw new \BadMethodCallException(__METHOD__ . ' not yet implemented');
    }

    public function privateWithdraw()
    {
        throw new \BadMethodCallException(__METHOD__ . ' not yet implemented');
    }

    public function privateWithdrawStatus()
    {
        throw new \BadMethodCallException(__METHOD__ . ' not yet implemented');
    }
}