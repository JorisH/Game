<?php

namespace Game\Armor;

final class ArmorGenerator
{
    const ARMOR_LEATHER = 1;
    const ARMOR_IRON = 2;
    const ARMOR_PLATINUM = 3;
    
    /**
     * @return ArmorInterface
     */
    public static function createRandomArmor()
    {
        $rand = rand(1,3);
        switch ($rand) {
            case self::ARMOR_PLATINUM:
                return new PlatinumArmor();
            case self::ARMOR_IRON:
                return new IronArmor();
            case self::ARMOR_LEATHER:
            default:
                return new LeatherArmor();
        }
    }
}