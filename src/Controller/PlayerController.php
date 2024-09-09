<?php

namespace App\Controller;

use App\Model\Player;

class PlayerController
{
    public function attack(Player $attacker, Player $defender): void
    {
        $damage = $attacker->getAttack() - $defender->getDefense();
        if ($damage > 0) {
            $defender->takeDamage($damage);
        }
    }
}
