<?php

declare(strict_types=1);

class GameRules
{
    /**
     * Conway's Rules:
     * 1. Any live cell with fewer than two live neighbors dies as if caused by underpopulation.
     * 2. Any live cell with two or three live neighbors lives on to the next generation.
     * 3. Any live cell with more than three live neighbors dies, as if by overcrowding.
     * 4. Any dead cell with exactly three live neighbors becomes a live cell, as if by reproduction.
     */
    public static function shouldCellLive(bool $isAlive, int $liveNeighbors): bool
    {
        if ($isAlive) {
            return $liveNeighbors === 2 || $liveNeighbors === 3;
        } else {
            return $liveNeighbors === 3;
        }
    }
}
