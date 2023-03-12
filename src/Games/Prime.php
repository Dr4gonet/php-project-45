<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\frame;

function prime()
{
    $task = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    function arrayDivisor(int $number)
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


    function arrayCorrectAnswer(): array
    {
        $result = [];
        for ($i = 0; $i < 3; $i += 1) {
            $number = rand(1, 100);
            $countDivisor = count(arrayDivisor($number));
            if ($countDivisor === 2) {
                $expression = $number;
                $correctAnswer = 'yes';
            } else {
                $expression = $number;
                $correctAnswer = 'no';
            }
            $result[] = [$expression, $correctAnswer];
        }
        return $result;
    }

    $array = arrayCorrectAnswer();

    frame($task, $array);
}
