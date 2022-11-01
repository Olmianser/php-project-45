<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\startGame;
use function Brain\Games\Engine\isRightAnswer;
use function Brain\Games\Engine\finishGame;

function algotithm(array $arr)
{
    return ($arr[0] + ($arr[1] * $arr[3]));
}

//game
function play()
{
    $rounds = 3; //number of rounds

    //Start of the game, greeting
    $textGreeting = 'What number is missing in the progression?';
    $name = startGame($textGreeting);

    //game
    $winner = true;
    $question = [];

    //rounds
    for ($i = 1; ($i <= $rounds) && $winner; $i++) {
        $question[0] = rand(0, 100);//first number
        $question[1] = rand(0, 30);//step
        $question[2] = rand(5, 10);//length progression
        $question[3] = rand(1, $question[2]);//hidden position

        $textQ2 = $question[0];
        for ($j = 1; $j <= $question[2]; $j++) {
            $textQ2 .= ($j == $question[3]) ? (" " . "..") : (" " . ($question[0] + ($question[1] * $j)));
        }
        line('Question: ' . $textQ2);
        $answer = prompt("Your answer");
        $rightAnswer = algotithm($question);
        $winner = isRightAnswer($rightAnswer, $answer);
    }

    //finish of the game
    finishGame($winner, $name);
}