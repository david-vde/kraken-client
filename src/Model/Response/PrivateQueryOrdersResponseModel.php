<?php

namespace DVE\KrakenClient\Model\Response;

use Shudrum\Component\ArrayFinder\ArrayFinder;

class PrivateQueryOrdersResponseModel extends ResponseModel
{
    /**
     * @var PrivateQueryOrdersElementResponseModel[]
     */
    private $orders = [];

    /**
     * @return PrivateQueryOrdersElementResponseModel[]
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param ArrayFinder $results
     * @param ArrayFinder $params
     */
    protected function hydrate(ArrayFinder $results, ArrayFinder $params)
    {
        $elements = $results->get('result');

        foreach($elements as $txid => $element) {
            $element['txid'] = $txid;

            $txElement = new PrivateQueryOrdersElementResponseModel(
                new ArrayFinder($element),
                new ArrayFinder([
                    'txid'  =>  $txid
                ])
            );
            $this->orders[$txid] = $txElement;
        }
    }
}