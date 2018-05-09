<?php

namespace Game\Weapon;

class Weapon implements WeaponInterface
{
    /** @var string */
    private $name;
    
    /** @var int */
    private $damage;
    
    /**
     * Weapon constructor.
     * @param string $name
     * @param int $damage
     */
    protected function __construct($name, $damage)
    {
        $this->name = $name;
        $this->damage = $damage;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @return int
     */
    public function getDamage()
    {
        return $this->damage;
    }
    
    public function __toString()
    {
        return $this->getName();
    }
}