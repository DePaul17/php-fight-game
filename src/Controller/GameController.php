<?php

namespace App\Controller;

use App\Model\GameState;
use App\View\ConsoleDisplay;

class GameController
{
    private GameState $gameState;
    private ConsoleDisplay $display;
    private PlayerController $playerController;

    public function __construct(GameState $gameState, ConsoleDisplay $display, PlayerController $playerController)
    {
        $this->gameState = $gameState;
        $this->display = $display;
        $this->playerController = $playerController;
    }

    public function run(): void
    {
        while (!$this->gameState->isGameOver()) {
            // Joueur1 attaque Joueur2
            $this->playerController->attack(
                $this->gameState->getPlayer1(),
                $this->gameState->getPlayer2()
            );

            // Vérifiez si le jeu est terminé après chaque attaque
            if ($this->gameState->isGameOver()) {
                break;
            }

            // Joueur2 attaque Joueur1
            $this->playerController->attack(
                $this->gameState->getPlayer2(),
                $this->gameState->getPlayer1()
            );

            // Affichage des points de vie après chaque round
            $this->display->show(
                $this->gameState->getPlayer1()->getHealth(),
                $this->gameState->getPlayer2()->getHealth()
            );
        }

        // Affichage du gagnant avec son nom et ses points de vie restants
        $winner = $this->gameState->getWinner();
        if ($winner !== null) {
            $this->display->showWinner($winner->getName(), $winner->getHealth());
        }
    }
}
