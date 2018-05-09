<?php

namespace Game\Weapon;

class BazookaWeapon extends Weapon
{
    /**
     * BazookaWeapon constructor.
     */
    public function __construct()
    {
        parent::__construct('Bazooka', 50);
    }
}