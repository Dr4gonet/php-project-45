<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\shouldRunGame;

function getVariants(): array
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

function shouldCalculateEven()
{

    $task = 'Answer "yes" if the number is even, otherwise answer "no".';

    $variants = getVariants();

    shouldRunGame($task, $variants);
}
