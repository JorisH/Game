<?php

namespace Game;

use Log\LoggerInterface;

class Game
{
    /** @var LoggerInterface */
    private $logger;
    
    /** @var GameState */
    private $gameState = [];
    
    /**
     * Game constructor.
     * @param int $numberOfPlayers
     * @param LoggerInterface $logger
     */
    public function __construct($numberOfPlayers, LoggerInterface $logger)
    {
        $this->initGameState($numberOfPlayers);
        $this->logger = $logger;
    }
    
    /**
     * Starts the game
     */
    public function start()
    {
        $this->logger->log('game started.');
    
        $gameTurn = new GameTurn($this->gameState, $this->logger);
        while ($this->AtLeast2PlayersStillAlive()) {
            $gameTurn->nextTurn();
            sleep(1);
        }
        
        $this->logger->log('game finished.');
    }
    
    /**
     * @return bool
     */
    private function AtLeast2PlayersStillAlive()
    {
        $players = $this->gameState->getPlayers();
        $playersAlive = array_filter($players, function (Player $player) {
            return $player->isAlive();
        });
        
        return count($playersAlive) >= 2;
    }
    
    /**
     * @param int $numberOfPlayers
     */
    private function initGameState($numberOfPlayers)
    {
        $players = [];
        for ($playerNumber = 1; $playerNumber <= $numberOfPlayers; $playerNumber++) {
            $players[$playerNumber] = new Player($playerNumber);
        }
        
        $this->gameState = new GameState($players);
    }
}