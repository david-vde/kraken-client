<?php

namespace DVE\KrakenClient\Model\Response;

use Shudrum\Component\ArrayFinder\ArrayFinder;

class PrivateOpenOrdersResponseModel extends ResponseModel
{
    /**
     * @var PrivateOpenOrdersElementResponseModel[]
     */
    private $orders = [];

    /**
     * @return PrivateOpenOrdersElementResponseModel[]
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
        $elements = $results->get('result.open');

        if(is_array($elements)) {
            foreach($elements as $txid => $element) {
                $element['txid'] = $txid;

                $txElement = new PrivateOpenOrdersElementResponseModel(
                    new ArrayFinder($element),
                    new ArrayFinder([
                        'txid'  =>  $txid
                    ])
                );
                $this->orders[$txid] = $txElement;
            }
        }
    }
}