<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\frame;

function collection(int $n)
{
    $element = rand(1, 50);
    $progression = [];
    for ($i = 1; $i < 11; $i += 1) {
        $element = $element + $n;
        $progression[] = $element;
    }
    return $progression;
}

function arrayCorrectAnswer(): array
{
    $result = [];
    for ($i = 0; $i < 3; $i += 1) {
          $n = rand(2, 5);
          $index = rand(0, 9);
          $arrayExpression = collection($n);
          $correctAnswer = $arrayExpression[$index];
          $arrayExpression[$index] = '..';
          $expression = implode(' ', $arrayExpression);

          $result[] = [$expression, $correctAnswer];
    }
    return $result;
}

function progression()
{
    $task = 'What number is missing in the progression?';

    $array = arrayCorrectAnswer();

    frame($task, $array);
}
