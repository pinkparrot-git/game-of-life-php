<?php

declare(strict_types=1);

class Cell
{
    public function __construct(private bool $alive = false)
    {
    }

    public function isAlive(): bool
    {
        return $this->alive;
    }

    public function setAlive(bool $alive): void
    {
        $this->alive = $alive;
    }

    public function __toString(): string
    {
        return $this->alive ? "●" : "○";
    }
}