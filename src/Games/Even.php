<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\playingGame;

use const Brain\Games\Engine\NUMBER_ROUNDS;

const TEXT_GREETING = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number)
{
    return ($number % 2 === 0) ? 'yes' : 'no';
}

function playGame()
{
    $questionsAndAnswers = [];
    for ($round = 1; ($round <= NUMBER_ROUNDS); $round++) {
        $number = rand(0, 100);
        $questionsAndAnswers[$round]['question'] = "Question: {$number}";
        $questionsAndAnswers[$round]['answer'] = isEven($number);
    }

    playingGame(TEXT_GREETING, $questionsAndAnswers);
}
