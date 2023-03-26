<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

function variationOperation(int $number1, int $number2, array &$operation, int &$index, string &$expression): array
{
    switch ($operation[$index]) {
        case '+':
            $correctAnswer = $number1 + $number2;
            break;
        case '-':
            $correctAnswer = $number1 - $number2;
            break;
        case '*':
            $correctAnswer = $number1 * $number2;
            break;
        default:
            throw new \Exception('Unknown operation');
    }
    return [$expression, $correctAnswer];
}

function getVariants(): array
{
        $variations = [];
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i += 1) {
        $operation = ['+', '-', '*'];
        $index = array_rand($operation, 1);
        $number1 = rand(1, 25);
        $number2 = rand(1, 20);
        $expression = $number1 . ' ' . $operation[$index] . ' '  . $number2;
        $variations[$i] = variationOperation($number1, $number2, $operation, $index, $expression);
    }
    return $variations;
}

function runCalculator()
{

    $task = 'What is the result of the expression?';

    $variants = getVariants();

    runGame($task, $variants);
}
