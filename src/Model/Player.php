<?php

namespace App\Model;

class Player
{
    private string $name;
    private int $health;
    private int $attack;
    private int $defense;

    public function __construct(string $name, int $health, int $attack, int $defense)
    {
        $this->name = $name;
        $this->health = $health;
        $this->attack = $attack;
        $this->defense = $defense;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function setHealth(int $health): void
    {
        $this->health = $health;
    }

    public function getAttack(): int
    {
        return $this->attack;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }

    public function takeDamage(int $damage): void
    {
        $this->health -= $damage;
        if ($this->health < 0) {
            $this->health = 0;
        }
    }
}
