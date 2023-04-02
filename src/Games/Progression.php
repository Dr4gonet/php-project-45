<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const TASK = 'What number is missing in the progression?';

function getProgression()
{
    $step = rand(2, 5);
    $element = rand(1, 50);
    $progression = [];
    $length = 10;

    for ($i = 1; $i <= $length; $i += 1, $element += $step) {
        $progression[] = $element;
    }
    return $progression;
}

function getVariants(): array
{
    $result = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i += 1) {
        $index = rand(0, 9);
        $progression = getProgression();
        $correctAnswer = $progression[$index];
        $progression[$index] = '..';

        $expression = implode(' ', $progression);

        $result[] = [$expression, $correctAnswer];
    }
    return $result;
}

function run()
{
    $task = TASK;

    $variants = getVariants();

    runGame($task, $variants);
}
