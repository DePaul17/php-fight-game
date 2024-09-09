<?php

namespace App\View;

class ConsoleDisplay
{
    public function show(int $health1, int $health2): void
    {
        echo $health1 . ' ' . $health2 . "\n";
    }

    public function showWinner(string $name, int $health): void
    {
        echo $name . ' ' . $health . "\n";
    }
}
