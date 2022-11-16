<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\playingGame;

use const Brain\Games\Engine\NUMBER_ROUNDS;

const TEXT_GREETING = 'What number is missing in the progression?';

function findHidInProgres(int $firstNum, int $step, int $length, int $hiddenPos)
{
    return ($firstNum + ($step * $hiddenPos));
}

//game
function playGame()
{
    $questionsAndAnswers = [];
    for ($round = 1; ($round <= NUMBER_ROUNDS); $round++) {
        $numFirst = rand(0, 100);
        $step = rand(0, 30);
        $lengthProgression = rand(5, 10);
        $hiddenPos = rand(1, $lengthProgression);

        $temp = $numFirst;
        for ($curPos = 1; $curPos <= $lengthProgression; $curPos++) {
            $temp .= ($curPos == $hiddenPos) ? (" " . "..") : (" " . ($numFirst + ($step * $curPos)));
        }
        $questionsAndAnswers[$round]['question'] = "Question: " . $temp;
        $questionsAndAnswers[$round]['answer'] = findHidInProgres($numFirst, $step, $lengthProgression, $hiddenPos);
    }

    playingGame(TEXT_GREETING, $questionsAndAnswers);
}
