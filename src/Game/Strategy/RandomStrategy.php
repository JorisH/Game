<?php

namespace Game\Strategy;

use Game\Armor\ArmorGenerator;
use Game\Weapon\WeaponGenerator;

class RandomStrategy extends Strategy
{
    /**
     * RandomStrategy constructor.
     */
    public function __construct()
    {
        if (rand(1,2) === 1) {
            $this->setWeapon(WeaponGenerator::createRandomWeapon());
        } else {
            $this->setArmor(ArmorGenerator::createRandomArmor());
        }
    }
}