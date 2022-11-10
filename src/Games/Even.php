<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\setNumberRounds;
use function Brain\Games\Engine\startGame;
use function Brain\Games\Engine\playRound;
use function Brain\Games\Engine\finishGame;

const TEXT_GREETING = 'Answer "yes" if the number is even, otherwise answer "no".';

function playEven(int $number)
{
    return ($number % 2 === 0) ? 'yes' : 'no';
}

function playGame()
{
    $name = startGame(TEXT_GREETING);
    $rounds = setNumberRounds();
    $notLoser = true;

    for ($round = 1; ($round <= $rounds) && $notLoser; $round++) {
        $number = rand(0, 100);
        $question = "Question: {$number}";
        $rightAnswer = playEven($number);

        $notLoser = playRound($question, $rightAnswer);
    }

    //finish of the game
    finishGame($notLoser, $name);
}
