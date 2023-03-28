<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

function getProgression()
{
    $progressionStep = rand(2, 5);
    $progressionElement = rand(1, 50);
    $progression = [];
    $progressionlength = 10;
    for ($i = 1; $i <= $progressionlength; $i += 1, $progressionElement += $progressionStep) {
        $progression[] = $progressionElement;
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

function displayArithmeticProgression()
{
    $task = 'What number is missing in the progression?';

    $variants = getVariants();

    runGame($task, $variants);
}
