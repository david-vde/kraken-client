<?php

namespace DVE\KrakenClient\Model\Response;

use Shudrum\Component\ArrayFinder\ArrayFinder;

class PrivateCancelOrderResponseModel extends ResponseModel
{
    /**
     * @var int
     */
    private $count = 0;

    /**
     * @var bool
     */
    private $pending;

    /**
     * Number of orders canceled
     *
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * If true, order(s) is/are pending cancellation
     *
     * @return boolean
     */
    public function isPending()
    {
        return $this->pending;
    }

    /**
     * @param ArrayFinder $results
     * @param ArrayFinder $params
     */
    protected function hydrate(ArrayFinder $results, ArrayFinder $params)
    {
        $this->count = (int)$results->get('result.count');
        $this->pending = $results->get('result.pending') ? true : false;
    }
}