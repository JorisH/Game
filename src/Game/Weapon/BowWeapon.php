<?php

namespace Game\Weapon;

class BowWeapon extends Weapon
{
    /**
     * BowWeapon constructor.
     */
    public function __construct()
    {
        parent::__construct('Bow', 5);
    }
}