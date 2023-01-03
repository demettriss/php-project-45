<?php

namespace BrainGames\Games\IsEven;

use function cli\line;
use function cli\prompt;

function run(): void
{
    global $userName;

    line('Answer "yes" if the number is even, otherwise answer "no".');
    $right = 0;
    while (true) {
        if ($right == 3) {
            line("Congratulations, {$userName}!");
            break;
        }
        $number = rand(1, 100);
        line("Question: {$number}");
        $answer = prompt('Your answer');
        $correctAnswer = checkAnswer($number);
        if ($answer != $correctAnswer) {
            $right = 0;
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$userName}!");
            break;
        } else {
            $right++;
            line("Correct!");
        }
    }
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function checkAnswer(int $number): string
{
    return isEven($number) ? "yes" : "no";
}