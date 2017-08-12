<?php

namespace DVE\KrakenClient\Model\Request;

use DVE\KrakenClient\Model\Response\PublicTimeResponseModel;

class PublicDepthRequestModel extends RequestModel
{
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