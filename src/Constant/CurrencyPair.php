<?php

namespace DVE\KrakenClient\Constant;

class CurrencyPair
{
    const BCHEUR   = 'BCHEUR';
    const DASHEUR  = 'DASHEUR';
    const DASHUSD  = 'DASHUSD';
    const DASHXBT  = 'DASHXBT';
    const EOSETH   = 'EOSETH';
    const EOSEUR   = 'EOSEUR';
    const EOSUSD   = 'EOSUSD';
    const EOSXBT   = 'EOSXBT';
    const GNOETH   = 'GNOETH';
    const GNOEUR   = 'GNOEUR';
    const GNOUSD   = 'GNOUSD';
    const GNOXBT   = 'GNOXBT';
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
    const XXLMZEUR = 'XXLMZEUR';
    const XXLMZUSD = 'XXLMZUSD';
    const XXMRXXBT = 'XXMRXXBT';
    const XXMRZEUR = 'XXMRZEUR';
    const XXMRZUSD = 'XXMRZUSD';
    const XXRPXXBT = 'XXRPXXBT';
    const XXRPZCAD = 'XXRPZCAD';
    const XXRPZEUR = 'XXRPZEUR';
    const XXRPZJPY = 'XXRPZJPY';
    const XXRPZUSD = 'XXRPZUSD';
    const XZECXXBT = 'XZECXXBT';
    const XZECZEUR = 'XZECZEUR';
    const XZECZUSD = 'XZECZUSD';

    public static function getPriceCurrency($currencyPair)
    {
        return substr($currencyPair, strlen($currencyPair)-4, 3);
    }
}