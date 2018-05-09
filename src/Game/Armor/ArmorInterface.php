<?php

namespace Game\Armor;

interface ArmorInterface
{
    /**
     * @return string
     */
    public function getName();
    
    /**
     * @return int damage reduction in %
     */
    public function getDamageReduction();
}