<?php

namespace DVE\KrakenClient\Model\Request;

use DVE\KrakenClient\Constant\ApiMethodAccessType;
use DVE\KrakenClient\Model\Response\PrivateCancelOrderResponseModel;
use Shudrum\Component\ArrayFinder\ArrayFinder;

class PrivateCancelOrderRequestModel extends RequestModel
{
    /**
     * Transaction ID
     *
     * @var string
     */
    private $txid;

    /**
     * @param string $txid
     * @return PrivateCancelOrderRequestModel
     */
    public function setTxid($txid)
    {
        $this->txid = $txid;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndPointName()
    {
        return 'CancelOrder';
    }

    /**
     * @return array
     */
    public function buildRequest()
    {
        return [
            'txid'  =>  $this->txid
        ];
    }

    public function send()
    {
        return new PrivateCancelOrderResponseModel(
            $this->callApi(ApiMethodAccessType::PRIVATE_METHOD),
            new ArrayFinder()
        );
    }
}