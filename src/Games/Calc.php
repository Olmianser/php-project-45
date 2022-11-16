<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\playingGame;

use const Brain\Games\Engine\NUMBER_ROUNDS;

const TEXT_GREETING = 'What is the result of the expression?';

function calculating(int $num1, string $op, int $num2)
{
    switch ($op) {
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
    $questionsAndAnswers = [];
    for ($round = 1; $round <= NUMBER_ROUNDS; $round++) {
        $number1 = rand(0, 100);
        $number2 = rand(0, 100);
        $arrOperations = ["+", "-", "*"];
        $operation = $arrOperations[array_rand($arrOperations, 1)];

        $questionsAndAnswers[$round]['question'] = "Question: " . $number1 . " " . $operation . " " . $number2;
        $questionsAndAnswers[$round]['answer'] = calculating($number1, $operation, $number2);
    }
    playingGame(TEXT_GREETING, $questionsAndAnswers);
}
