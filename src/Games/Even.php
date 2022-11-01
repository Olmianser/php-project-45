<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\startGame;
use function Brain\Games\Engine\isRightAnswer;
use function Brain\Games\Engine\finishGame;

function algotithm(int $number)
{
    return ($number % 2 === 0) ? 'yes' : 'no';
}

//game Even
function play()
{
    $rounds = 3; //number of rounds

    $textGreeting = 'Answer "yes" if the number is even, otherwise answer "no".';
    $name = startGame($textGreeting);

    //game
    $winner = true;
    $answer = "";

    //rounds
    for ($i = 1; ($i <= $rounds) && $winner; $i++) {
        $question = rand(0, 100);
        line('Question: %d', $question);
        $answer = prompt("Your answer");

        $rightAnswer = algotithm($question);
        $winner = isRightAnswer($rightAnswer, $answer);
    }

    //finish of the game
    finishGame($winner, $name);
}
