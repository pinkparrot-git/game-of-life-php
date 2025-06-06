<?php


declare(strict_types=1);

class Blinker extends Pattern
{
    public function __construct()
    {
        parent::__construct("Blinker", [
            [0, 0],
            [2, 0],
            [1, 0]
        ]);

    }
}