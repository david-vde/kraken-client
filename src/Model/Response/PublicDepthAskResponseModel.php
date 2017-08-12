<?php

namespace DVE\KrakenClient\Model\Response;

use Shudrum\Component\ArrayFinder\ArrayFinder;

class PublicDepthResponseModel extends ResponseModel
{
    private $asks = [];
    private $bids = [];

    /**
     * @return array
     */
    public function getAsks()
    {
        return $this->asks;
    }

    /**
     * @return array
     */
    public function getBids()
    {
        return $this->bids;
    }

    /**
     * @param ArrayFinder $results
     */
    protected function hydrate(ArrayFinder $results)
    {
        $this->unixtime = $results->get('result.unixtime');
        $this->rfc1123 = $results->get('result.rfc1123');
    }

}