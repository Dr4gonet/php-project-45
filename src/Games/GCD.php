<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const TASK = 'Find the greatest common divisor of given numbers.';

function getGreatestCommonDivisor(int $numberOne, int $numberTwo): int
{
    //используем алгоритм Евклида для нахождения НОД
    if ($numberTwo !== 0) {
        return getGreatestCommonDivisor($numberTwo, $numberOne % $numberTwo);
    }
    return $numberOne;
}


function getVariants(): array
{
    $result = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i += 1) {
        $numberOne = rand(1, 100);
        $numberTwo = rand(1, 100);
        $correctAnswer = getGreatestCommonDivisor($numberOne, $numberTwo);

        $expression = $numberOne . ' ' . $numberTwo;

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
