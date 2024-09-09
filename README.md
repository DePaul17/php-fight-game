# Présentation

Votre but est de développer un simulateur de combat entre 2 joueurs.

## Production

Vous devez travailler dans le répertoire **src/**.\
La classe **Game** est le point d'entré d'une partie.\
Le jeu se lance en console, via des tests unitaires.
> php bin/kahlan

## Installation

> git clone https://git.balab.fr/exercices/php-fight-game.git \
> cd php-fight-game \
> composer install

# Règles

## Départ
La classe **Game** s'initialise avec une chaine de caractères.\
Cette chaine comporte les informations des deux joueurs, sur 2 lignes formatées comme suit:
> \<Nom 1> \<point de vie> \<attaque> \<défense>\
> \<Nom 2> \<point de vie> \<attaque> \<défense>

exemple:
>    Bob 30 7 4 \
>    Alice 20 9 2

## Déroulement d'un tour
La méthode **Game->run()** est appelée une seul fois pour lancer l'intégralité du combat.

A chaque tour, 
le joueur 1 attaque le joueur 2. Puis le joueur 2 attaque le joueur 1,\
Suivant la formule: **pv_j1 = pv_j1 - (attaque_j2 - def_j1)** \
Vous devez afficher les points de vie de chacun, formaté comme suit:
> \<vie joueur 1> \<vie joueur 2>

## Fin
Lorsque l'un des joueurs n'a plus de vie, vous devez afficher le nom du gagnant avec ses PV restants.
> \<nom gagnant> \<pv gagnant>


# Exemple d'une partie

> Bob 30 7 4 \
> Alice 20 9 2 \
> 25 15 \
> 20 10 \
> 15 5 \
> Bob 15

Note: Bob n'a pas eu le temps de se faire taper par Alice. Il reste donc à 15 pv

# Notation

Vous serez jugé sur votre qualité à produire un code propre, bien structuré, respectant de bonnes pratiques.\
Mais aussi, sur votre capacité à créer des objets cohérents et biens nommés, effectuant une tâche ou un groupe de tâches bien précis.\
Tout code redondant est éliminatoire.

Conseils:
* structurez votre solution avec un maximum de classes ( au moins 4)
* s'inspirer d'un model MVC peut être une bonne idée, en prenant Game comme contrôleur

# Exemple de class Game 

Le code qui suit n'est pas fonctionnel et sa qualité n'est pas à prendre en exemple.\
Son seul but est de vous aider à mieux appréhender l'exercice.
```php
class Game
{
    private $playerA;
    private $playerB;

    public function __construct($input)
    {
        $this->playerA = split(" ", split("\n", $input)[0]);
        $this->playerB = split(" ", split("\n", $input)[1]);
    }

    public function run()
    {
        // Rounds
        while ($this->playerA[1] > 0 and $this->playerB[1] > 0) {
            $this->playerA[1] -= 10;
            $this->playerB[1] -= 10;
            print $this->playerA[1] . " " . $this->playerB[1];
        }

        // End
        if ($this->playerA[1] > 0) {
            print $this->playerA[0] . " " . $this->playerA[1];
        } else {
            print $this->playerB[0] . " " . $this->playerB[1];
        }
    }
}
```
