<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\setNumberRounds;
use function Brain\Games\Engine\startGame;
use function Brain\Games\Engine\playRound;
use function Brain\Games\Engine\finishGame;

const TEXT_GREETING = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function playPrime(int $num)
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
    $name = startGame(TEXT_GREETING);

    $notLoser = true;
    $rounds = setNumberRounds();

    for ($round = 1; ($round <= $rounds) && $notLoser; $round++) {
        $number = rand(0, 100);
        $question = 'Question: ' . $number;
        $rightAnswer = playPrime($number);

        $notLoser = playRound($question, $rightAnswer);
    }

    //finish of the game
    finishGame($notLoser, $name);
}
