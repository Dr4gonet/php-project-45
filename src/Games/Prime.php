<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runGame;

function divisors(int $number)
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
        $countDivisor = count(divisors($number));
        if ($countDivisor === 2) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }
        $result[] = [$number, $correctAnswer];
    }
    return $result;
}


function definePrimeNumber()
{
    $task = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $variants = getVariants();

    runGame($task, $variants);
}
