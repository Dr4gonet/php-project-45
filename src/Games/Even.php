<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runGame;

function getVariants(): array
{
        //$result = [];
        //$correctAnswer = '';
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i += 1) {
        $number = rand(1, 20);
        $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';
        $result[] = [$number, $correctAnswer];
    }
    return $result;
}

function calculateEven()
{

    $task = 'Answer "yes" if the number is even, otherwise answer "no".';

    $variants = getVariants();

    runGame($task, $variants);
}
