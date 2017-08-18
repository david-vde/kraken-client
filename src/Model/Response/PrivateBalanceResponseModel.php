<?php

namespace DVE\KrakenClient\Model\Response;

use Shudrum\Component\ArrayFinder\ArrayFinder;

class PrivateBalanceResponseModel extends ResponseModel
{
    private $balances;

    /**
     * @return mixed
     */
    public function getBalances()
    {
        return $this->balances;
    }

    /**
     * @param $currency
     * @return float
     */
    public function getBalance($currency)
    {
        if(array_key_exists($currency, $this->balances)) {
            return (float)$this->balances[$currency];
        } else {
            return 0.0;
        }
    }

    /**
     * @param ArrayFinder $results
     * @param ArrayFinder $params
     */
    protected function hydrate(ArrayFinder $results, ArrayFinder $params)
    {
        $this->balances = $results->get('result');
    }

}