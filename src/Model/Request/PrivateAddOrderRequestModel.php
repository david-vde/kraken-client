<?php

namespace DVE\KrakenClient\Model\Request;

use DVE\KrakenClient\Constant\ApiMethodAccessType;
use DVE\KrakenClient\Constant\OrderType;
use DVE\KrakenClient\Model\Response\PrivateAddOrderResponseModel;
use Shudrum\Component\ArrayFinder\ArrayFinder;

class PrivateAddOrderRequestModel extends RequestModel
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
     * @var float
     */
    private $volume;

    /**
     * @var int
     */
    private $leverage;

    /**
     * @var array
     */
    private $oflags = [];

    /**
     * @var \DateTime|int|string
     */
    private $starttm;

    /**
     * @var \DateTime|int|string
     */
    private $expiretm;

    /**
     * @var int
     */
    private $userref;

    /**
     * @var bool
     */
    private $validate;

    /**
     * @var string
     */
    private $closeOrderType;

    /**
     * @var float
     */
    private $closePrice;

    /**
     * @var float
     */
    private $closePrice2;

    /**
     * Asset pair
     *
     * @param string $pair
     * @return PrivateAddOrderRequestModel
     */
    public function setPair($pair)
    {
        $this->pair = $pair;
        return $this;
    }

    /**
     * Type of order (buy/sell)
     *
     * @param string $type
     * @return PrivateAddOrderRequestModel
     * @see \DVE\KrakenClient\Constant\Type
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Order type
     *
     * @param string $ordertype
     * @return PrivateAddOrderRequestModel
     * @see \DVE\KrakenClient\Constant\OrderType
     */
    public function setOrderType($ordertype)
    {
        $this->ordertype = $ordertype;
        return $this;
    }

    /**
     * Price (optional.  dependent upon ordertype)
     *
     * @param float $price
     * @return PrivateAddOrderRequestModel
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Secondary price (optional.  dependent upon ordertype)
     *
     * @param float $price2
     * @return PrivateAddOrderRequestModel
     */
    public function setPrice2($price2)
    {
        $this->price2 = $price2;
        return $this;
    }

    /**
     * Order volume in lots
     *
     * @param float $volume
     * @return PrivateAddOrderRequestModel
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
        return $this;
    }

    /**
     * Amount of leverage desired (optional.  default = none)
     *
     * @param int $leverage
     * @return PrivateAddOrderRequestModel
     */
    public function setLeverage($leverage)
    {
        $this->leverage = $leverage;
        return $this;
    }

    /**
     * Comma delimited list of order flags (optional):
     *
     * @param array $oflags
     * @return PrivateAddOrderRequestModel
     * @see \DVE\KrakenClient\Constant\OFlags
     */
    public function setOrderflags(array $oflags)
    {
        $this->oflags = $oflags;
        return $this;
    }

    /**
     * Scheduled start time (optional):
     *      0 = now (default)
     *      +<n> = schedule start time <n> seconds from now
     *      <n> = unix timestamp of start time
     *
     * @param \DateTime|int|string $starttm
     * @return PrivateAddOrderRequestModel
     */
    public function setStartTime($starttm)
    {
        $this->starttm = $starttm;
        return $this;
    }

    /**
     * Expiration time (optional):
     *      0 = no expiration (default)
     *      +<n> = expire <n> seconds from now
     *      <n> = unix timestamp of expiration time
     *
     * @param \DateTime|int|string $expiretm
     * @return PrivateAddOrderRequestModel
     */
    public function setExpireTime($expiretm)
    {
        $this->expiretm = $expiretm;
        return $this;
    }

    /**
     * User reference id.  32-bit signed number.  (optional)
     *
     * @param int $userref
     * @return PrivateAddOrderRequestModel
     */
    public function setUserRef($userref)
    {
        $this->userref = $userref;
        return $this;
    }

    /**
     * Validate inputs only.  do not submit order (optional)
     *
     * @param boolean $validate
     * @return PrivateAddOrderRequestModel
     */
    public function setValidate($validate)
    {
        $this->validate = $validate;
        return $this;
    }

    /**
     * Closing order type to add to system when order gets filled.
     *
     * @param string $closeOrderType
     * @return PrivateAddOrderRequestModel
     * @see \DVE\KrakenClient\Constant\OrderType
     */
    public function setCloseOrderType($closeOrderType)
    {
        $this->closeOrderType = $closeOrderType;
        return $this;
    }

    /**
     * Closing price to add to system when order gets filled.
     *
     * @param float $closePrice
     * @return PrivateAddOrderRequestModel
     */
    public function setClosePrice($closePrice)
    {
        $this->closePrice = $closePrice;
        return $this;
    }

    /**
     * Closing price2 to add to system when order gets filled.
     *
     * @param float $closePrice2
     * @return PrivateAddOrderRequestModel
     */
    public function setClosePrice2($closePrice2)
    {
        $this->closePrice2 = $closePrice2;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndPointName()
    {
        return 'AddOrder';
    }

    /**
     * @return array
     */
    public function buildRequest()
    {
        // Mandatory
        $requestData = [
            'pair'  =>  $this->pair,
            'type'  =>  $this->type,
            'ordertype'  =>  $this->ordertype,
            'volume'  =>  $this->volume
        ];

        // Conditional mandatory
        if(OrderType::isPriceRequired($this->ordertype)) {
            $requestData['price'] = $this->price;
        }

        if(OrderType::isPrice2Required($this->ordertype)) {
            $requestData['price2'] = $this->price2;
        }

        // Optionals
        if(!is_null($this->leverage)) {
            $requestData['leverage'] = $this->leverage;
        }

        if(count($this->oflags) > 0) {
            $requestData['oflags'] = implode(',', $this->oflags);
        }

        if(!is_null($this->starttm)) {
            $requestData['starttm'] = $this->formatOrderTime($this->starttm);
        }

        if(!is_null($this->expiretm)) {
            $requestData['expiretm'] = $this->formatOrderTime($this->expiretm);
        }

        if(!is_null($this->userref)) {
            $requestData['userref'] = $this->userref;
        }

        if($this->validate) {
            $requestData['validate'] = 1;
        }

        // Close order
        if(!is_null($this->closeOrderType)) {
            $requestData['close'] = [];
            $requestData['close']['orderype'] = $this->closeOrderType;

            if(OrderType::isPriceRequired($this->closeOrderType)) {
                $requestData['close']['price'] = $this->closePrice;
            }

            if(OrderType::isPric2Required($this->closeOrderType)) {
                $requestData['close']['price2'] = $this->closePrice2;
            }
        }

        return $requestData;
    }

    public function send()
    {
        return new PrivateAddOrderResponseModel($this->callApi(ApiMethodAccessType::PRIVATE_METHOD), new ArrayFinder([
            'pair' => strtoupper($this->pair)
        ]));
    }
    /**
     * @param mixed $rawValue
     * @return string|int
     */
    private function formatOrderTime($rawValue)
    {
        if(is_object($rawValue) && get_class($rawValue) === '\DateTime') {
            /** @var \DateTime $dateTime */
            $dateTime = $rawValue;
            return $dateTime->getTimestamp();
        } elseif(is_string($rawValue)) {
            return $rawValue;
        } else {
            return (int)$rawValue;
        }
    }
}