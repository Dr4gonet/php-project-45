<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function shouldRunGame(string $task, array $variants)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($task);
    $answer = '';
    $correctAnswer = '';
    for ($i = 0; $i < 3; $i += 1) {
        $expression = $variants[$i][0];
        $correctAnswer = (string) $variants[$i][1];
        line("Question: %s", (string) $expression);
        $answer = prompt('Your answer');
        if ($answer === (string) $correctAnswer) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, (string) $correctAnswer);
            return line("Let's try again, %s!", $name);
        }
    }
    if ($answer === $correctAnswer) {
        line("Congratulations, %s!", $name);
    }
}
