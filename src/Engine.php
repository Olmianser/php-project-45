<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_ROUNDS = 3;

function startGame(string $text)
{
    //Start of the game, greeting
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    line($text);

    return $name;
}

function setNumberRounds()
{
    return NUMBER_ROUNDS;
}

function playRound(string $question, string $rightAnswer)
{
    line($question);
    $answer = prompt("Your answer");
    if ($rightAnswer == $answer) {
        line('Correct!');
        return true;
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $rightAnswer);
        return false;
    }
}

//output of the game result
function finishGame(bool $winner, string $name)
{
    $text = ($winner) ? 'Congratulations, %s!' : "Let's try again, %s!";
    line($text, $name);
}
