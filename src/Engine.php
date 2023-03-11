<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function frame($task, $array)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($task);
    for ($i = 1; $i < 4; $i += 1) {
        
        switch($i) {
            case 1:
                $expression = $array[0][0];
                $correctAnswer = (string) $array[0][1];
                break;
            case 2:
                $expression = $array[1][0];
                $correctAnswer = (string) $array[1][1];
                break;
            case 3:
                $expression = $array[2][0];
                $correctAnswer = (string) $array[2][1];
                break;
        }
        line("Question, %s", $expression);
        $answer = prompt('Your answer');
        if ($answer === $correctAnswer) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            return line("Let's try again, %s!", $name);
        }
    }
    if ($answer === $correctAnswer) {
        line("Congratulations, %s!", $name);
    }
}
