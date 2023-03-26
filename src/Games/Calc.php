<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

function variationOperation(int $number1, int $number2): array
{
    $variationOperation = [];
    $operation = ['+', '-', '*'];
    $index = array_rand($operation, 1);
    switch ($operation[$index]) {
        case '+':
            $expression = $number1 . ' + ' . $number2;
            $correctAnswer = $number1 + $number2;
            $variationOperation = [$expression, $correctAnswer];
            break;
        case '-':
            $expression = $number1 . ' - ' . $number2;
            $correctAnswer = $number1 - $number2;
            $variationOperation = [$expression, $correctAnswer];
            break;
        case '*':
            $expression = $number1 . ' * ' . $number2;
            $correctAnswer = $number1 * $number2;
            $variationOperation = [$expression, $correctAnswer];
            break;
        default:
            throw new \Exception('Unknown operation');
    }
    return $variationOperation;
}

function getVariants(): array
{
        $variations = [];
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i += 1) {
        $number1 = rand(1, 25);
        $number2 = rand(1, 20);
        $variations[$i] = variationOperation($number1, $number2);
    }
    return $variations;
}

function runCalculator()
{

    $task = 'What is the result of the expression?';

    $variants = getVariants();

    runGame($task, $variants);
}
