<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const TASK = 'Find the greatest common divisor of given numbers.';

function getGreatestCommonDivisor(int $numberOne, int $numberTwo)
{
    $maxNumber = max($numberOne, $numberTwo);
    $minNumber = min($numberOne, $numberTwo);

    //используем алгоритм Евклида для нахождения НОД

    if ($maxNumber % $minNumber === 0) {
        return $minNumber;
    }
    while ($minNumber > 1) {
        $remainder = $maxNumber % $minNumber;
        $maxNumber = $minNumber;
        $minNumber = $remainder;
        $remainder = $maxNumber % $minNumber;

        if ($remainder === 0) {
            return $minNumber;
        }
    }
    return $minNumber;
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
