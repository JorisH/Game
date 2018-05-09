<?php

namespace Game\Weapon;

final class WeaponGenerator
{
    const WEAPON_PUNCH = 1;
    const WEAPON_BOW = 2;
    const WEAPON_SPEAR = 3;
    const WEAPON_BAZOOKA = 4;
    
    /**
     * @return WeaponInterface
     */
    public static function createRandomWeapon()
    {
        $rand = rand(1,4);
        switch ($rand) {
            case self::WEAPON_BAZOOKA:
                return new BazookaWeapon();
            case self::WEAPON_SPEAR:
                return new SpearWeapon();
            case self::WEAPON_BOW:
                return new BowWeapon();
            case self::WEAPON_PUNCH:
            default:
                return new PunchWeapon();
        }
    }
}