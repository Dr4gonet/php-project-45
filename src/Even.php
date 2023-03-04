<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function even()
{
    $number = [15, 6, 7];
    $correctanswer = '';

    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    foreach ($number as $item) {
        if (($item % 2) === 0) {
            $correctanswer = 'yes';
        } else {
            $correctanswer = 'no';
        }
        line("Question, %d", $item);
        $answer = prompt('Your answer');
        if ($answer === $correctanswer) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was 'no'.", $answer);
            return line("Let's try again, %s!", $name);
        }
    }
    if ($answer === $correctanswer) {
        line("Congratulations, %s!", $name);
    }
}
