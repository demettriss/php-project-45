<?php

namespace BrainGames\Games\Gcd;

use function cli\line;
use function cli\prompt;

const OPERANDS = ["+", "-", "*"];

function run(): void
{
    global $userName;

    line('Find the greatest common divisor of given numbers.');
    $right = 0;
    while (true) {
        if ($right == 3) {
            line("Congratulations, {$userName}!");
            break;
        }
        $first = rand(1, 100);
        $second = rand(1, 100);
        line("Question: {$first} {$second}");
        $answer = prompt('Your answer');
        $correctAnswer = checkAnswer($first, $second);
        if ($answer != $correctAnswer) {
            $right = 0;
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$userName}!");
        } else {
            $right++;
            line("Correct!");
        }
    }
}

function checkAnswer(int $first, int $second): int
{
    $min = min([$first, $second]);
    $max = max([$first, $second]);
    $module = ($max % $min);

    return ($module === 0) ? $min : checkAnswer($min, $module);
}