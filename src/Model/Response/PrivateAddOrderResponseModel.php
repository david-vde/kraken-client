<?php

namespace DVE\KrakenClient\Model\Response;

use Shudrum\Component\ArrayFinder\ArrayFinder;

class PrivateAddOrderResponseModel extends ResponseModel
{
    /**
     * @var array
     */
    private $descr = [];

    /**
     * @var string[]
     */
    private $txid;

    /**
     * @return PrivateAddOrderDescrResponseModel
     */
    public function getDescr()
    {
        return $this->descr;
    }

    /**
     * @return string[]
     */
    public function getTransactionIDs()
    {
        return $this->txid;
    }

    /**
     * @param ArrayFinder $results
     * @param ArrayFinder $params
     */
    protected function hydrate(ArrayFinder $results, ArrayFinder $params)
    {
        $descr = $results->get('result.descr');

        if(!is_array($descr)) {
            $descr = [];
        }

        $this->descr = new PrivateAddOrderDescrResponseModel(
            new ArrayFinder($descr),
            new ArrayFinder([])
        );

        $this->txid = $results->get('result.txid');
    }

}