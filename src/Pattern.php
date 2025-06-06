<?php

declare(strict_types=1);

abstract class Pattern
{
    protected readonly string $name;
    /** @var int[][] */
    protected readonly array $coordinates;

    public function __construct(string $name, array $coordinates)
    {
        $this->name = $name;
        $this->coordinates = $coordinates;
    }

    public function applyTo(GameOfLife $game, int $startX, int $startY): void
    {
        foreach ($this->coordinates as $coord) {
            $game->setCell($startX + $coord[0], $startY + $coord[1], true);
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCoordinates(): array
    {
        return $this->coordinates;
    }
}

