<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function startGame(string $text)
{
    //Start of the game, greeting
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    line($text);

    return $name;
}

function isRightAnswer(string $rightAnswer, string $answer)
{
    $win = ($rightAnswer == $answer);
    if ($win) {
        line('Correct!');
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $rightAnswer);
    }
    return $win;
}

function finishGame(bool $winner, string $name)
{
    $text = ($winner) ? 'Congratulations, %s!' : "Let's try again, %s!";
    line($text, $name);
}
