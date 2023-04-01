<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

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
        if ($remainder === 1) {
            return 1;
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
        $numberOne = rand(1, 100);
        $numberTwo = rand(1, 100);
        $result[] = [$expression, $correctAnswer];
    }
    return $result;
}


function run($task)
{
    $variants = getVariants();

    runGame($task, $variants);
}
