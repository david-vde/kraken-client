<?php

namespace DVE\KrakenClient\Model\Response;

use Shudrum\Component\ArrayFinder\ArrayFinder;

class PublicDepthAskResponseModel extends ResponseModel
{
    private $price = 0;

    /**
     * @var float
     */
    private $volume = 0.0;

    /**
     * @var \DateTime
     */
    private $timestamp;


    /**
     * @param ArrayFinder $results
     * @param ArrayFinder $params
     */
    protected function hydrate(ArrayFinder $results, ArrayFinder $params)
    {
        $this->price = $results->get('0');
        $this->volume = $results->get('1');
        $this->timestamp = new \DateTime(date('c', $results->get('2')));
    }

}