<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_ROUNDS = 3;

function runGame(string $task, array $variants)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($task);

    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i += 1) {
        $expression = $variants[$i][0];
        $correctAnswer = (string) $variants[$i][1];

        line("Question: %s", (string) $expression);

        $answer = prompt('Your answer');

        if ($answer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);

            line("Let's try again, %s!", $name);
            return;
        }
        line('Correct!');
    }
    return line("Congratulations, %s!", $name);
}
