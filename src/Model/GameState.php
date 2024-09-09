<?php

namespace App\Model;

class GameState
{
    private Player $player1;
    private Player $player2;

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function isGameOver(): bool
    {
        return $this->player1->getHealth() <= 0 || $this->player2->getHealth() <= 0;
    }

    public function getWinner(): ?Player
    {
        if ($this->player1->getHealth() > 0) {
            return $this->player1;
        } elseif ($this->player2->getHealth() > 0) {
            return $this->player2;
        }
        return null;
    }

    public function getPlayer1(): Player
    {
        return $this->player1;
    }

    public function getPlayer2(): Player
    {
        return $this->player2;
    }
}
