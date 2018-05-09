<?php

namespace Game\Strategy;

final class StrategyGenerator
{
    const STRATEGY_OFFENSIVE = 1;
    const STRATEGY_DEFENSIVE = 2;
    const STRATEGY_RANDOM = 3;
    
    /**
     * @return StrategyInterface a Strategy
     */
    public static function createRandomStrategy()
    {
        $strategy = rand(1, 3);
        switch ($strategy) {
            case self::STRATEGY_OFFENSIVE:
                return new OffensiveStrategy();
            case self::STRATEGY_DEFENSIVE:
                return new DefensiveStrategy();
            case self::STRATEGY_RANDOM:
            default:
                return new RandomStrategy();
        }
    }
}