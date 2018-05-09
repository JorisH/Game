<?php

namespace Game\Armor;

class Armor implements ArmorInterface
{
    /** @var string */
    private $name;
    /** @var int */
    private $damageReduction;
    
    /**
     * Armor constructor.
     * @param string $name
     * @param int $damageReduction
     */
    public function __construct($name, $damageReduction)
    {
        $this->name = $name;
        $this->damageReduction = $damageReduction;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @return int damage reduction in %
     */
    public function getDamageReduction()
    {
        return $this->damageReduction;
    }
    
    public function __toString()
    {
        return $this->getName();
    }
}