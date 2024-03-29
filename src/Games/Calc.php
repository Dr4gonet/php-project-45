<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const TASK = 'What is the result of the expression?';

function correctAnswer(int $number1, int $number2, string $operation): int
{
    switch ($operation) {
        case '+':
            return $number1 + $number2;
        case '-':
            return $number1 - $number2;
        case '*':
            return $number1 * $number2;
        default:
            throw new \Exception('Unknown operation');
    }
}

function getVariants(): array
{
    $variations = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i += 1) {
        $operations = ['+', '-', '*'];
        $index = array_rand($operations, 1);
        $operation = $operations[$index];
        $number1 = rand(1, 25);
        $number2 = rand(1, 20);

        $expression = "$number1 $operation $number2";

        $variations[$i] = [$expression, correctAnswer($number1, $number2, $operation)];
    }
    return $variations;
}

function run()
{
    $task = TASK;

    $variants = getVariants();

    runGame($task, $variants);
}
