# game-of-life-php

A simple implementation of Conway’s Game of Life using php 8.4.7
It simulates the evolution of cellular automata on a 2D grid, following the standard rules defined by John Conway.
The program runs in the console, prints the grid at each generation, and includes a sample pattern (Glider).


● Entry Point
The main class and entry point of the simulation is:

index.php

Running this file starts tests and the simulation with default settings.

● Default Configuration
PHP Version: 8.4.7
Grid Size: 25 rows × 25 columns
Number of Generations: 5

Initial Patterns:
Glider (centered)

These default values can be customized directly in the GameOfLifeDemo class.

● Adding Patterns
New patterns can be easily added using the addPatterns method in the GameOfLifeDemo class. This method allows you to insert
additional predefined patterns by applying them to specific coordinates in the grid.

Example:
(new Blinker())->applyTo($game, 3, 4);
(new Beehive())->applyTo($game, 14, 14);

● Simulation Delay
Each generation update is delayed by 1 second for visualization purposes.
This is handled via the sleepBeforeNextStep() method.