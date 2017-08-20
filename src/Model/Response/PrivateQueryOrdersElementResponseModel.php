<?php

namespace DVE\KrakenClient\Model\Response;

use Shudrum\Component\ArrayFinder\ArrayFinder;

class PrivateQueryOrdersElementResponseModel extends ResponseModel
{
    /**
     * @var string
     */
    private $txid;

    /**
     * @var string
     */
    private $refid;

    /**
     * @var int
     */
    private $userref;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $opentm;

    /**
     * @var \DateTime
     */
    private $starttm;

    /**
     * @var \DateTime
     */
    private $expiretm;

    /**
     * @var PrivateAddOrderDescrResponseModel
     */
    private $descr;

    /**
     * @var float
     */
    private $vol;

    /**
     * @var float
     */
    private $vol_exec;

    /**
     * @var float
     */
    private $cost;

    /**
     * @var float
     */
    private $fee;

    /**
     * @var float
     */
    private $price;

    /**
     * @var float
     */
    private $stopprice;

    /**
     * @var float
     */
    private $limitprice;

    /**
     * @var string[]
     */
    private $misc;

    /**
     * @var string[]
     */
    private $oflags;

    /**
     * @var string[]
     */
    private $trades;

    /**
     * @return string
     */
    public function getTxid()
    {
        return $this->txid;
    }

    /**
     * @return string
     */
    public function getRefid()
    {
        return $this->refid;
    }

    /**
     * @return int
     */
    public function getUserref()
    {
        return $this->userref;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return \DateTime
     */
    public function getOpentm()
    {
        return $this->opentm;
    }

    /**
     * @return \DateTime
     */
    public function getStarttm()
    {
        return $this->starttm;
    }

    /**
     * @return \DateTime
     */
    public function getExpiretm()
    {
        return $this->expiretm;
    }

    /**
     * @return PrivateAddOrderDescrResponseModel
     */
    public function getDescr()
    {
        return $this->descr;
    }

    /**
     * @return float
     */
    public function getVol()
    {
        return $this->vol;
    }

    /**
     * @return float
     */
    public function getVolExec()
    {
        return $this->vol_exec;
    }

    /**
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @return float
     */
    public function getFee()
    {
        return $this->fee;
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
    public function getStopprice()
    {
        return $this->stopprice;
    }

    /**
     * @return float
     */
    public function getLimitprice()
    {
        return $this->limitprice;
    }

    /**
     * @return string[]
     */
    public function getMisc()
    {
        return $this->misc;
    }

    /**
     * @return string[]
     */
    public function getOflags()
    {
        return $this->oflags;
    }

    /**
     * @return string[]
     */
    public function getTrades()
    {
        return $this->trades;
    }

    /**
     * @param ArrayFinder $results
     * @param ArrayFinder $params
     */
    protected function hydrate(ArrayFinder $results, ArrayFinder $params)
    {
        $opentm = (int)$results->get('opentm');
        $starttm = (int)$results->get('starttm');
        $expiretm = (int)$results->get('expiretm');

        $this->txid = $params->get('txid');
        $this->refid = (string)$results->get('refid');
        $this->userref = (int)$results->get('userref');
        $this->status = (string)$results->get('status');
        $this->opentm = $opentm > 0 ? new \DateTime(date('c', $opentm)) : null;
        $this->starttm = $starttm > 0 ? new \DateTime(date('c', $starttm)) : null;
        $this->expiretm = $expiretm > 0 ? new \DateTime(date('c', $expiretm)) : null;

        $this->descr = new PrivateQueryOrdersElementDescrResponseModel(
            new ArrayFinder($results->get('descr')),
            new ArrayFinder([])
        );

        $this->vol = (float)$results->get('vol');
        $this->vol_exec = (float)$results->get('vol_exec');
        $this->cost = (float)$results->get('cost');
        $this->fee = (float)$results->get('fee');
        $this->price = (float)$results->get('price');
        $this->stopprice = (float)$results->get('stopprice');
        $this->limitprice = (float)$results->get('limitprice');
        $this->misc = explode(',', $results->get('misc'));
        $this->oflags = explode(',', $results->get('oflags'));
        $this->trades = $results->get('trades');
   }
}