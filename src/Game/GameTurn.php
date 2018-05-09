<?php

namespace Game;

use Game\Strategy\StrategyGenerator;
use Log\LoggerInterface;

class GameTurn
{
    /** @var GameState */
    private $gameState;
    
    /** @var LoggerInterface */
    private $logger;
    
    /**
     * GameTurn constructor.
     * @param GameState $gameState
     * @param LoggerInterface $logger
     */
    public function __construct(GameState $gameState, LoggerInterface $logger)
    {
        $this->gameState = $gameState;
        $this->logger = $logger;
    }
    
    /**
     * executes next turn
     */
    public function nextTurn()
    {
        $turn = $this->gameState->getTurn();
        
        $this->logger->log('turn '.(string)($turn+1).' started');
        
        $this->updatePlayersStrategy();
        $this->attack();
    
        $this->logger->log('turn '.(string)($turn+1).' ended');
        
        $this->gameState->setTurn(++$turn);
    }
    
    /**
     * every player gets a random strategy
     */
    private function updatePlayersStrategy()
    {
        if ($this->gameState->getTurn() % 3 !== 0) return;
        
        $this->logger->log('updating players strategy');
        
        array_map(function (Player $player) {
            $player->setStrategy(StrategyGenerator::createRandomStrategy());
        }, $this->gameState->getPlayers());
    }
    
    /**
     * every player that's still alive attacks another living player
     */
    private function attack()
    {
        /** @var Player[] $remainingPlayers */
        $remainingPlayers = array_filter($this->gameState->getPlayers(), function(Player $player) {
            return $player->isAlive();
        });
        
        $playerAttack = new PlayerAttack($this->logger);
        foreach ($remainingPlayers as $remainingPlayer) {
            if (!$remainingPlayer->canAttack()) continue;
            $playerAttack->setAttackingPlayer($remainingPlayer);
            $defendingPlayer = $this->getDefendingPlayer($remainingPlayers, $remainingPlayer);
            $playerAttack->attack($defendingPlayer);
            $this->gameState->updatePlayer($defendingPlayer);
        }
    }
    
    /**
     * @param Player[] $remainingPlayers
     * @param Player $attackingPlayer
     * @return Player the player to attack or defending player
     */
    private function getDefendingPlayer($remainingPlayers, Player $attackingPlayer)
    {
        unset($remainingPlayers[$attackingPlayer->getNumber()]);
        $defendingPlayerNumber = array_rand($remainingPlayers, 1);
        $defendingPlayer = $remainingPlayers[$defendingPlayerNumber];
        
        return $defendingPlayer;
    }
}