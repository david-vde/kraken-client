<?php

namespace DVE\KrakenClient\Constant;

class CurrencyPair
{
    const LTCEUR   = 'LTCEUR';
    const BTCEUR   = 'BTCEUR';
    const XBTEUR   = 'XBTEUR';
    const ETHEUR   = 'ETHEUR';
    const XMREUR   = 'XMREUR';
    const BCHEUR   = 'BCHEUR';
    const DASHEUR  = 'DASHEUR';
    const DASHUSD  = 'DASHUSD';
    const DASHXBT  = 'DASHXBT';
    const EOSETH   = 'EOSETH';
    const EOSXBT   = 'EOSXBT';
    const GNOETH   = 'GNOETH';
    const GNOXBT   = 'GNOXBT';
    const ZECEUR   = 'ZECEUR';
    const ZECUSD   = 'ZECUSD';
    const USDTZUSD = 'USDTZUSD';
    const XETCXETH = 'XETCXETH';
    const XETCXXBT = 'XETCXXBT';
    const XETCZEUR = 'XETCZEUR';
    const XETCXUSD = 'XETCXUSD';
    const XETHXXBT = 'XETHXXBT';
    const XETHZCAD = 'XETHZCAD';
    const XETHZEUR = 'XETHZEUR';
    const XETHZGBP = 'XETHZGBP';
    const XETHZJPY = 'XETHZJPY';
    const XETHZUSD = 'XETHZUSD';
    const XICNXETH = 'XICNXETH';
    const XICNXXBT = 'XICNXXBT';
    const XLTCXXBT = 'XLTCXXBT';
    const XLTCZEUR = 'XLTCZEUR';
    const XLTCZUSD = 'XLTCZUSD';
    const XMLNXETH = 'XMLNXETH';
    const XMLNXXBT = 'XMLNXXBT';
    const XREPXETH = 'XREPXETH';
    const XREPXXBT = 'XREPXXBT';
    const XREPZEUR = 'XREPZEUR';
    const XREPZUSD = 'XREPZUSD';
    const XXBTZCAD = 'XXBTZCAD';
    const XXBTZEUR = 'XXBTZEUR';
    const XXBTZGBP = 'XXBTZGBP';
    const XXBTZJPY = 'XXBTZJPY';
    const XXBTZUSD = 'XXBTZUSD';
    const XXDGXXBT = 'XXDGXXBT';
    const XXLMXXBT = 'XXLMXXBT';
    const XXMRXXBT = 'XXMRXXBT';
    const XXMRZEUR = 'XXMRZEUR';
    const XXMRZUSD = 'XXMRZUSD';
    const XXRPXXBT = 'XXRPXXBT';
    const XXRPZEUR = 'XXRPZEUR';
    const XXRPZUSD = 'XXRPZUSD';
    const XZECXXBT = 'XZECXXBT';
    const XZECZEUR = 'XZECZEUR';
    const XZECZUSD = 'XZECZUSD';

    private static $quoteCurrenciesByPair = [
        self::LTCEUR   => 'ZEUR',
        self::BTCEUR   => 'ZEUR',
        self::XBTEUR   => 'ZEUR',
        self::ETHEUR   => 'ZEUR',
        self::XMREUR   => 'ZEUR',
        self::BCHEUR   => 'EUR',
        self::DASHEUR  => 'EUR',
        self::DASHUSD  => 'USD',
        self::DASHXBT  => 'XBT',
        self::EOSETH   => 'ETH',
        self::EOSXBT   => 'XBT',
        self::GNOETH   => 'ETH',
        self::GNOXBT   => 'XBT',
        self::ZECEUR   => 'EUR',
        self::ZECUSD   => 'USD',
        self::USDTZUSD => 'ZUSD',
        self::XETCXETH => 'XETH',
        self::XETCXXBT => 'XXBT',
        self::XETCZEUR => 'ZEUR',
        self::XETCXUSD => 'XUSD',
        self::XETHXXBT => 'XXBT',
        self::XETHZCAD => 'ZCAD',
        self::XETHZEUR => 'ZEUR',
        self::XETHZGBP => 'ZGBP',
        self::XETHZJPY => 'ZJPY',
        self::XETHZUSD => 'ZUSD',
        self::XICNXETH => 'XETH',
        self::XICNXXBT => 'XXBT',
        self::XLTCXXBT => 'XXBT',
        self::XLTCZEUR => 'ZEUR',
        self::XLTCZUSD => 'ZUSD',
        self::XMLNXETH => 'XETH',
        self::XMLNXXBT => 'XXBT',
        self::XREPXETH => 'XETH',
        self::XREPXXBT => 'XXBT',
        self::XREPZEUR => 'ZEUR',
        self::XREPZUSD => 'ZUSD',
        self::XXBTZCAD => 'ZCAD',
        self::XXBTZEUR => 'ZEUR',
        self::XXBTZGBP => 'ZGBP',
        self::XXBTZJPY => 'ZJPY',
        self::XXBTZUSD => 'ZUSD',
        self::XXDGXXBT => 'XXBT',
        self::XXLMXXBT => 'XXBT',
        self::XXMRXXBT => 'XXBT',
        self::XXMRZEUR => 'ZEUR',
        self::XXMRZUSD => 'ZUSD',
        self::XXRPXXBT => 'XXBT',
        self::XXRPZEUR => 'ZEUR',
        self::XXRPZUSD => 'ZUSD',
        self::XZECXXBT => 'XXBT',
        self::XZECZEUR => 'ZEUR',
        self::XZECZUSD => 'ZUSD'
    ];

    private static $baseCurrenciesByPair = [
        self::LTCEUR   => 'XLTC',
        self::BTCEUR   => 'XXBT',
        self::XBTEUR   => 'XXBT',
        self::ETHEUR   => 'XETH',
        self::XMREUR   => 'XXMR',
        self::BCHEUR   => 'BCH',
        self::DASHEUR  => 'DASH',
        self::DASHUSD  => 'DASH',
        self::DASHXBT  => 'DASH',
        self::EOSETH   => 'EOS',
        self::EOSXBT   => 'EOS',
        self::GNOETH   => 'GNO',
        self::GNOXBT   => 'GNO',
        self::ZECEUR   => 'ZEC',
        self::ZECUSD   => 'ZEC',
        self::USDTZUSD => 'USDT',
        self::XETCXETH => 'XETC',
        self::XETCXXBT => 'XETC',
        self::XETCZEUR => 'XETC',
        self::XETCXUSD => 'XETC',
        self::XETHXXBT => 'XETH',
        self::XETHZCAD => 'XETH',
        self::XETHZEUR => 'XETH',
        self::XETHZGBP => 'XETH',
        self::XETHZJPY => 'XETH',
        self::XETHZUSD => 'XETH',
        self::XICNXETH => 'XICN',
        self::XICNXXBT => 'XICN',
        self::XLTCXXBT => 'XLTC',
        self::XLTCZEUR => 'XLTC',
        self::XLTCZUSD => 'XLTC',
        self::XMLNXETH => 'XMLN',
        self::XMLNXXBT => 'XMLN',
        self::XREPXETH => 'XREP',
        self::XREPXXBT => 'XREP',
        self::XREPZEUR => 'XREP',
        self::XREPZUSD => 'XREP',
        self::XXBTZCAD => 'XXBT',
        self::XXBTZEUR => 'XXBT',
        self::XXBTZGBP => 'XXBT',
        self::XXBTZJPY => 'XXBT',
        self::XXBTZUSD => 'XXBT',
        self::XXDGXXBT => 'XXDG',
        self::XXLMXXBT => 'XXLM',
        self::XXMRXXBT => 'XXMR',
        self::XXMRZEUR => 'XXMR',
        self::XXMRZUSD => 'XXMR',
        self::XXRPXXBT => 'XXRP',
        self::XXRPZEUR => 'XXRP',
        self::XXRPZUSD => 'XXRP',
        self::XZECXXBT => 'XZEC',
        self::XZECZEUR => 'XZEC',
        self::XZECZUSD => 'XZEC'
    ];

    private static $pricePrecisionByPair = [
        self::LTCEUR   =>   4,
        self::BTCEUR   =>   2,
        self::XBTEUR   =>   2,
        self::ETHEUR   =>   3,
        self::XMREUR   =>   4,
        self::BCHEUR   =>   3,
        self::DASHEUR  =>   3,
        self::DASHUSD  =>   3,
        self::DASHXBT  =>   6,
        self::EOSETH   =>   6,
        self::EOSXBT   =>   6,
        self::GNOETH   =>   6,
        self::GNOXBT   =>   6,
        self::ZECEUR   =>   3,
        self::ZECUSD   =>   3,
        self::USDTZUSD =>   4,
        self::XETCXETH =>   6,
        self::XETCXXBT =>   6,
        self::XETCZEUR =>   4,
        self::XETCXUSD =>   4,
        self::XETHXXBT =>   6,
        self::XETHZCAD =>   3,
        self::XETHZEUR =>   3,
        self::XETHZGBP =>   3,
        self::XETHZJPY =>   1,
        self::XETHZUSD =>   3,
        self::XICNXETH =>   6,
        self::XICNXXBT =>   6,
        self::XLTCXXBT =>   6,
        self::XLTCZEUR =>   4,
        self::XLTCZUSD =>   4,
        self::XMLNXETH =>   6,
        self::XMLNXXBT =>   6,
        self::XREPXETH =>   6,
        self::XREPXXBT =>   6,
        self::XREPZEUR =>   6,
        self::XREPZUSD =>   6,
        self::XXBTZCAD =>   2,
        self::XXBTZEUR =>   2,
        self::XXBTZGBP =>   2,
        self::XXBTZJPY =>   0,
        self::XXBTZUSD =>   2,
        self::XXDGXXBT =>   8,
        self::XXLMXXBT =>   7,
        self::XXMRXXBT =>   6,
        self::XXMRZEUR =>   4,
        self::XXMRZUSD =>   4,
        self::XXRPXXBT =>   6,
        self::XXRPZEUR =>   6,
        self::XXRPZUSD =>   6,
        self::XZECXXBT =>   6,
        self::XZECZEUR =>   3,
        self::XZECZUSD =>   3
    ];

    public function getPricePrecision($pair)
    {
        if(array_key_exists($pair, self::$pricePrecisionByPair)) {
            return self::$pricePrecisionByPair[$pair];
        }
        throw new \InvalidArgumentException('Pair "' . $pair . '" is not supported');
    }


    public static function getBaseCurrency($pair)
    {
        if(array_key_exists($pair, self::$baseCurrenciesByPair)) {
            return self::$baseCurrenciesByPair[$pair];
        }
        throw new \InvalidArgumentException('Pair "' . $pair . '" is not supported');
    }

    public static function getQuoteCurrency($pair)
    {
        if(array_key_exists($pair, self::$quoteCurrenciesByPair)) {
            return self::$quoteCurrenciesByPair[$pair];
        }
        throw new \InvalidArgumentException('Pair "' . $pair . '" is not supported');
    }
}