<?php

declare(strict_types=1);

class GameOfLife
{
    private GameGrid $grid;
    private int $generation;

    public function __construct(int $rowNum, int $colNum)
    {
        $this->grid = new GameGrid($rowNum, $colNum);
        $this->generation = 0;
    }

    public function nextGeneration(): void
    {
        $this->grid = $this->grid->createNextGeneration();
        $this->generation++;
    }

    public function setCell(int $x, int $y, bool $alive): void
    {
        $this->grid->setCell($x, $y, $alive);
    }

    public function getCell(int $x, int $y): Cell
    {
        return $this->grid->getCell($x, $y);
    }

    public function getLiveCellCount(): int
    {
        return $this->grid->getLiveCellCount();
    }


    public function displayState(): void
    {
        echo "Generation: {$this->generation}   |   Live cells: {$this->getLiveCellCount()}\n";
        echo $this->grid;
    }
}
