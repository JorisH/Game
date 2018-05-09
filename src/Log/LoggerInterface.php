<?php

namespace Log;

interface LoggerInterface
{
    /**
     * @param $message
     */
    public function log($message);
}