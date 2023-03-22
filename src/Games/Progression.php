<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

function getProgression(int $progressionStep)
{
    $progressionElement = rand(1, 50);
    $progression = [];
    $progressionlength = 10;
    for ($i = 1; $i <= $progressionlength; $i += 1) {
        $progressionElement = $progressionElement + $progressionStep;
        $progression[] = $progressionElement;
    }
    return $progression;
}

function getVariants(): array
{
    $result = [];
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i += 1) {
          $progressionStep = rand(2, 5);
          $index = rand(0, 9);
          $arrayExpression = getProgression($progressionStep);
          $correctAnswer = $arrayExpression[$index];
          $arrayExpression[$index] = '..';
          $expression = implode(' ', $arrayExpression);

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
