<?php

namespace DVE\KrakenClient\Model\Request;

use DVE\KrakenClient\Constant\ApiMethodAccessType;
use DVE\KrakenClient\Model\Response\PrivateOpenOrdersResponseModel;
use Shudrum\Component\ArrayFinder\ArrayFinder;

class PrivateOpenOrdersRequestModel extends RequestModel
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
     * @return string
     */
    public function getEndPointName()
    {
        return 'OpenOrders';
    }

    /**
     * @return array
     */
    public function buildRequest()
    {
        $requestData = [];

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
        return new PrivateOpenOrdersResponseModel(
            $this->callApi(ApiMethodAccessType::PRIVATE_METHOD),
            new ArrayFinder([])
        );
    }
}