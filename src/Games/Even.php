<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;

function even()
{
    $number = rand(1, 20);
    $correctanswer = '';

    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i += 1) {
        if (($number % 2) === 0) {
            $correctanswer = 'yes';
        } else {
            $correctanswer = 'no';
        }
        line("Question, %d", $number);
        $answer = prompt('Your answer');
        if ($answer === $correctanswer) {
            line('Correct!');
            $number = rand(1, 20);
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctanswer);
            return line("Let's try again, %s!", $name);
        }
    }
    if ($answer === $correctanswer) {
        line("Congratulations, %s!", $name);
    }
}
