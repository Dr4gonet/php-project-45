<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

function getDivisors(int $number): array
{
    $result = [];
    for ($i = 1; $i <= $number; $i++) {
        $divisor = $number / $i;
        $remainder = $number % $i;
        if ($remainder === 0) {
            $result[] = $divisor;
        }
    }
    return $result;
}


function getVariants(): array
{
    $result = [];
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i += 1) {
        $number = rand(1, 100);
        $countDivisor = count(getDivisors($number));
        $correctAnswer = $countDivisor === 2 ? 'yes' : 'no';
        $result[] = [$number, $correctAnswer];
    }
    return $result;
}


function run(string $task)
{
    $variants = getVariants();

    runGame($task, $variants);
}
