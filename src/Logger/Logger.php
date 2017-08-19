<?php

namespace DVE\KrakenClient\Logger;

use Psr\Log\LoggerInterface;

class Logger implements LoggerInterface
{
    /**
     * @param string $message
     * @param array $context
     */
    public function emergency($message, array $context = array())
    {
        $this->log('emergency', $message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function alert($message, array $context = array())
    {
        $this->log('alert', "\033[1;31m" . $message . "\033[0m", $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function critical($message, array $context = array())
    {
        $this->log('critical', "\033[0;31m" . $message . "\033[0m", $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function error($message, array $context = array())
    {
        $this->log('error', "\033[0;31m" . $message . "\033[0m", $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function warning($message, array $context = array())
    {
        $this->log('warning', "\033[1;31m" . $message . "\033[0m", $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function notice($message, array $context = array())
    {
        $this->log('notice', "\033[1;32m" . $message . "\033[0m", $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function info($message, array $context = array())
    {
        $this->log('info', $message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function debug($message, array $context = array())
    {
        $this->log('debug', $message, $context);
    }

    /**
     * @param mixed $level
     * @param string $message
     * @param array $context
     */
    public function log($level, $message, array $context = array())
    {
        $string =
            // Date and time
            '[' . date('c') . '] ' .

            // Log level
            strtoupper($level === 'info' ? '' : $level. ': ') .

            // Message
            $message . "\n"
        ;

        echo $string;
    }
}