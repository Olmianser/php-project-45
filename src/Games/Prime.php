<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\playingGame;

use const Brain\Games\Engine\NUMBER_ROUNDS;

const RULE_GAME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num)
{
    if (($num == 1) || ($num == 0)) {
        return 'no';
    }
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            return 'no';
        }
    }
    return 'yes';
}

//game
function playGame()
{
    $questionsAndAnswers = [];
    for ($round = 1; ($round <= NUMBER_ROUNDS); $round++) {
        $number = rand(0, 100);
        $questionsAndAnswers[$round]['question'] = 'Question: ' . $number;
        $questionsAndAnswers[$round]['answer'] = isPrime($number);
    }

    playingGame(RULE_GAME, $questionsAndAnswers);
}
