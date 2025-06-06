<?php


declare(strict_types=1);

class Beehive extends Pattern
{
    public function __construct()
    {
        parent::__construct("Beehive", [
               [-1, 0],
               [-1, 1],
               [0, -1],
               [0, 2],
               [1, 0],
               [1, 1]
        ]);

    }
}