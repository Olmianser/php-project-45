<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\startGame;
use function Brain\Games\Engine\isRightAnswer;
use function Brain\Games\Engine\finishGame;

function algotithm(array $num)
{
    $a = $num[0];
    $b = $num[1];
    if ($a == 0) {
        return ($b == 0) ? 1 : $b;
    }
    while ($b > 0) {
        if ($a == $b) {
            return $a;
        } elseif ($a > $b) {
            $a = $a - $b;
        } else {
            $b = $b - $a;
        }
    }
    return $a;
}

//game
function play()
{
    $rounds = 3; //number of rounds

    //Start of the game, greeting
    $textGreeting = 'Find the greatest common divisor of given numbers.';
    $name = startGame($textGreeting);

    //game
    $winner = true;
    $question = [];

    //rounds
    for ($i = 1; ($i <= $rounds) && $winner; $i++) {
        $question[0] = rand(0, 100);
        $question[1] = rand(0, 100);

        line('Question: %d %d', $question[0], $question[1]);
        $answer = prompt("Your answer");
        $rightAnswer = algotithm($question);
        $winner = isRightAnswer($rightAnswer, $answer);
    }

    //finish of the game
    finishGame($winner, $name);
}