<?php

namespace Log;

class ConsoleLogger implements LoggerInterface
{
    /**
     * @param string $message
     */
    public function log($message)
    {
        echo $message.PHP_EOL;
    }
}