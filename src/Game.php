<?php

namespace App;

use App\Model\Player;
use App\Model\GameState;
use App\Controller\PlayerController;
use App\Controller\GameController;
use App\View\ConsoleDisplay;

class Game
{
    private GameController $controller;

    /**
     * @param $input 2 lignes, comprenant les infos de chaque joueur
     * exemple: "Bod 100 7 5\nAlice 80 9 3"
     */
    public function __construct($input)
    {
        $players = explode("\n", $input);

        $player1 = $this->createPlayerFromString($players[0]);
        $player2 = $this->createPlayerFromString($players[1]);

        $gameState = new GameState($player1, $player2);

        $display = new ConsoleDisplay();
        $playerController = new PlayerController();

        $this->controller = new GameController($gameState, $display, $playerController);
    }

    private function createPlayerFromString(string $playerData): Player
    {
        list($name, $health, $attack, $defense) = explode(' ', $playerData);

        return new Player($name, (int) $health, (int) $attack, (int) $defense);
    }

    public function run()
    {
        $this->controller->run();
    }
}
