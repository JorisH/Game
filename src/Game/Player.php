<?php

namespace Game;

use Game\Strategy\StrategyInterface;

class Player
{
    /** @var int */
    private $number;
    
    /** @var int */
    private $health = 50;
    
    /** @var StrategyInterface */
    private $strategy;
    
    /**
     * Player constructor.
     * @param int $number
     */
    public function __construct($number)
    {
        $this->number = $number;
    }
    
    /**
     * @return bool
     */
    public function isAlive()
    {
        return $this->health > 0;
    }
    
    /**
     * @return bool
     */
    public function canAttack()
    {
        return $this->getStrategy()->getWeapon() !== null;
    }
    
    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }
    
    /**
     * @return int
     */
    public function getHealth()
    {
        return $this->health;
    }
    
    /**
     * @return StrategyInterface
     */
    public function getStrategy()
    {
        return $this->strategy;
    }
    
    /**
     * @param int $health
     */
    public function setHealth($health)
    {
        $this->health = $health;
    }
    
    /**
     * @param StrategyInterface $strategy
     */
    public function setStrategy($strategy)
    {
        $this->strategy = $strategy;
    }
    
    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('player %u (health: %u)', $this->number, $this->health);
    }
    
    /**
     * @return int
     */
    public function getDamage()
    {
        return $this->getStrategy()->getDamage();
    }
    
    /**
     * @return int
     */
    public function getDamageReduction()
    {
        return $this->getStrategy()->getDamageReduction();
    }
}