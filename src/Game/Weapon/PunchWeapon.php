<?php

namespace Game\Weapon;

class PunchWeapon extends Weapon
{
    /**
     * PunchWeapon constructor.
     */
    public function __construct()
    {
        parent::__construct('Punch', 1);
    }
}