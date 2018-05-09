<?php

namespace Game\Strategy;

use Game\Armor\PlatinumArmor;

class DefensiveStrategy extends Strategy
{
    /**
     * DefensiveStrategy constructor.
     */
    public function __construct()
    {
        $this->setArmor(new PlatinumArmor());
    }
}