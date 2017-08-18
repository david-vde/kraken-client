<?php

namespace DVE\KrakenClient\Model\Request;

use DVE\KrakenClient\Constant\ApiMethodAccessType;
use DVE\KrakenClient\Model\Response\PrivateBalanceResponseModel;
use Shudrum\Component\ArrayFinder\ArrayFinder;

class PrivateBalanceRequestModel extends RequestModel
{
    /**
     * @return string
     */
    public function getEndPointName()
    {
        return 'Balance';
    }

    /**
     * @return array
     */
    public function buildRequest()
    {
        return [];
    }

    /**
     * @return PrivateBalanceResponseModel
     */
    public function send()
    {
        return new PrivateBalanceResponseModel($this->callApi(ApiMethodAccessType::PRIVATE_METHOD), new ArrayFinder([]));
    }
}