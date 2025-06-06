<?php

declare(strict_types=1);

class GameGrid
{
    private readonly int $rowNum;
    private readonly int $colNum;
    /** @var Cell[][] */
    private readonly array $cells;

    public function __construct(int $rowNum, int $colNum, ?array $cells = null)
    {
        $this->validateDimensions($rowNum, $colNum);
        $this->rowNum = $rowNum;
        $this->colNum = $colNum;
        $this->cells = $cells ?? $this->initializeCells();
    }

    private function createFromCells(array $cells): self
    {
        $rowNum = count($cells);
        $colNum = count($cells[0]);
        return new self($rowNum, $colNum, $cells);
    }

    private function validateDimensions(int $rows, int $cols): void
    {
        if ($rows <= 0 || $cols <= 0) {
            throw new InvalidArgumentException("Grid dimensions should be positive numbers");
        }
    }

    private function initializeCells(): array
    {
        $newCells = [];
        for ($row = 0; $row < $this->rowNum; $row++) {
            for ($col = 0; $col < $this->colNum; $col++) {
                $newCells[$row][$col] = new Cell();
            }
        }
        return $newCells;
    }

    public function getCell(int $row, int $col): Cell
    {
        if ($this->isValid($row, $col)) {
            return $this->cells[$row][$col];
        }
        return new Cell(false);
    }

    public function setCell(int $row, int $col, bool $alive): void
    {
        if ($this->isValid($row, $col)) {
            $this->cells[$row][$col]->setAlive($alive);
        }
    }

    public function isValid(int $row, int $col): bool
    {
        return $row >= 0 && $row < $this->rowNum && $col >= 0 && $col < $this->colNum;
    }

    public function countLiveNeighbors(int $row, int $col): int
    {
        $count = 0;
        for ($i = -1; $i <= 1; $i++) {
            for ($j = -1; $j <= 1; $j++) {
                if ($i === 0 && $j === 0) continue;
                if ($this->getCell($row + $i, $col + $j)->isAlive()) {
                    $count++;
                }
            }
        }
        return $count;
    }

    public function createNextGeneration(): self
    {
        $nextGenerationCells = [];
        for ($row = 0; $row < $this->rowNum; $row++) {
            for ($col = 0; $col < $this->colNum; $col++) {
                $neighbors = $this->countLiveNeighbors($row, $col);
                $currentlyAlive = $this->cells[$row][$col]->isAlive();
                $willBeAlive = GameRules::shouldCellLive($currentlyAlive, $neighbors);
                $nextGenerationCells[$row][$col] = new Cell($willBeAlive);
            }
        }
        return $this->createFromCells($nextGenerationCells);
    }

    public function getLiveCellCount(): int
    {
        $count = 0;
        for ($row = 0; $row < $this->rowNum; $row++) {
            for ($col = 0; $col < $this->colNum; $col++) {
                if ($this->cells[$row][$col]->isAlive()) {
                    $count++;
                }
            }
        }
        return $count;
    }

    public function __toString(): string
    {
        $output = "\n" . str_repeat("-", $this->colNum * 3) . "\n";

        for ($row = 0; $row < $this->rowNum; $row++) {
            $output .= "|  ";
            for ($col = 0; $col < $this->colNum; $col++) {
                $output .= $this->cells[$row][$col] . "  ";
            }
            $output .= "|\n";
        }

        $output .= "\n" . str_repeat("-", $this->colNum * 3) . "\n";
        return $output;
    }

    public function getRowNum(): int
    {
        return $this->rowNum;
    }

    public function getColNum(): int
    {
        return $this->colNum;
    }
}