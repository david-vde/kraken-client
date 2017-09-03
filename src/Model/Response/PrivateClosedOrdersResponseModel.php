<?php

namespace DVE\KrakenClient\Model\Response;

use Shudrum\Component\ArrayFinder\ArrayFinder;

class PrivateClosedOrdersResponseModel extends ResponseModel
{
    /**
     * @var PrivateOpenOrdersElementResponseModel[]
     */
    private $closed = [];

    /**
     * @var int
     */
    private $count;

    /**
     * @return PrivateClosedOrdersElementResponseModel[]
     */
    public function getClosed()
    {
        return $this->closed;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param ArrayFinder $results
     * @param ArrayFinder $params
     */
    protected function hydrate(ArrayFinder $results, ArrayFinder $params)
    {
        $elements = $results->get('result.closed');
        $this->count = (int)$results->get('result.count');

        if(is_array($elements)) {
            foreach($elements as $txid => $element) {
                $element['txid'] = $txid;

                $txElement = new PrivateClosedOrdersElementResponseModel(
                    new ArrayFinder($element),
                    new ArrayFinder([
                        'txid'  =>  $txid
                    ])
                );
                $this->closed[$txid] = $txElement;
            }
        }
    }
}