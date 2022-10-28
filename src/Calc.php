<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\startGame;
use function Brain\Games\Engine\isRightAnswer;
use function Brain\Games\Engine\endGame;

function algotithm($question)
{
    switch ($question[1]) {
        case "0":
            return ($question[0] + $question[2]);
        case "1":
            return ($question[0] - $question[2]);
        case "2":
            return ($question[0] * $question[2]);
    }
}

//game
function game()
{
    $rounds = 3; //number of rounds

    //Start of the game, greeting
    $textGreeting = 'What is the result of the expression?';
    $name = startGame($textGreeting);

    //game
    $winner = true;
    $answer;
    $typeOperation = ["+", "-", "*"];

    //rounds
    for ($i = 1; ($i <= $rounds) && $winner; $i++) {
        $question[0] = rand(0, 100);
        $question[1] = rand(0, 2);
        $question[2] = rand(0, 100);

        line('Question: %d %s %d', $question[0], $typeOperation[$question[1]], $question[2]);
        $answer = prompt("Your answer");
        $rightAnswer = algotithm($question);
        $winner = isRightAnswer($rightAnswer, $answer);
    }

    //finish of the game
    endGame($winner, $name);
}