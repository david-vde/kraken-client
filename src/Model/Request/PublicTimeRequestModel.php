<?php

namespace DVE\KrakenClient\Model\Request;

use DVE\KrakenClient\Model\Response\PublicTimeResponseModel;

class PublicTimeRequestModel extends RequestModel
{
    /**
     * @return string
     */
    public function getEndPointName()
    {
        return 'Time';
    }

    /**
     * @return array
     */
    public function buildRequest()
    {
        return [];
    }

    /**
     * @return PublicTimeResponseModel
     */
    public function send()
    {
        return new PublicTimeResponseModel($this->callApi());
    }

}