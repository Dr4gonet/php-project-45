<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

function getVariants(): array
{
    $result = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i += 1) {
        $number = rand(1, 20);

        $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';

        $result[] = [$number, $correctAnswer];
    }
    return $result;
}

function run()
{
    $task = TASK;

    $variants = getVariants();

    runGame($task, $variants);
}
