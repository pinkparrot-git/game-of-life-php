<?php

declare(strict_types=1);

class Glider extends Pattern
{
    public function __construct()
    {
        parent::__construct("Glider", [
            [-1, -2],
            [0, -1],
            [-2, 0],
            [-1, 0],
            [0, 0]
        ]);
    }
}
