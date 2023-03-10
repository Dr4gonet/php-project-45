<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\frame;

function arrayCorrectAnswer(): array
{
        $result = [];
        $correctAnswer = '';
    for ($i = 0; $i < 3; $i += 1) {
        $number = rand(1, 20);
        if (($number % 2) === 0) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }
            $result[] = [$number, $correctAnswer];
    }

        return $result;
}

function even()
{

    $task = 'Answer "yes" if the number is even, otherwise answer "no".';

    $array = arrayCorrectAnswer();

    frame($task, $array);
}
