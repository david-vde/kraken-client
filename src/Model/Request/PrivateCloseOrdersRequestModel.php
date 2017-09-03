<?php

namespace DVE\KrakenClient\Model\Request;

use DVE\KrakenClient\Constant\ApiMethodAccessType;
use DVE\KrakenClient\Constant\CloseTime;
use DVE\KrakenClient\Model\Response\PrivateClosedOrdersResponseModel;
use Shudrum\Component\ArrayFinder\ArrayFinder;

class PrivateCloseOrdersRequestModel extends RequestModel
{
    /**
     * @var bool
     */
    private $trades;

    /**
     * @var int
     */
    private $userref;

    /**
     * @var \DateTime
     */
    private $start;

    /**
     * @var \DateTime
     */
    private $end;

    /**
     * @var int
     */
    private $ofs = 0;

    /**
     * @var
     */
    private $closeTime = CloseTime::BOTH;


    /**
     * @param bool $trades
     * @return PrivateQueryOrdersRequestModel
     */
    public function setTrades($trades)
    {
        $this->trades = (bool)$trades;
        return $this;
    }

    /**
     * @param int $userref
     * @return PrivateQueryOrdersRequestModel
     */
    public function setUserRef($userref)
    {
        $this->userref = $userref;
        return $this;
    }

    /**
     * @param \DateTime $start
     * @return PrivateCloseOrdersRequestModel
     */
    public function setStart($start)
    {
        $this->start = $start;
        return $this;
    }

    /**
     * @param \DateTime $end
     * @return PrivateCloseOrdersRequestModel
     */
    public function setEnd($end)
    {
        $this->end = $end;
        return $this;
    }

    /**
     * @param int $ofs
     * @return PrivateCloseOrdersRequestModel
     */
    public function setOfs($ofs)
    {
        $this->ofs = (int)$ofs;
        return $this;
    }

    /**
     * @param string $closeTime
     * @return PrivateCloseOrdersRequestModel
     */
    public function setCloseTime($closeTime)
    {
        $this->closeTime = (string)$closeTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndPointName()
    {
        return 'ClosedOrders';
    }

    /**
     * @return array
     */
    public function buildRequest()
    {
        $requestData = [
            'ofs' => $this->ofs
        ];

        if($this->closeTime) {
            $requestData['closetime'] = $this->closeTime;
        }

        if($this->start) {
            $requestData['start'] = $this->start->getTimestamp();
        }

        if($this->end) {
            $requestData['end'] = $this->end->getTimestamp();
        }

        if($this->trades) {
            $requestData['trades'] = $this->trades;
        }

        if($this->userref) {
            $requestData['userref'] = $this->userref;
        }

        return $requestData;
    }

    public function send()
    {
        return new PrivateClosedOrdersResponseModel(
            $this->callApi(ApiMethodAccessType::PRIVATE_METHOD),
            new ArrayFinder([])
        );
    }
}