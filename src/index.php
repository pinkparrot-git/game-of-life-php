<?php

declare(strict_types=1);

spl_autoload_register(function ($class) {
    $file = __DIR__ . '/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});


try {
    echo "****** Running Tests First ******\n";
    GameOfLifeTest::main();

    echo "-----------------------------\n";

    echo file_get_contents('banner.html');

    echo "\n****** Running Demo ******\n";
    GameOfLifeDemo::main();

} catch (Throwable $e) {
    echo "error: " . $e->getMessage() . "\n";
    echo "file: " . $e->getFile() . " line: " . $e->getLine() . "\n";
    exit(1);
}