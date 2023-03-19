<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;

function variationOperation(int $number1, int $number2): array
{
    $variationOperation = [];
    $operationOption = rand(1, 3);
    $expression = '';
    $correctAnswer = 0;

    switch ($operationOption) {
        case 1:
            $expression = $number1 . ' + ' . $number2;
            $correctAnswer = $number1 + $number2;
            $variationOperation = [$expression, $correctAnswer];
            break;
        case 2:
            $expression = $number1 . ' - ' . $number2;
            $correctAnswer = $number1 - $number2;
            $variationOperation = [$expression, $correctAnswer];
            break;
        case 3:
            $expression = $number1 . ' * ' . $number2;
            $correctAnswer = $number1 * $number2;
            $variationOperation = [$expression, $correctAnswer];
    }
            return $variationOperation;
}

function getVariants(): array
{
        $variations = [];
        $numberOfOperations = 3;
    for ($i = 0; $i < $numberOfOperations; $i += 1) {
        $number1 = rand(1, 25);
        $number2 = rand(1, 20);
        $variations[$i] = variationOperation($number1, $number2);
    }
        return $variations;
}

function shouldRunCalculator()
{

    $task = 'What is the result of the expression?';

    $variants = getVariants();

    runGame($task, $variants);
}
