<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

function getProgression(int $progressionStep)
{
    $progressionElement = rand(1, 50);
    $progression = [];
    for ($i = 1; $i < 11; $i += 1) {
        $progressionElement = $progressionElement + $progressionStep;
        $progression[] = $progressionElement;
    }
    return $progression;
}

function getVariants(): array
{
    $result = [];
    for ($i = 0; $i < 3; $i += 1) {
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

function shouldDisplayArithmeticProgression()
{
    $task = 'What number is missing in the progression?';

    $variants = getVariants();

    runGame($task, $variants);
}
