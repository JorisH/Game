<?php

namespace Game\Strategy;

use Game\Armor\ArmorInterface;
use Game\Weapon\WeaponInterface;

interface StrategyInterface
{
    /**
     * @return WeaponInterface|null
     */
    public function getWeapon();
    
    /**
     * @return ArmorInterface|null
     */
    public function getArmor();
    
    /**
     * @return int
     */
    public function getDamage();
    
    /**
     * @return int
     */
    public function getDamageReduction();
}