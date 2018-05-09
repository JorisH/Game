<?php

namespace Game;

use Log\LoggerInterface;

class PlayerAttack
{
    /** @var LoggerInterface */
    private $logger;
    
    /** @var Player $attackingPlayer */
    private $attackingPlayer;
    
    /**
     * PlayerAttack constructor.
     * @param LoggerInterface $logger
     */
    public function __construct($logger)
    {
        $this->logger = $logger;
    }
    
    /**
     * @param Player $player
     */
    public function setAttackingPlayer(Player $player)
    {
        $this->attackingPlayer = $player;
    }
    
    /**
     * @param Player $player the defending player
     */
    public function attack(Player $player)
    {
        $log = sprintf('%s (weapon: %s) attacks %s (armor: %s)',
            $this->attackingPlayer,
            $this->attackingPlayer->getStrategy()->getWeapon() ?: 'none',
            $player,
            $player->getStrategy()->getArmor() ?: 'none'
        );
        
        $damage = $this->attackingPlayer->getDamage();
        $damageReduction = $player->getDamageReduction();
        $remainingDamage = floor(($damage * (100 - $damageReduction))/100);
        $remainingHealth = max(0, $player->getHealth() - $remainingDamage);
        $player->setHealth($remainingHealth);
        
        if ($remainingHealth === 0) {
            $log .= ': FATALITY!!!';
        }
    
        $this->logger->log($log);
    }
    
    
}