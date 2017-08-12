<?php

namespace DVE\KrakenClient\Model\Response;

use Shudrum\Component\ArrayFinder\ArrayFinder;

class PrivateAddOrderDescrResponseModel extends ResponseModel
{
    /**
     * @var string
     */
    private $order;

    /**
     * @var string
     */
    private $close;

    /**
     * @return string
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return string
     */
    public function getClose()
    {
        return $this->close;
    }

    /**
     * @param ArrayFinder $results
     * @param ArrayFinder $params
     */
    protected function hydrate(ArrayFinder $results, ArrayFinder $params)
    {
        $this->order = $results->get('order');
        $this->close = $results->get('close');
    }

}