<?php

namespace DVE\KrakenClient\Model\Response;

use Shudrum\Component\ArrayFinder\ArrayFinder;

abstract class ResponseModel
{
    /**
     * Model constructor.
     * @param ArrayFinder $results
     * @param ArrayFinder $params
     */
    public function __construct(ArrayFinder $results, ArrayFinder $params)
    {
        $this->hydrate($results, $params);
    }

    /**
     * @param ArrayFinder $results
     * @param ArrayFinder $params
     * @return
     */
    abstract protected function hydrate(ArrayFinder $results, ArrayFinder $params);
}