<?php

namespace Game;

class GameState
{
    /** @var Player[] */
    private $players;
    
    /** @var int */
    private $turn;
    
    /**
     * GameState constructor.
     * @param Player[] $players
     * @param int $turn
     */
    public function __construct(array $players, $turn = 0)
    {
        $this->players = $players;
        $this->turn = $turn;
    }
    
    /**
     * @return Player[]
     */
    public function getPlayers()
    {
        return $this->players;
    }
    
    /**
     * @return int
     */
    public function getTurn()
    {
        return $this->turn;
    }
    
    /**
     * @param int $turn
     */
    public function setTurn($turn)
    {
        $this->turn = $turn;
    }
    
    /**
     * @param Player $player
     */
    public function updatePlayer(Player $player)
    {
        $this->players[$player->getNumber()] = $player;
    }
}