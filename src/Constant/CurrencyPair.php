<?php

namespace DVE\KrakenClient\Constant;

class CurrencyPair
{
    const BCHEUR   = 'BCH/EUR';
    const DASHEUR  = 'DASH/EUR';
    const DASHUSD  = 'DASH/USD';
    const DASHXBT  = 'DASH/XBT';
    const EOSETH   = 'EOS/ETH';
    const EOSEUR   = 'EOS/EUR';
    const EOSUSD   = 'EOS/USD';
    const EOSXBT   = 'EOS/XBT';
    const GNOETH   = 'GNO/ETH';
    const GNOEUR   = 'GNO/EUR';
    const GNOUSD   = 'GNO/USD';
    const GNOXBT   = 'GNO/XBT';
    const USDTZUSD = 'USDT/ZUSD';
    const XETCXETH = 'XETC/XETH';
    const XETCXXBT = 'XETC/XXBT';
    const XETCZEUR = 'XETC/ZEUR';
    const XETCXUSD = 'XETC/XUSD';
    const XETHXXBT = 'XETH/XXBT';
    const XETHZCAD = 'XETH/ZCAD';
    const XETHZEUR = 'XETH/ZEUR';
    const XETHZGBP = 'XETH/ZGBP';
    const XETHZJPY = 'XETH/ZJPY';
    const XETHZUSD = 'XETH/ZUSD';
    const XICNXETH = 'XICN/XETH';
    const XICNXXBT = 'XICN/XXBT';
    const XLTCXXBT = 'XLTC/XXBT';
    const XLTCZEUR = 'XLTC/ZEUR';
    const XLTCZUSD = 'XLTC/ZUSD';
    const XMLNXETH = 'XMLN/XETH';
    const XMLNXXBT = 'XMLN/XXBT';
    const XREPXETH = 'XREP/XETH';
    const XREPXXBT = 'XREP/XXBT';
    const XREPZEUR = 'XREP/ZEUR';
    const XREPZUSD = 'XREP/ZUSD';
    const XXBTZCAD = 'XXBT/ZCAD';
    const XXBTZEUR = 'XXBT/ZEUR';
    const XXBTZGBP = 'XXBT/ZGBP';
    const XXBTZJPY = 'XXBT/ZJPY';
    const XXBTZUSD = 'XXBT/ZUSD';
    const XXDGXXBT = 'XXDG/XXBT';
    const XXLMXXBT = 'XXLM/XXBT';
    const XXLMZEUR = 'XXLM/ZEUR';
    const XXLMZUSD = 'XXLM/ZUSD';
    const XXMRXXBT = 'XXMR/XXBT';
    const XXMRZEUR = 'XXMR/ZEUR';
    const XXMRZUSD = 'XXMR/ZUSD';
    const XXRPXXBT = 'XXRP/XXBT';
    const XXRPZCAD = 'XXRP/ZCAD';
    const XXRPZEUR = 'XXRP/ZEUR';
    const XXRPZJPY = 'XXRP/ZJPY';
    const XXRPZUSD = 'XXRP/ZUSD';
    const XZECXXBT = 'XZEC/XXBT';
    const XZECZEUR = 'XZEC/ZEUR';
    const XZECZUSD = 'XZEC/ZUSD';

    public static function getCurrencyPair($currencyPair)
    {
        return str_replace('/', '', $currencyPair);
    }

    public static function getPriceCurrency($currencyPair)
    {
        return substr($currencyPair, strlen($currencyPair)-4, 3);
    }

    public static function getCurrency1($currencyPair)
    {
        $array = explode('/', $currencyPair);
        return count($array) > 0 ? $currencyPair[0] : '';
    }

    public static function getCurrency2($currencyPair)
    {
        $array = explode('/', $currencyPair);
        return count($array) > 1 ? $currencyPair[1] : '';
    }
}