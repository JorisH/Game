<?php

namespace Game\Strategy;

use Game\Weapon\BazookaWeapon;

class OffensiveStrategy extends Strategy
{
    /**
     * OffensiveStrategy constructor.
     */
    public function __construct()
    {
        $this->setWeapon(new BazookaWeapon());
    }
}