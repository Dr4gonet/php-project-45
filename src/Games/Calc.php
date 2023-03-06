<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;

function calc()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What is the result of the expression?');
    for ($i = 0; $i < 3; $i += 1) {
        $number1 = rand(1, 25);
        $number2 = rand(1, 20);
        $count = rand(1, 3);

        switch ($count) {
            case 1:
                $expression = $number1 . ' + ' . $number2;
                $correctAnswer = (string) ($number1 + $number2);
                break;
            case 2:
                $expression = $number1 . ' - ' . $number2;
                $correctAnswer = (string) ($number1 - $number2);
                break;
            case 3:
                $expression = $number1 . ' * ' . $number2;
                $correctAnswer = (string) ($number1 * $number2);
                break;
        }

        line("Question, %s", $expression);
        $answer = prompt('Your answer');
        if ($answer === $correctAnswer) {
            line('Correct!');
        } else {
            line("'%d' is wrong answer ;(. Correct answer was '%d'.", $answer, $correctAnswer);
            return line("Let's try again, %s!", $name);
        }
    }
    if ($answer === $correctAnswer) {
        line("Congratulations, %s!", $name);
    }
}
