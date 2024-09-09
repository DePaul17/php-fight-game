<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Game;

$game = new Game("Bob 30 7 4\nAlice 20 9 2");

$game->run(true);
