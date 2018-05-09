<?php

namespace Game\Weapon;

class SpearWeapon extends Weapon
{
    /**
     * SpearWeapon constructor.
     */
    public function __construct()
    {
        parent::__construct('Spear', 20);
    }
}