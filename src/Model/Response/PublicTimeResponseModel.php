<?php

namespace DVE\KrakenClient\Model\Response;

use Shudrum\Component\ArrayFinder\ArrayFinder;

class PublicTimeResponseModel extends ResponseModel
{
    private $unixtime = 0;
    private $rfc1123 = '';

    /**
     * @return int
     */
    public function getUnixtime()
    {
        return $this->unixtime;
    }

    /**
     * @return string
     */
    public function getRfc1123()
    {
        return $this->rfc1123;
    }

    /**
     * @param ArrayFinder $results
     */
    protected function hydrate(ArrayFinder $results)
    {
        $this->unixtime = $results->get('result.unixtime');
        $this->rfc1123 = $results->get('result.rfc1123');
    }

}