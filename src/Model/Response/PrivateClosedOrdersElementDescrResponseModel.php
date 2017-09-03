<?php

namespace DVE\KrakenClient\Model\Response;

use Shudrum\Component\ArrayFinder\ArrayFinder;

class PrivateClosedOrdersElementDescrResponseModel extends ResponseModel
{
    /**
     * @var string
     */
    private $pair;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $ordertype;

    /**
     * @var float
     */
    private $price;

    /**
     * @var float
     */
    private $price2;

    /**
     * @var int
     */
    private $leverage;

    /**
     * @var string
     */
    private $order;

    /**
     * @return string
     */
    public function getPair()
    {
        return $this->pair;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getOrdertype()
    {
        return $this->ordertype;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return float
     */
    public function getPrice2()
    {
        return $this->price2;
    }

    /**
     * @return int
     */
    public function getLeverage()
    {
        return $this->leverage;
    }

    /**
     * @return string
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param ArrayFinder $results
     * @param ArrayFinder $params
     */
    protected function hydrate(ArrayFinder $results, ArrayFinder $params)
    {
        $leverage = $results->get('leverage');

        if($leverage === 'none') {
            $leverage = 0;
        }

        $this->pair = (string)$results->get('pair');
        $this->type = (string)$results->get('type');
        $this->ordertype = (string)$results->get('ordertype');
        $this->price = (float)$results->get('price');
        $this->price2 = (float)$results->get('price2');
        $this->leverage = (int)$leverage;
        $this->order = (string)$results->get('order');
    }
}