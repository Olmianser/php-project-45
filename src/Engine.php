<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_ROUNDS = 3;

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

function playingGame(string $greeting, array $questionsAndAnswers)
{
    //Start of the game, greeting
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    line($greeting);

    $notLoser = true;
    for ($round = 1; ($round <= NUMBER_ROUNDS) && $notLoser; $round++) {
        $notLoser = playRound($questionsAndAnswers[$round]['question'], $questionsAndAnswers[$round]['answer']);
    }

    //output of the game result
    $text = ($notLoser) ? 'Congratulations, %s!' : "Let's try again, %s!";
    line($text, $name);
}
