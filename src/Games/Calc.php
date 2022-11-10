<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\setNumberRounds;
use function Brain\Games\Engine\startGame;
use function Brain\Games\Engine\playRound;
use function Brain\Games\Engine\finishGame;

const TEXT_GREETING = 'What is the result of the expression?';

function playCalc(int $num1, string $operat, int $num2)
{
    switch ($operat) {
        case "+":
            return ($num1 + $num2);
        case "-":
            return ($num1 - $num2);
        case "*":
            return ($num1 * $num2);
    }
}

function playGame()
{
    $name = startGame(TEXT_GREETING);

    $notLoser = true;
    $rounds = setNumberRounds();

    for ($round = 1; ($round <= $rounds) && $notLoser; $round++) {
        $number1 = rand(0, 100);
        $number2 = rand(0, 100);
        $operRand = rand(0, 2);
        switch ($operRand) {
            case 0:
                $opeation = "+";
                break;
            case 1:
                $operation = "-";
                break;
            default:
                $operation = "*";
        }
        $question = "Question: " . $number1 . " " . $operation . " " . $number2;
        $rightAnswer = playCalc($number1, $operation, $number2);
        $notLoser = playRound($question, $rightAnswer);
    }

    //finish of the game
    finishGame($notLoser, $name);
}
