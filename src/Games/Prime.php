<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\startGame;
use function Brain\Games\Engine\isRightAnswer;
use function Brain\Games\Engine\finishGame;

function algotithm(int $num)
{
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            return 'no';
        }
    }
    return 'yes';
}

//game
function play()
{
    $rounds = 3; //number of rounds

    //Start of the game, greeting
    $textGreeting = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $name = startGame($textGreeting);

    //game
    $winner = true;

    //rounds
    for ($i = 1; ($i <= $rounds) && $winner; $i++) {
        $question = rand(0, 100);//number
        line('Question: %d', $question);
        $answer = prompt("Your answer");
        $rightAnswer = algotithm($question);
        $winner = isRightAnswer($rightAnswer, $answer);
    }

    //finish of the game
    finishGame($winner, $name);
}
