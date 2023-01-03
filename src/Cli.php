<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function welcome(): void
{
    global $userName;

    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
}

function run(mixed $question, mixed $correctAnswer): bool
{
    global $userName;

    line("Question: {$question}");
    $answer = prompt('Your answer');
    if ($answer != $correctAnswer) {
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
        line("Let's try again, {$userName}!");
        return false;
    } else {
        line("Correct!");
        return true;
    }
}