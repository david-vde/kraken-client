<?php

namespace DVE\KrakenClient\Model\Request;

use DVE\KrakenClient\Constant\ApiMethodAccessType;
use DVE\KrakenClient\Model\Response\PrivateQueryOrdersResponseModel;
use Shudrum\Component\ArrayFinder\ArrayFinder;

class PrivateQueryOrdersRequestModel extends RequestModel
{
    /**
     * @var bool
     */
    private $trades;

    /**
     * @var int
     */
    private $userref;

    /**
     * @var string[]
     */
    private $txid = [];

    /**
     * @param bool $trades
     * @return PrivateQueryOrdersRequestModel
     */
    public function setTrades($trades)
    {
        $this->trades = (bool)$trades;
        return $this;
    }

    /**
     * @param int $userref
     * @return PrivateQueryOrdersRequestModel
     */
    public function setUserRef($userref)
    {
        $this->userref = $userref;
        return $this;
    }

    /**
     * @param string[] $txid
     * @return PrivateQueryOrdersRequestModel
     */
    public function setTxid(array $txid)
    {
        $this->txid = $txid;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndPointName()
    {
        return 'QueryOrders';
    }

    /**
     * @return array
     */
    public function buildRequest()
    {
        $requestData = [
            'txid'  =>  implode(',', $this->txid)
        ];

        if($this->trades) {
            $requestData['trades'] = $this->trades;
        }

        if($this->userref) {
            $requestData['userref'] = $this->userref;
        }

        return $requestData;
    }

    public function send()
    {
        return new PrivateQueryOrdersResponseModel(
            $this->callApi(ApiMethodAccessType::PRIVATE_METHOD),
            new ArrayFinder([])
        );
    }
}