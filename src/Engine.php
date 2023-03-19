<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function runGame(string $task, array $variants)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($task);
    $answer = '';
    $correctAnswer = '';
    $numberOfRounds = 3;
    for ($i = 0; $i < $numberOfRounds; $i += 1) {
        $expression = $variants[$i][0];
        $correctAnswer = (string) $variants[$i][1];
        line("Question: %s", (string) $expression);
        $answer = prompt('Your answer');
        if ($answer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            return line("Let's try again, %s!", $name);
        } else {
            line('Correct!');
        }
    }
    line("Congratulations, %s!", $name);
}
