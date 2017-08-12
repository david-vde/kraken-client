<?php

namespace DVE\KrakenClient\Model\Request;

use DVE\KrakenClient\Model\Response\PublicDepthResponseModel;
use Shudrum\Component\ArrayFinder\ArrayFinder;

class PublicDepthRequestModel extends RequestModel
{
    /**
     * @var string
     */
    private $pair;

    /**
     * @var int
     */
    private $count;

    /**
     * @param string $pair
     * @return PublicDepthRequestModel
     */
    public function setPair($pair)
    {
        $this->pair = (string)$pair;
        return $this;
    }

    /**
     * @param int $count
     * @return PublicDepthRequestModel
     */
    public function setCount($count)
    {
        $this->count = (int)$count;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndPointName()
    {
        return 'Depth';
    }

    /**
     * @return array
     */
    public function buildRequest()
    {
        // Mandatory
        $requestData = [
            'pair'  =>  $this->pair
        ];

        // Optionals
        if($this->count) $requestData['count'] = $this->count;

        return $requestData;
    }

    /**
     * @return PublicDepthResponseModel
     */
    public function send()
    {
        return new PublicDepthResponseModel($this->callApi(), new ArrayFinder([
            'pair' => strtoupper($this->pair)
        ]));
    }

}