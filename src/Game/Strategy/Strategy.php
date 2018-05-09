<?php

namespace Game\Strategy;

use Game\Armor\ArmorInterface;
use Game\Weapon\WeaponInterface;

class Strategy implements StrategyInterface
{
    /** @var WeaponInterface */
    private $weapon;
    
    /** @var ArmorInterface */
    private $armor;
    
    /**
     * @return WeaponInterface
     */
    public function getWeapon()
    {
        return $this->weapon;
    }
    
    /**
     * @return ArmorInterface
     */
    public function getArmor()
    {
        return $this->armor;
    }
    
    /**
     * @param WeaponInterface $weapon
     */
    public function setWeapon($weapon)
    {
        $this->weapon = $weapon;
    }
    
    /**
     * @param ArmorInterface $armor
     */
    public function setArmor($armor)
    {
        $this->armor = $armor;
    }
    
    /**
     * @return int
     */
    public function getDamage()
    {
        if (!isset($this->weapon)) return 0;
        
        return $this->weapon->getDamage();
    }
    
    /**
     * @return int
     */
    public function getDamageReduction()
    {
        if (!isset($this->armor)) return 0;
        
        return $this->armor->getDamageReduction();
    }
}