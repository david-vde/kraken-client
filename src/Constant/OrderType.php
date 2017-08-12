<?php

namespace DVE\KrakenClient\Constant;

class OrderType
{
    const MARKET = 'market';
    const LIMIT = 'limit';
    const STOP_LOSS = 'stop-loss';
    const STOP_LOSS_PROFIT = 'stop-loss-profit';
    const STOP_LOSS_PROFIT_LIMIT = 'stop-loss-profit-limit';
    const STOP_LOSS_LIMIT = 'stop-loss-limit';
    const STOP_LOSS_AND_LIMIT = 'stop-loss-and-limit';
    const TAKE_PROFIT = 'take-profit';
    const TAKE_PROFIT_LIMIT = 'take-profit-limit';
    const TRAILING_STOP = 'trailing-stop';
    const TRAILING_STOP_LIMIT = 'trailing-stop-limit';
    const SETTLE_POSITION = 'settle-position';

    public static function isPriceRequired($orderType)
    {
        return in_array($orderType, [
            self::LIMIT,
            self::STOP_LOSS,
            self::STOP_LOSS_PROFIT,
            self::STOP_LOSS_PROFIT_LIMIT,
            self::STOP_LOSS_LIMIT,
            self::STOP_LOSS_AND_LIMIT,
            self::TAKE_PROFIT,
            self::TAKE_PROFIT_LIMIT,
            self::TRAILING_STOP,
            self::TRAILING_STOP_LIMIT
        ]);
    }

    public static function isPrice2Required($orderType)
    {
        return in_array($orderType, [
            self::STOP_LOSS_PROFIT,
            self::STOP_LOSS_PROFIT_LIMIT,
            self::STOP_LOSS_LIMIT,
            self::STOP_LOSS_AND_LIMIT,
            self::TAKE_PROFIT_LIMIT,
            self::TRAILING_STOP_LIMIT
        ]);
    }
}
