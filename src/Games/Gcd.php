<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\setNumberRounds;
use function Brain\Games\Engine\startGame;
use function Brain\Games\Engine\playRound;
use function Brain\Games\Engine\finishGame;

const TEXT_GREETING = 'Find the greatest common divisor of given numbers.';

function playGcd(int $num1, int $num2)
{
    if ($num1 == 0) {
        return ($num2 == 0) ? 1 : $num2;
    }
    while ($num2 > 0) {
        if ($num1 == $num2) {
            return $num1;
        } elseif ($num1 > $num2) {
            $num1 = $num1 - $num2;
        } else {
            $num2 = $num2 - $num1;
        }
    }
    return $num1;
}

//game
function playGame()
{
    $name = startGame(TEXT_GREETING);
    $rounds = setNumberRounds();
    $notLoser = true;

    for ($round = 1; ($round <= $rounds) && $notLoser; $round++) {
        $number1 = rand(0, 100);
        $number2 = rand(0, 100);

        $question = "Question: {$number1} {$number2}";
        $rightAnswer = playGcd($number1, $number2);
        $notLoser = playRound($question, $rightAnswer);
    }

    //finish of the game
    finishGame($notLoser, $name);
}
