<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\playingGame;

use const Brain\Games\Engine\NUMBER_ROUNDS;

const RULE_GAME = 'Find the greatest common divisor of given numbers.';

function findGcd(int $num1, int $num2)
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
    $questionsAndAnswers = [];
    for ($round = 1; ($round <= NUMBER_ROUNDS); $round++) {
        $number1 = rand(0, 100);
        $number2 = rand(0, 100);

        $questionsAndAnswers[$round]['question'] = "Question: {$number1} {$number2}";
        $questionsAndAnswers[$round]['answer'] = findGcd($number1, $number2);
    }
    playingGame(RULE_GAME, $questionsAndAnswers);
}
