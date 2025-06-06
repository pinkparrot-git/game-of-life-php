<?php

declare(strict_types=1);

class GameOfLifeDemo
{
    private const ROW_NUMBER = 25;
    private const COLUMN_NUMBER = 25;
    private const GENERATIONS = 5;

    public static function main(): void
    {
        $game = new GameOfLife(self::ROW_NUMBER, self::COLUMN_NUMBER);
        self::addPatterns($game);
        echo "Initial state: ";
        $game->displayState();
        self::runSimulation($game, self::GENERATIONS);
    }

    private static function addPatterns(GameOfLife $game): void
    {
        (new Glider())->applyTo($game, intval(self::ROW_NUMBER / 2), intval(self::COLUMN_NUMBER / 2));
    }

    private static function runSimulation(GameOfLife $game, int $generations): void
    {
        for ($i = 0; $i < $generations; $i++) {
            self::sleepBeforeNextStep();
            $game->nextGeneration();
            $game->displayState();
        }
    }

    private static function sleepBeforeNextStep(): void
    {
        sleep(1);
    }
}
