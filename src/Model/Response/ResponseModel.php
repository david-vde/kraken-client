<?php

namespace DVE\KrakenClient\Model\Response;

use Shudrum\Component\ArrayFinder\ArrayFinder;

abstract class ResponseModel
{
    /**
     * @var string[]
     */
    protected $error = [];

    /**
     * Model constructor.
     * @param ArrayFinder $results
     * @param ArrayFinder $params
     */
    public function __construct(ArrayFinder $results, ArrayFinder $params)
    {
        $errors = $results->get('error');
        $this->error = is_array($errors) ? $errors : [];
        $this->hydrate($results, $params);
    }

    /**
     * @return string[]
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param ArrayFinder $results
     * @param ArrayFinder $params
     */
    abstract protected function hydrate(ArrayFinder $results, ArrayFinder $params);
}