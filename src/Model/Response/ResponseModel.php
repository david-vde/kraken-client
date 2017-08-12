<?php

namespace DVE\KrakenClient\Model\Response;

use Shudrum\Component\ArrayFinder\ArrayFinder;

abstract class ResponseModel
{
    /**
     * Model constructor.
     * @param ArrayFinder $results
     */
    public function __construct(ArrayFinder $results)
    {
        $this->hydrate($results);
    }

    /**
     * @param ArrayFinder $results
     */
    abstract protected function hydrate(ArrayFinder $results);
}