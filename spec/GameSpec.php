<?php

use App\Game;

function checkGame($message, $expectedLines, $outputLines)
{
    it($message, function () use ($expectedLines, $outputLines) {
        $outputLines = explode("\n", $outputLines);
        foreach (explode("\n", $expectedLines) as $line => $expected) {
            $roundLabel = 'round ' . ($line + 1) . ' > ';
            $lineFound = isset($outputLines[$line]) ? $outputLines[$line] : '';
            expect($roundLabel . $lineFound)->toBe($roundLabel . $expected);
            if ($expected !== $lineFound) {
                return;
            }

        }
    });
}

describe('Game', function () {
    $games = [
        [
            'input'  => "Bob 30 7 4\nAlice 20 9 2",
            'output' => "25 15\n20 10\n15 5\nBob 15"
        ]
    ];

    foreach ($games as $game) {
        context($game['input'], function () use ($game) {
            $gameObject = new Game($game['input']);

            ob_start();
            $gameObject->run();
            $outputLines = ob_get_clean();

            checkGame("must run correctly ", $game['output'], $outputLines);
        });
    }
});