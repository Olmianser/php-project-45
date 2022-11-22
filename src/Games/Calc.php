<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\playingGame;

use const Brain\Games\Engine\NUMBER_ROUNDS;

const RULE_GAME = 'What is the result of the expression?';

function calculate(int $number1, string $operation, int $number2)
{
    switch ($operation) {
        case "+":
            return ($number1 + $number2);
        case "-":
            return ($number1 - $number2);
        case "*":
            return ($number1 * $number2);
    }
}

function playGame()
{
    $questionsAndAnswers = [];
    for ($round = 1; $round <= NUMBER_ROUNDS; $round++) {
        $number1 = rand(0, 100);
        $number2 = rand(0, 100);
        $arrayOperations = ["+", "-", "*"];
        $operation = $arrayOperations[array_rand($arrayOperations, 1)];

        $questionsAndAnswers[$round]['question'] = "Question: " . $number1 . " " . $operation . " " . $number2;
        $questionsAndAnswers[$round]['answer'] = calculate($number1, $operation, $number2);
    }
    playingGame(RULE_GAME, $questionsAndAnswers);
}
