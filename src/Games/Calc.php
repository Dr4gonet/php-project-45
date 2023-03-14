<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\frame;

function arrayCorrectAnswer(): array
{
        $result = [];
    for ($i = 0; $i < 3; $i += 1) {
        $number1 = rand(1, 25);
        $number2 = rand(1, 20);
        $count = rand(1, 3);
        switch ($count) {
            case 1:
                    $expression = $number1 . ' + ' . $number2;
                    $correctAnswer = $number1 + $number2;
                break;
            case 2:
                    $expression = $number1 . ' - ' . $number2;
                    $correctAnswer = $number1 - $number2;
                break;
            case 3:
                $expression = $number1 . ' * ' . $number2;
                $correctAnswer = $number1 * $number2;
        }
        $result[$i] = [$expression, $correctAnswer];
    }
        return $result;
}

function calc()
{

    $task = 'What is the result of the expression?';

    $array = arrayCorrectAnswer();

    frame($task, $array);
}
