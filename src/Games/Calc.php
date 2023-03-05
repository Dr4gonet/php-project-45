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

    $ans1 = $number1 + $number2;
    $ans2 = $number1 - $number2;
    $ans3 = $number1 * $number2;

    $exp1 = $number1 . ' + ' . $number2;
    $exp2 = $number1 . ' - ' . $number2;
    $exp3 = $number1 . ' * ' . $number2;
    $arrrayExpression = [$exp1, $exp2, $exp3];

    $arrayAnswer = [$ans1, $ans2, $ans3];
    $index = array_rand($arrayAnswer);
    $correctAnswer = (string) $arrayAnswer[$index];
    $expression = $arrrayExpression[$index];

        line("Question, %s", $expression);
        $answer = prompt('Your answer');
        if ($answer === $correctAnswer) {
            line('Correct!');
            } else {
            line("'%d' is wrong answer ;(.", $answer);
            line("Correct answer was '%d'.", $correctAnswer);
            return line("Let's try again, %s!", $name);
        }
    }
    if ($answer === $correctAnswer) {
        line("Congratulations, %s!", $name);
    }
}
