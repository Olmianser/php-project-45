<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\setNumberRounds;
use function Brain\Games\Engine\startGame;
use function Brain\Games\Engine\playRound;
use function Brain\Games\Engine\finishGame;

const TEXT_GREETING = 'What number is missing in the progression?';

function playProgression(int $firstNum, int $step, int $length, int $hiddenPos)
{
    return ($firstNum + ($step * $hiddenPos));
}

//game
function playGame()
{
    $name = startGame(TEXT_GREETING);

    $notLoser = true;
    $rounds = setNumberRounds();

    for ($round = 1; ($round <= $rounds) && $notLoser; $round++) {
        $numberFirst = rand(0, 100);
        $stepProgression = rand(0, 30);
        $lengthProgression = rand(5, 10);
        $hiddenPos = rand(1, $lengthProgression);

        $temp = $numberFirst;
        for ($curPos = 1; $curPos <= $lengthProgression; $curPos++) {
            $temp .= ($curPos == $hiddenPos) ? (" " . "..") : (" " . ($numberFirst + ($stepProgression * $curPos)));
        }
        $question = "Question: " . $temp;
        $rightAnswer = playProgression($numberFirst, $stepProgression, $lengthProgression, $hiddenPos);
        $notLoser = playRound($question, $rightAnswer);
    }

    //finish of the game
    finishGame($notLoser, $name);
}
