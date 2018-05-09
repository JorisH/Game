<?php

namespace Game\Weapon;

interface WeaponInterface
{
    /**
     * @return string
     */
    public function getName();
    
    /**
     * @return int
     */
    public function getDamage();
}