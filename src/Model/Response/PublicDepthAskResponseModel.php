<?php

namespace DVE\KrakenClient\Model\Response;

use Shudrum\Component\ArrayFinder\ArrayFinder;

class PublicDepthAskResponseModel extends ResponseModel
{
    /**
     * @var float
     */
    private $price = 0.0;

    /**
     * @var float
     */
    private $volume = 0.0;

    /**
     * @var \DateTime
     */
    private $timestamp;

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return float
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param ArrayFinder $results
     * @param ArrayFinder $params
     */
    protected function hydrate(ArrayFinder $results, ArrayFinder $params)
    {
        $this->price = (float)$results->get('0');
        $this->volume = (float)$results->get('1');
        $this->timestamp = new \DateTime(date('c', $results->get('2')));
    }

}