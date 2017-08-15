<?php

namespace DVE\KrakenClient\Model\Response;

use Shudrum\Component\ArrayFinder\ArrayFinder;

class PublicDepthResponseModel extends ResponseModel
{
    private $asks = [];
    private $bids = [];

    /**
     * @return PublicDepthAskResponseModel[]
     */
    public function getAsks()
    {
        return $this->asks;
    }

    /**
     * @return PublicDepthBidResponseModel[]
     */
    public function getBids()
    {
        return $this->bids;
    }

    /**
     * @param ArrayFinder $results
     * @param ArrayFinder $params
     */
    protected function hydrate(ArrayFinder $results, ArrayFinder $params)
    {
        $pair = $params->get('pair');

        if(!$pair) {
            throw new \InvalidArgumentException('Missing required param.');
        }

        $asks = $results->get('result.' . $pair . '.asks');
        $bids = $results->get('result.' . $pair . '.bids');

        $this->asks = $this->bids = [];

        foreach($asks as $ask) {
            $this->asks[] = new PublicDepthAskResponseModel(
                new ArrayFinder($ask),
                new ArrayFinder([])
            );
        }

        foreach($bids as $bid) {
            $this->bids[] = new PublicDepthBidResponseModel(
                new ArrayFinder($bid),
                new ArrayFinder([])
            );
        }
    }

}