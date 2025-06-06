<?php

declare(strict_types=1);

class GameOfLifeTest
{
    public static function main(): void
    {
        echo "unit tests starts\n";
        self::testConwaysRules();
        self::testBlinkerPattern();
        echo "all tests passed successfully\n";
    }

    public static function testConwaysRules(): void
    {
        echo "Conway's rules tests starts\n";

        self::assertTrue(GameRules::shouldCellLive(true, 2), "live cell with 2 neighbors should survive");
        self::assertTrue(GameRules::shouldCellLive(true, 3), "live cell with 3 neighbors should survive");

        self::assertFalse(GameRules::shouldCellLive(true, 1), "live cell with 1 neighbor should die");
        self::assertFalse(GameRules::shouldCellLive(true, 4), "live cell with 4 neighbors should die");

        self::assertTrue(GameRules::shouldCellLive(false, 3), "dead cell with 3 neighbors should become alive");

        self::assertFalse(GameRules::shouldCellLive(false, 2), "dead cell with 2 neighbors should stay dead");
        self::assertFalse(GameRules::shouldCellLive(false, 4), "dead cell with 4 neighbors should stay dead");

        echo "Conway's rules tests ended successfully\n";
    }

    public static function testBlinkerPattern(): void
    {
        echo "Blinker pattern tests starts\n";

        $game = new GameOfLife(5, 5);
        (new Blinker())->applyTo($game, 1, 2);
        $game->displayState();


        self::assertTrue($game->getLiveCellCount() === 3, "initial state of horizontal Blinker with 3 live cells");
        self::assertTrue($game->getCell(1, 2)->isAlive(), "cell (1,2) should be alive");
        self::assertTrue($game->getCell(2, 2)->isAlive(), "cell (2,2) should be alive");
        self::assertTrue($game->getCell(3, 2)->isAlive(), "cell (3,2) should be alive");

        $game->nextGeneration();
        $game->displayState();

        self::assertTrue($game->getLiveCellCount() === 3, "Blinker should become vertical with 3 live cells");
        self::assertTrue($game->getCell(2, 1)->isAlive(), "cell (2,1) should be alive after evolution");
        self::assertTrue($game->getCell(2, 2)->isAlive(), "cell (2,2) should be alive after evolution");
        self::assertTrue($game->getCell(2, 3)->isAlive(), "cell (2,3) should be alive after evolution");

        $game->nextGeneration();
        $game->displayState();

        self::assertTrue($game->getLiveCellCount() === 3, "Blinker should return to horizontal with 3 live cells");
        self::assertTrue($game->getCell(1, 2)->isAlive(), "cell (1,2) should be alive after second evolution");
        self::assertTrue($game->getCell(2, 2)->isAlive(), "cell (2,2) should be alive after second evolution");
        self::assertTrue($game->getCell(3, 2)->isAlive(), "cell (3,2) should be alive after second evolution");

        echo "Blinker pattern tests ended successfully\n";
    }


    private static function assertTrue(bool $condition, string $message): void
    {
        if (!$condition) {
            throw new AssertionError("test failed: $message");
        }
    }

    private static function assertFalse(bool $condition, string $message): void
    {
        if ($condition) {
            throw new AssertionError("test failed: $message");
        }
    }

}
